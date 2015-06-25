<?php


class AccountAPIController extends APIController
{
    public $accountRepository;
    public $permissionRepository;
    public $rolePermissionRepository;

    public function __construct()
    {
        parent::__construct("accountapi");
    }

    public function getCurrentUserInfo_GET()
    {
        $this->respondWithJSON(AccountHelper::getUserInfo());
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($account)
    {
        if(isset($account->id))
        {
            $this->accountRepository->deleteById($account->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Account;}}
     */
    public function update_POST($accountVM)
    {
        if (isset($accountVM->id))
        {
            if ((isset($accountVM->username)) && (isset($accountVM->email)))
            {
                $userToUpdate = $this->accountRepository->selectById($accountVM->id);
                $userToUpdate->username = $accountVM->username;
                $userToUpdate->email = $accountVM->email;
                $userToUpdate->roleName = $accountVM->roleName;

                if(isset($accountVM->newPassword))
                {
                    $newSalt = AccountHelper::getNewSalt();
                    $newHashedPassword = AccountHelper::hashPassword($accountVM->newPassword, $newSalt);
                    $userToUpdate->salt = $newSalt;
                    $userToUpdate->passwordHash = $newHashedPassword;
                }

                $this->accountRepository->update($userToUpdate);
                $this->respondOK();
            }
            else
            {
                throw new Exception("Not all required data was provided.", 400);
            }
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    public function login_POST($accountVM)
    {
        if ((isset($accountVM->username)) && (isset($accountVM->password)))
        {
            $accountToCheck = null;
            $accounts = $this->accountRepository->selectAll();
            foreach($accounts as $account)
            {
                if($account->username === $accountVM->username)
                {
                    $accountToCheck = $account;
                    break;
                }
            }

            if(isset($accountToCheck))
            {
                $hashedPassword = AccountHelper::hashPassword($accountVM->password, $accountToCheck->salt);
                if($accountToCheck->passwordHash === $hashedPassword)
                {
                    $accountVM = new AccountViewModel();
                    $accountVM->id = $accountToCheck->id;
                    $accountVM->username = $accountToCheck->username;
                    $accountVM->email = $accountToCheck->email;
                    $accountVM->role = $accountToCheck->roleName;

                    $rolePermissions = $this->rolePermissionRepository->selectAllByRoleName($accountToCheck->roleName);

                    $permissions = array();
                    foreach($rolePermissions as $rolePermission)
                    {
                        $permissions[$rolePermission->permissionName] = $this->permissionRepository->selectByName($rolePermission->permissionName);
                    }
                    $accountVM->permissions = $permissions;

                    $this->accountRepository->setLastLogin($accountVM->id);
                    $_SESSION["user"] = $accountVM;

                    $this->respondOK();
                }
                else
                {
                    throw new Exception("Incorrect password", 401);
                }
            }
            else
            {
                throw new Exception("Username not found in database.", 401);
            }
        }
    }

    public function updateself_POST($accountVM)
    {
        if (isset($accountVM->id))
        {
            $user = AccountHelper::getUserInfo();
            if ((isset($user)) && (($accountVM->id == $user->id)))
            {
                if ((isset($accountVM->username)) && (isset($accountVM->email)) && (isset($accountVM->password)))
                {
                    $userToUpdate = $this->accountRepository->selectById($accountVM->id);
                    $hashedPassword = AccountHelper::hashPassword($accountVM->password, $userToUpdate->salt);
                    if($hashedPassword === $userToUpdate->passwordHash)
                    {
                        $userToUpdate->username = $accountVM->username;
                        $userToUpdate->email = $accountVM->email;

                        if(isset($accountVM->newPassword))
                        {
                            $newSalt = AccountHelper::getNewSalt();
                            $newHashedPassword = AccountHelper::hashPassword($accountVM->newPassword, $newSalt);
                            $userToUpdate->salt = $newSalt;
                            $userToUpdate->passwordHash = $newHashedPassword;
                        }

                        $this->accountRepository->update($userToUpdate);

                        $user->username = $accountVM->username;
                        $user->email = $accountVM->email;
                        $_SESSION["user"] = $user;

                        $this->respondOK();
                    }
                    else
                    {
                        throw new Exception("Wrong password.", 401);
                    }
                }
                else
                {
                    throw new Exception("Not all required data was provided.", 400);
                }
            }
            else
            {
                throw new Exception("Not authorized for this action.", 401);
            }
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    public function add_POST($accountVM)
    {
        $user = AccountHelper::getUserInfo();

        if((is_null($user))||(array_key_exists("Account", $user->permissions)))
        {
            if ((isset($accountVM->username)) && (isset($accountVM->email)) && (isset($accountVM->password)))
            {
                $username = $accountVM->username;
                $email = $accountVM->email;
                $password = $accountVM->password;
                $salt = AccountHelper::getNewSalt();
                $hashedPassword = AccountHelper::hashPassword($password, $salt);
                $role = null;
                if (isset($accountVM->roleName))
                {
                    $role = $accountVM->roleName;
                }
                else
                {
                    $role = "Standaard";
                }

                $account = new Account();
                $account->username = $username;
                $account->email = $email;
                $account->passwordHash = $hashedPassword;
                $account->salt = $salt;
                $account->roleName = $role;

                $this->accountRepository->insert($account);
                $this->respondOK();
            }
            else
            {
                throw new Exception("Not all required data was provided", 400);
            }
        }
    }

    /**
     *{{Permission=Account;}}
     */
    public function checkusernameadd_POST($username)
    {
        $users = $this->accountRepository->selectAll();
        foreach($users as $user)
        {
            if($user->username === $username)
            {
                $this->respondWithJSON(false);
            }
        }
        $this->respondWithJSON(true);
    }

    /**
     *{{Permission=Account;}}
     */
    public function checkemailadd_POST($email)
    {
        $users = $this->accountRepository->selectAll();
        foreach($users as $user)
        {
            if($user->email === $email)
            {
                $this->respondWithJSON(false);
            }
        }
        $this->respondWithJSON(true);
    }

    public function checkusername_POST($username)
    {
        $id = -1;
        $user = AccountHelper::getUserInfo();

        if(isset($_SESSION["edituserid"]))
        {
            $id = $_SESSION["edituserid"];
        }
        else
        {
            if(isset($user))
            {
                $id = $user->id;
            }
        }

        $users = $this->accountRepository->selectAll();
        foreach($users as $user)
        {
            if(($user->username === $username)&&($user->id != $id))
            {
                $this->respondWithJSON(false);
            }
        }
        $this->respondWithJSON(true);
    }

    public function checkemail_POST($email)
    {
        $id = -1;
        $user = AccountHelper::getUserInfo();

        if(isset($_SESSION["edituserid"]))
        {
            $id = $_SESSION["edituserid"];
        }
        else
        {
            if(isset($user))
            {
                $id = $user->id;
            }
        }

        $users = $this->accountRepository->selectAll();
        foreach($users as $user)
        {
            if(($user->email === $email)&&($user->id != $id))
            {
                $this->respondWithJSON(false);
            }
        }
        $this->respondWithJSON(true);
    }
}