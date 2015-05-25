<?php
// ob_start: buffers output and only displays after calling ob_end_flush. Enables dynamic redirect.
ob_start();
session_start();

include(__DIR__ . "/includes/config.inc.php");

$controller = null;
$errorHandler = new ErrorHandler();
$routeMapper = new RouteMapper();
$modelMapper = new ModelMapper();

try
{
    $routeMapper->mapRoute();
    $controller = new $routeMapper->controller();
    $method = $routeMapper->controllerMethod;
    $id = $routeMapper->id;

    if($routeMapper->httpMethod === "GET")
    {
        $controller->$method($id);
        $_SESSION['prevLocation'] = $routeMapper->controllerURLName . SEPARATOR . $routeMapper->action;
    }
    else
    {
        $model = $modelMapper->mapToModel();
        $controller->$method($model);
    }
}
catch (Exception $ex)
{
    ob_end_clean();
    $errorHandler->handleException($ex);
}

ob_end_flush();