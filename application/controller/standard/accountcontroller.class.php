<?php

class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct("account");
    }

    public function index_GET()
    {
        unset($_SESSION["edituserid"]);

        $user = AccountHelper::getUserInfo();
        if(isset($user))
        {
            $this->render("index", $_SESSION["user"]);
            return;
        }
        $this->redirectTo("/account/login");
    }
    
    public function register_GET()
    {
    	$this->render("register");
    }
    
    public function login_GET()
    {
        $user = AccountHelper::getUserInfo();
        if(isset($user))
        {
            $this->redirectTo("/account/index");
        }
    	$this->render("login");
    }

    public function logout_GET()
    {
        $user = AccountHelper::getUserInfo();
        if(isset($user))
        {
            unset($_SESSION["user"]);
            $this->render("logout");
            return;
        }
        $this->redirectTo("/account/login");
    }
}