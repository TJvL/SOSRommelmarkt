<?php

class AuthorizationHandler
{
    public function checkAuthorization($routeObject)
    {
        $authorized = false;

        $controller = $routeObject->controller;
        $methodName = $routeObject->controllerMethod;

        $reflectedController = new ReflectionClass($controller);
        $reflectedMethod = $reflectedController->getMethod($methodName);
        $methodDocComment = $reflectedMethod->getDocComment();

        $matches = array();
        if (preg_match("/[\{]{2}.*[\}]{2}/", $methodDocComment, $matches))
        {
            if ($this->isLoggedIn())
            {
                $user = $_SESSION["user"];
                $userRole = $user->role;
                $userPermissions = $user->permissions;

                $authString = str_replace("{{", "", $matches[0]);
                $authString = str_replace("}}", "", $authString);

                $role = "Role=";
                $permission = "Permission=";

                if (strpos($authString, $role))
                {
                    $roleString = str_replace($role, "", $authString);
                    $roleString = str_replace(";", "", $roleString);
                    $roles = explode(",", $roleString);

                    foreach ($roles as $role)
                    {
                        if ($role === $userRole)
                        {
                            $authorized = true;
                            break;
                        }
                    }
                }
                elseif((strpos($authString, $permission) + 1))
                {
                    $permissionString = str_replace($role, "", $authString);
                    $permissionString = str_replace(";", "", $permissionString);
                    $permissions = explode(",", $permissionString);

                    foreach ($permissions as $permission)
                    {
                        foreach ($userPermissions as $userPermission)
                        {
                            if ($permission === $userPermission)
                            {
                                $authorized = true;
                                break;
                            }
                        }
                    }
                }
            }
        }
        else
        {
            $authorized = true;
        }

        if(!$authorized)
        {
            throw new CoreException("Client not authorized to call this action", 401, null, $routeObject);
        }
    }

    private function isLoggedIn()
    {
        if (array_key_exists("user", $_SESSION))
        {
            if (isset($_SESSION["user"]))
            {
                return true;
            }
        }
        return false;
    }
}