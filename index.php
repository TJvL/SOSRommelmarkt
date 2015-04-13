<?php
//ob_start: buffers output and only displays after calling ob_end_flush. Enables dynamic redirect.
ob_start();

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
//    echo "DEBUG: /".$controller."/".$action."/".$id." > ".$method . "<br />";

    $ctrl = new $controller();
    $ctrl->{$action . "_" . $method}($id);

if($controller == "manageController"){
    include("includes/markup/manage_footer.php");
}
else{
    include("includes/markup/footer.php");
}

ob_end_flush();
?>