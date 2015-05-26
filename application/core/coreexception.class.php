<?php

class CoreException extends Exception
{
    private $routeObject;

    public function __construct($message, $code, $ex, $routeObject)
    {
        parent::__construct($message, $code, $ex);
    }

    public function getRouteObject()
    {
        return $this->routeObject;
    }
}