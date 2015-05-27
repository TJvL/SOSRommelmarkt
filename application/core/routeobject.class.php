<?php

class RouteObject
{
    public $isAPICall;
    public $controller;
    public $controllerURLName;
    public $action;
    public $id;
    public $httpMethod;
    public $controllerMethod;

    public function __construct()
    {
        $this->isAPICall = false;
    }
}