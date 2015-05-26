<?php

class RequestHandler
{
    private $modelMapper;
    private $controllerFactory;

    public function __construct($modelMapper, $controllerFactory)
    {
        $this->modelMapper = $modelMapper;
        $this->controllerFactory = $controllerFactory;
    }

    /**
     * Handles the client's request by executing the mapped route on the right controller.
     *
     * @param $routeObject RouteObject      The mapped route object to be used to call the correct method on the controller.
     * @throws Exception                    When the client used http request method is not supported by this application.
     */
    public function handleRequest($routeObject)
    {
        $controller = $this->controllerFactory->createController($routeObject); //Create the proper controller.
        $method = $routeObject->controllerMethod; //Get the method to be called on the controller.
        $id = $routeObject->id; //Get the last part of the route the optional id. This variable can be an empty string.

        if($routeObject->httpMethod === "GET") //If the http request method was of the type GET, then call the controller method with the optional id variable.
        {
            $controller->$method($id);
            $_SESSION['prevLocation'] = $routeObject->controllerURLName . SEPARATOR . $routeObject->action;
        }
        elseif($routeObject->httpMethod === "POST") //Else if the http request method was of the type POST, then map the posted data to a model and call the controller method with it as parameter.
        {
            $model = $this->modelMapper->mapToModel();
            $controller->$method($model);
        }
        else
        {
            Throw new Exception("The client's used http request method is not support", 405);
        }
    }
}