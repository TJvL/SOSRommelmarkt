<?php

class RequestHandler
{
    private $modelMapper;
    private $controllerFactory;
    private $routeObject;
    private $controller;

    public function __construct($modelMapper, $controllerFactory)
    {
        $this->modelMapper = $modelMapper;
        $this->controllerFactory = $controllerFactory;
    }

    /**
     * Handles the client's request by executing the mapped route on the right controller.
     *
     * @param $routeObject RouteObject      The mapped route object to be used to call the correct method on the controller.
     * @throws CoreException                When the client used http request method is not supported by this application.
     */
    public function handleRequest($routeObject)
    {
        $this->routeObject = $routeObject;
        $this->setController(); //Set the controller to be used for handling this request.

        if($routeObject->httpMethod === "GET") //If the http request method was of the type GET, then call the controller method with the optional id variable.
        {
            $this->handleGET();
        }
        elseif($routeObject->httpMethod === "POST") //Else if the http request method was of the type POST, then map the posted data to a model and call the controller method with it as parameter.
        {
            $this->handlePOST();
        }
        else
        {
            Throw new CoreException("The client's used http request method is not support", 405, null, $this->routeObject);
        }
    }

    /**
     * Set the controller to be used for this request through the controller factory.
     *
     * @throws CoreException        When creating the controller failed somehow.
     */
    private function setController()
    {
        try
        {
            $this->controller = $this->controllerFactory->createController($this->routeObject); //Create the proper controller.
        }
        catch(Exception $ex)
        {
            $exception = new CoreException("The controller or one of it's dependencies could not be created.", 500, $ex, $this->routeObject);
            throw $exception;
        }
    }

    /**
     * Handle the http request when it's of the type POST
     * @throws CoreException        When mapping POST data failed somehow.
     */
    private function handlePOST()
    {
        $method = $this->routeObject->controllerMethod; //Get the method to be called on the controller.
        $model = null;

        try
        {
            $model = $this->modelMapper->mapToModel();
        }
        catch(Exception $ex)
        {
            $exception = new CoreException("The model could not be found and/or mapped.", $ex->getCode(), $ex, $this->routeObject);
            throw $exception;
        }

        try
        {
            $this->controller->$method($model);
        }
        catch(Exception $ex)
        {
            $exception = new CoreException("Something went wrong in the controller", $ex->getCode(), $ex, $this->routeObject);
            throw $exception;
        }
    }

    /**
     * Handle the http request when it's of the type GET
     */
    private function handleGET()
    {
        $method = $this->routeObject->controllerMethod; //Get the method to be called on the controller.
        $id = $this->routeObject->id; //Get the last part of the route the optional id. This variable can be an empty string.

        try
        {
            $this->controller->$method($id);
        }
        catch(Exception $ex)
        {
            $exception = new CoreException("Something went wrong in the controller", $ex->getCode(), $ex, $this->routeObject);
            throw $exception;
        }
        $_SESSION['prevLocation'] = $this->routeObject->controllerURLName . SEPARATOR . $this->routeObject->action;
    }
}