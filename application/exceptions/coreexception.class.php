<?php

class CoreException extends Exception
{
    protected $routeObject;

    public function __construct($message, $code, $ex = null, $routeObject)
    {
        parent::__construct($message, $code, $ex);
    }

    public function getRouteObject()
    {
        return $this->routeObject;
    }
}