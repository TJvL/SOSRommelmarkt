<?php
// ob_start: buffers output and only displays after calling ob_end_flush. Enables dynamic redirect.
ob_start();

// Starts the session for use in error handling and authentication.
session_start();

// Load the server configuration.
include(__DIR__ . "/includes/config.inc.php");

//Start handling the request.
$errorHandler = new ErrorHandler(DEV_RULES); //An error handling service that logs and responds accordingly to exceptions.
$routeMapper = new RouteMapper(STRICT_RULES); //A route mapping service that map the requested route and checks if it is valid. Then returns a RouteObject when it successfully maps the route.
$modelMapper = new ModelMapper(STRICT_RULES); //A model mapping service that maps POST data to the desired model class.
$requestHandler = new RequestHandler($modelMapper); //This service handles the request after it is mapped. It calls the in the RouteObject configured method on the controller.
$routeObject = null; //This object contains information about the route this request wants to take to a resource.

//When an exception is thrown and not handled before ending up here it is automatically considered a fatal error and the client will receive an error.
try
{
    $routeObject = $routeMapper->mapRoute(); //Try to map the requested route (from the url).
    $requestHandler->handleRequest($routeObject); //Try to successfully process the request.
}
catch (Exception $ex)
{
    ob_end_clean(); //Discard accumulated buffer before error handling.
    $errorHandler->handleException($ex, $routeObject); //When an exception is not caught inside the controller or before it is handled here.
}

ob_end_flush(); //Output the accumulated buffer.