<?php

class AccountController extends Controller
{
    public $accountRepository;

    public function __construct()
    {
        parent::__construct("account");
    }

    public function index_GET()
    {
        // TODO: If logged in, refer to account page. Refer to login page otherwise.
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
    	$this->render("login");
    }

    public function login_POST()
    {
        $this->render("login");
    }
}