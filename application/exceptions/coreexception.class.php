<?php

class CoreException extends Exception
{
    protected $routeObject;

    public function __construct($message, $code, $file, $line, $ex, $routeObject)
    {
        parent::__construct($message, $code, $file, $line, $ex);
    }

    public function getRouteObject()
    {
        return $this->routeObject;
    }
}