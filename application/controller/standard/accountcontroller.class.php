<?php
class AccountController extends Controller
{
    function __construct()
    {
        parent::__constructor("account");
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
?>