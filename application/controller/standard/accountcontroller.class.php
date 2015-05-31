<?php

class AccountController extends Controller
{
    public $accountRepository;
    public $permissionRepository;
    public $rolePermissionRepository;

    public function __construct()
    {
        parent::__construct("account");
    }

    public function index_GET()
    {
        if(array_key_exists("user", $_SESSION))
        {
            if(isset($_SESSION["user"]))
            {
                $this->render("index", $_SESSION["user"]);
                return;
            }
        }
        $this->redirectTo("/account/login");
    }

    public function index_POST()
    {
        $noUser = true;
        if(array_key_exists("user", $_SESSION))
        {
            if(isset($_SESSION["user"]))
            {
                $noUser = false;
                $accountVM = $_SESSION["user"];
                $id = $_POST['id'];

                if($accountVM->id == $id)
                {
                    $accountToEdit = null;

                    $email = $_POST['email'];
                    $username = $_POST['username'];

                    $newPassword = null;
                    if(array_key_exists("newPassword", $_POST))
                    {
                        if(isset($_POST["newPassword"]))
                        {
                            $newPassword = $_POST['newPassword'];
                        }
                    }
                    $oldPassword = $_POST['oldPassword'];

                    $accounts = $this->accountRepository->selectAll();

                    $accountToCheck = null;
                    foreach($accounts as $account)
                    {
                        if($account->id === $id)
                        {
                            $accountToCheck = $account;
                        }
                    }

                    if(isset($accountToCheck))
                    {
                        $hashedPassword = hash('sha256', $oldPassword . $accountToCheck->salt);
                        //Hash password 65536 more times.
                        for ($i = 0; $i < 65536; $i++)
                        {
                            $hashedPassword = hash('sha256', $hashedPassword . $accountToCheck->salt);
                        }
                        if($hashedPassword === $accountToCheck->passwordHash)
                        {
                            $accountToEdit = $accountToCheck;
                        }
                    }

                    foreach($accounts as $account)
                    {
                        if(($account->email === $email)||($account->username === $username))
                        {
                            $accountToCheck = null;
                        }
                    }

                    if(isset($accountToEdit))
                    {
                        $accountToEdit->email = $email;
                        $accountToEdit->username = $username;

                        if(isset($newPassword))
                        {
                            $accountToCheck->salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                            $hashedPassword = hash('sha256', $newPassword . $accountToCheck->salt);
                            //Hash password 65536 more times.
                            for ($i = 0; $i < 65536; $i++)
                            {
                                $hashedPassword = hash('sha256', $hashedPassword . $accountToCheck->salt);
                            }
                            $accountToCheck->passwordHash = $hashedPassword;
                        }

                        $this->accountRepository->update($accountToEdit);

                        $this->viewBag["message"] = "Wijzigingen succesvol opgeslagen.";
                    }
                }
                else
                {
                    $this->viewBag["message"] = "Wijzigingen niet opgeslagen.";
                }
            }
        }

        if($noUser)
        {
            $this->redirectTo("/account/login");
        }

        $this->render("index", $_SESSION["user"]);
        return;
    }
    
    public function register_GET()
    {
    	$this->render("register");
    }

    public function register_POST()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $hashedPassword = hash('sha256', $password . $salt);
        //Hash password 65536 more times.
        for ($i = 0; $i < 65536; $i++)
        {
            $hashedPassword = hash('sha256', $hashedPassword . $salt);
        }

        $account = new Account();
        $account->username = $username;
        $account->email = $email;
        $account->passwordHash = $hashedPassword;
        $account->salt = $salt;
        $account->roleName = "Standaard";

        $this->accountRepository->insert($account);

        $this->viewBag["message"] = "Registratie geslaagd.";

        $this->render("register");
    }
    
    public function login_GET()
    {
        if(array_key_exists("user", $_SESSION))
        {
            if(isset($_SESSION["user"]))
            {
                $this->redirectTo("/account/index");
            }
        }
    	$this->render("login");
    }

    public function login_POST()
    {
        $loggedIn = false;

        $username = $_POST['username'];
        $password = $_POST['password'];

        $accounts = $this->accountRepository->selectAll();

        $accountToCheck = null;
        foreach($accounts as $account)
        {
            if($account->username === $username)
            {
                $accountToCheck = $account;
            }
        }

        if(isset($accountToCheck))
        {
            $hashedPassword = hash('sha256', $password . $accountToCheck->salt);
            //Hash password 65536 more times.
            for ($i = 0; $i < 65536; $i++)
            {
                $hashedPassword = hash('sha256', $hashedPassword . $accountToCheck->salt);
            }
            if($hashedPassword === $accountToCheck->passwordHash)
            {
                $loggedIn = true;
            }
        }

        if($loggedIn)
        {
            $accountVM = new AccountViewModel();
            $accountVM->id = $accountToCheck->id;
            $accountVM->username = $accountToCheck->username;
            $accountVM->email = $accountToCheck->email;
            $accountVM->role = $accountToCheck->roleName;

            $rolePermissions = $this->rolePermissionRepository->selectAllByRoleName($accountToCheck->roleName);

            $permissions = new ArrayList("Permission");
            foreach($rolePermissions as $rolePermission)
            {
                $permissions->add($this->permissionRepository->selectByName($rolePermission->permissionName));
            }

            $accountVM->permissions = $permissions;

            $_SESSION["user"] = $accountVM;

            $this->redirectTo("/account/index");
        }
        $this->viewBag["message"] = "Inloggen is mislukt.";
        $this->render("login");
    }

    public function logout_GET()
    {
        if(array_key_exists("user", $_SESSION))
        {
            if(isset($_SESSION["user"]))
            {
                unset($_SESSION["user"]);
                $this->render("logout");
                return;
            }
        }
        $this->redirectTo("/account/login");
    }
}