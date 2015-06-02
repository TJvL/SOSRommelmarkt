<?php

class AuthorizationHandler
{
    private $authorized;

    public function __construct()
    {
        $this->authorized = false;
    }

    public function checkAuthorization($routeObject)
    {
        $methodDocComment = $this->getDocComment($routeObject);

        $authString = $this->getAuthString($methodDocComment);
        if (isset($authString))
        {
            $user = $this->isLoggedIn();
            if (isset($user))
            {
                $userRole = $user->role;
                $userPermissions = $user->permissions;

                if (preg_match("/Role=.*;/", $authString))
                {
                    $roles = $this->getRoles($authString);
                    foreach ($roles as $role)
                    {
                        if ($role === $userRole)
                        {
                            $this->authorized = true;
                            break;
                        }
                    }
                }
                elseif(preg_match("/Permission=.*;/", $authString))
                {
                    $permissions = $this->getPermissions($authString);

                    foreach ($permissions as $permission)
                    {
                        foreach ($userPermissions as $userPermission)
                        {
                            if ($permission === $userPermission->name)
                            {
                                $this->authorized = true;
                                break;
                            }
                        }
                    }
                }
            }
        }
        else
        {
            $this->authorized = true;
        }

        if(!$this->authorized)
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
                return $_SESSION["user"];
            }
        }
        return null;
    }

    private function getAuthString($methodDocComment)
    {
        $authString = null;
        $matches = array();
        if(preg_match("/[\{]{2}.*[\}]{2}/", $methodDocComment, $matches))
        {
            $authString = str_replace("{{", "", $matches[0]);
            $authString = str_replace("}}", "", $authString);
        }

        return $authString;
    }

    private function getDocComment($routeObject)
    {
        $controller = $routeObject->controller;
        $methodName = $routeObject->controllerMethod;

        $reflectedController = new ReflectionClass($controller);
        $reflectedMethod = $reflectedController->getMethod($methodName);

        return $reflectedMethod->getDocComment();
    }

    private function getRoles($authString)
    {
        $roleString = str_replace("Role=", "", $authString);
        $roleString = str_replace(";", "", $roleString);
        return explode(",", $roleString);
    }

    private function getPermissions($authString)
    {
        $permissionString = str_replace("Permission=", "", $authString);
        $permissionString = str_replace(";", "", $permissionString);
        return explode(",", $permissionString);
    }
}