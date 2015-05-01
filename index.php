<?php
// ob_start: buffers output and only displays after calling ob_end_flush. Enables dynamic redirect.
ob_start();

include(__DIR__ . "/includes/config.inc.php");

// MVC structure
if (isset($_GET['controller']))
{
	$controller = $_GET['controller'] . "Controller";
}
else
{
	$controller = "HomeController";
}

if (isset($_GET['action']))
{
	$action = $_GET['action'];
}
else
{
	$action="index";
}

if (isset($_GET['id']))
{
	$id = $_GET['id'];
}
else
{
	$id = "";
}
    
$method = $_SERVER['REQUEST_METHOD'];

$ctrl = new $controller();
$ctrl->{$action . "_" . $method}($id);

ob_end_flush();
?>