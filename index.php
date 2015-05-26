<?php
// ob_start: buffers output and only displays after calling ob_end_flush. Enables dynamic redirect.
ob_start();

// Starts the session for use in error handling and authentication.
session_start();

// Load the server configuration.
include(__DIR__ . "/includes/config.inc.php");

//Set a exception handler for when a exception is not caught below.
function handleException($exception)
{
    $errorHandler = new ErrorHandler(DEV_RULES);
    if(is_a($exception, "PHPError"))
    {
        $errorHandler->handleException($exception, $exception->getContext);
    }
    elseif(is_a($exception, "CoreException"))
    {
        $errorHandler->handleException($exception, $exception->getRouteObject);
    }
    else
    {
        $errorHandler->handleException($exception, null);
    }
}
set_exception_handler("handleException");

//Set php error handler to a function that throws exceptions
function handleError($code, $message, $file, $line, $context)
{
    throw new PHPError($code, $message, $file, $line, $context);
}
set_error_handler('handleError', E_ALL);

$routeMapper = new RouteMapper(STRICT_RULES); //A route mapping service that map the requested route and checks if it is valid. Then returns a RouteObject when it successfully maps the route.
$repositoryFactory = new RepositoryFactory($dbCons);
$controllerFactory = new ControllerFactory($repositoryFactory);
$modelMapper = new ModelMapper(STRICT_RULES); //A model mapping service that maps POST data to the desired model class.
$requestHandler = new RequestHandler($modelMapper, $controllerFactory); //This service handles the request after it is mapped. It calls the in the RouteObject configured method on the controller.
$routeObject = null; //This object contains information about the route this request wants to take to a resource.

//Start handling the request.
//When an exception is thrown and not handled before ending up here it is automatically considered a fatal error and the client will receive an error.
$routeObject = $routeMapper->mapRoute(); //Try to map the requested route (from the url).
$requestHandler->handleRequest($routeObject); //Try to successfully process the request.

ob_end_flush(); //Output the accumulated buffer.