<?php

$root = $_SERVER['DOCUMENT_ROOT'] . "SOSRommelmarkt/";
define("ROOT_DIR", $root);

session_start();
echo ROOT_DIR . "application/controller/";
print_r(scandir(ROOT_DIR . "application/controller/"));

function loadController($class)
{
    $location =  ROOT_DIR . "application/controller/";

    foreach(scandir($location) as $subdir)
    {
        $file = $location . $subdir . "/" . strtolower($class) . ".class.php";

        if(file_exists($file))
        {
            require_once($file);
        }
    }
}

function loadModel($class)
{
    $location =  ROOT_DIR . "application/model/";

    foreach(scandir($location) as $subdir)
    {
        $file = $location . $subdir . "/" . strtolower($class) . ".class.php";

        if(file_exists($file))
        {
            require_once($file);
        }
    }
}

function loadUtility($class)
{
    $location = ROOT_DIR . "application/utility/";
    $file = $location . strtolower($class) . ".class.php";
    if(file_exists($file))
    {
        require_once($file);
    }
}

spl_autoload_register('loadController');
spl_autoload_register('loadModel');
spl_autoload_register('loadUtility');

////Define the paths to the directories holding class files
//$paths = array(
//    'includes/utility',
//    'controller',
//    'model'
//);
//
////Add the paths to the class directories to the include path.
//set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $paths));
////Add the file extensions to the SPL.
//spl_autoload_extensions(".class.php,.php,.inc");
////Register the default autoloader implementation in the php engine.
//spl_autoload_register();
?>