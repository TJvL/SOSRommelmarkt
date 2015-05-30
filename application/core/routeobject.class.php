<?php

class RouteObject
{
    public $isAPICall; //Defines if the client is actually trying to reach an API controller. This matters when error/exception handling.
    public $controller; //The controller class name (example: "homeController"). Case sensitivity does not matter here.
    public $controllerURLName;//The name of the controller in the URL (example: "home").
    public $action; //The name of the action to be taken (example: "index").
    public $id; //The optional id coming last in the URL. (example: 1)
    public $httpMethod; //The http method used by the client when it made its request. (example: GET)
    public $controllerMethod; //The actual name of the function in the controller (example: index_GET)

    public function __construct()
    {
        $this->isAPICall = false;
    }
}