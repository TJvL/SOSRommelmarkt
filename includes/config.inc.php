<?php

$root = "";

//root dir incompatibility fix
if(in_array("SOSRommelmarkt", scandir($_SERVER['DOCUMENT_ROOT'])))
{
    $root = $root . "/SOSRommelmarkt";
}
define("ROOT_DIR", $root);

session_start();

require("database.php");

//require_once("/controller/Controller.php");
function loadControllers($class)
{
    $loc = "controller/";
    $file = $loc . $class . ".php";
    if(file_exists($_SERVER['DOCUMENT_ROOT']. "/SOSRommelmarkt/" . $file))
    {
        require_once($file);
    }
}

function loadModels($class)
{
    $loc = "model/";
    $file = $loc . $class . ".class.php";
    if(file_exists($_SERVER['DOCUMENT_ROOT']. "/SOSRommelmarkt/" . $file))
    {
        require_once($file);
    }
}

function loadUtilities($class)
{
    $loc = "includes/utility/";
    $file = $loc . $class . ".php";
    if(file_exists($_SERVER['DOCUMENT_ROOT']. "/SOSRommelmarkt/" . $file))
    {
        require_once($file);
    }
}

spl_autoload_register('loadControllers');
spl_autoload_register('loadModels');
spl_autoload_register('loadUtilities');

?>