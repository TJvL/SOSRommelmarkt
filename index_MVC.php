<?php
/**
 * Created by PhpStorm.
 * User: Conno
 * Date: 6-3-2015
 * Time: 09:29
 */

include("includes/config.inc.php");
include("includes/markup/header.php");


    //MVC structure
    if(isset($_GET['controller']))
    {
        $controller = $_GET['controller'] . "Controller";
    }
    else
    {
        $controller = "homeController";
    }

    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action="index";
    }

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else
    {
        $id = "";
    }

    $method = $_SERVER['REQUEST_METHOD'];

    //Show the called path.
    echo "DEBUG: /".$controller."/".$action." > ".$method . "<br />";

    $ctrl = new $controller();
    $ctrl->{$action . "_" . $method}($id);

include("includes/markup/footer.php");
?>