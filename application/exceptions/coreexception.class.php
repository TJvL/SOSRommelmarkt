<?php

class CoreException extends Exception
{
    protected $routeObject;
    protected $loggedInUser;

    public function __construct($message, $code, $ex = null, $routeObject)
    {
        parent::__construct($message, $code, $ex);
        $this->routeObject = $routeObject;

        if(array_key_exists("user", $_SESSION))
        {
            if(isset($_SESSION["user"]))
            {
                $this->loggedInUser = $_SESSION["user"];
            }
        }
    }

    public function getRouteObject()
    {
        return $this->routeObject;
    }
}