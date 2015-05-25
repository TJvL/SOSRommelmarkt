<?php

class RouteMapper
{
    public $controller;
    public $controllerURLName;
    public $action;
    public $id;
    public $httpMethod;
    public $controllerMethod;

    public function __construct()
    {
        $this->controller = DEFAULT_CONTROLLER;
        $this->controllerURLName = str_replace("Controller", "", $this->controller);
        $this->action = DEFAULT_ACTION;
        $this->id = "";
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->controllerMethod = $this->action . $this->httpMethod;
    }

    public function mapRoute()
    {
        // Define the route to be taken by the request.
        if (isset($_GET['controller']))
        {
            $this->controllerURLName = $_GET['controller'];
            $this->controller = $_GET['controller'] . "Controller";

            if (isset($_GET['action']))
            {
                $this->action = $_GET['action'];

                if (isset($_GET['id']))
                {
                    $this->id = $_GET['id'];
                }
            }
        }
        $this->controllerMethod = $this->action . "_" . $this->httpMethod;

        if(STRICT_RULES)
        {
            unset($_GET);
        }

        try
        {
            $this->validateRoute();
        }
        catch (Exception $ex)
        {
            throw new Exception("Requested resource has not been found", 404, $ex);
        }
    }

    private function validateRoute()
    {
        if(class_exists($this->controller, true))
        {
            if(!method_exists($this->controller, $this->action . "_" . $this->httpMethod))
            {
                throw new Exception("Method: $this->action in $this->controller has not been defined");
            }
        }
        else
        {
            throw new Exception("$this->controller has not been defined");
        }
    }
}