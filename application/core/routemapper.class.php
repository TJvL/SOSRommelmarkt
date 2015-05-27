<?php

class RouteMapper
{
    private $routeObject; //The RouteObject contains information about the route to be taken to handle the request.
    private $strictRules; //Defines if strict rules are enforced in the application regarding mapping http request variables.

    public function __construct($strictRules)
    {
        $this->strictRules = $strictRules;
        $this->routeObject = new RouteObject();
        $this->routeObject->controller = DEFAULT_CONTROLLER;
        $this->routeObject->controllerURLName = str_replace("Controller", "", $this->routeObject->controller);
        $this->routeObject->action = DEFAULT_ACTION;
        $this->routeObject->id = "";
        $this->routeObject->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->routeObject->controllerMethod = $this->routeObject->action . "_" . $this->routeObject->httpMethod;
    }

    /**
     * Maps the by URL defined route to a RouteObject.
     *
     * @returns RouteObject     When the route is found to be pointing to an existing resource.
     * @throws Exception        When the route does not point to an existing resource.
     */
    public function mapRoute()
    {
        // Define the route to be taken by the request.
        if (isset($_GET['controller']))
        {
            $this->routeObject->controllerURLName = $_GET['controller'];

            if(strpos($this->routeObject->controllerURLName, "api")) //When the controller name includes "api" it means error handling goes differently.
            {
                $this->routeObject->isAPICall = true;
            }

            $this->routeObject->controller = $_GET['controller'] . "Controller";

            if (isset($_GET['action']))
            {
                $this->routeObject->action = $_GET['action'];

                if (isset($_GET['id']))
                {
                    $this->routeObject->id = $_GET['id'];
                }
            }
        }
        $this->routeObject->controllerMethod = $this->routeObject->action . "_" . $this->routeObject->httpMethod;

        if($this->strictRules) //If strict rules are enforced on this server the $_GET array is unset to prevent future use.
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

        return $this->routeObject;
    }

    /**
     * Validates if the request can be handled by and existing method in an existing controller.
     *
     * @throws Exception        When no controller or method exists for this kind of action.
     */
    private function validateRoute()
    {
        if(class_exists($this->routeObject->controller, true))
        {
            if(!method_exists($this->routeObject->controller, $this->routeObject->controllerMethod))
            {
                throw new Exception("Method: " . $this->routeObject->action . " in " . $this->routeObject->controller . "has not been defined");
            }
        }
        else
        {
            throw new Exception($this->routeObject->controller . "has not been defined");
        }
    }
}