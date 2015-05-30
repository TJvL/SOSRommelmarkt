<?php

class AccountController extends Controller
{
    public function __construct()
    {
        Parent::__construct("account");
    }

    public function index_GET()
    {
        // TODO: If logged in, refer to account page. Refer to login page otherwise.
    }
    
    public function register_GET()
    {
    	$this->render("register");
    }
    
    public function login_GET()
    {
    	$this->render("login");
    }
}