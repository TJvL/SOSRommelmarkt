<?php
// ob_start: buffers output and only displays after calling ob_end_flush. Enables dynamic redirect.
ob_start();

// Starts the session for use in error handling and authentication.
session_start();

// Load the server configuration.
include(__DIR__ . "/includes/config.inc.php");
include(__DIR__ . "/includes/exceptionhandling.inc.php");//This configures an error and exception handler. All PHP E_* errors/warnings are converted to exceptions in this configuration.

//Initialize the core classes of this application.
$routeMapper = new RouteMapper(STRICT_RULES); //A route mapping service that map the requested route and checks if it is valid. Then returns a RouteObject when it successfully maps the route.
$authHandler = new AuthorizationHandler(); //Handles client authorization checking.
$repositoryFactory = new RepositoryFactory($dbCons); //Will instantiate new repositories when needed.
$controllerFactory = new ControllerFactory($repositoryFactory);//Will instantiate new controller and automatically supply all it's dependencies through it's constructor function.
$modelMapper = new ModelMapper(STRICT_RULES); //A model mapping service that maps POST data to the desired model class.
$requestHandler = new RequestHandler($modelMapper, $controllerFactory); //This service handles the request after it is mapped. It calls the in the RouteObject configured method on the controller.
$routeObject = null; //This object contains information about the route this request wants to take to a resource.

//Start handling the request.
//When an exception is thrown and not handled before ending up here it is automatically considered a fatal error and the client will receive an error.
$routeObject = $routeMapper->mapRoute(); //Try to map the requested route (from the url).
$authHandler->checkAuthorization($routeObject); //Check if the client is authorized to take this route.
$requestHandler->handleRequest($routeObject); //Try to successfully process the request.

ob_end_flush(); //Output the accumulated buffer.
exit(); //Cleanly exit the script.