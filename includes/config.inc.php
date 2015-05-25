<?php
//Application global constants.
define("SEPARATOR", "/");
$root = $_SERVER['DOCUMENT_ROOT'] . SEPARATOR . "SOSRommelmarkt";
define("ROOT_DIR", $root);
$path = SEPARATOR . "SOSRommelmarkt";
define("ROOT_PATH", $path);
define("DEFAULT_CONTROLLER", "HomeController");
define("DEFAULT_ACTION", "index");
define("ERROR_ROUTE", "home/error");
define("STRICT_RULES", false);
define("DEV_RULES", true);

if(DEV_RULES)
{
    ini_set("display_errors", "On");
    ini_set("display_startup_errors", "On");
    ini_set("error_reporting", "-1");
    ini_set("log_errors", "On");
}
else
{
    ini_set("display_errors", "Off");
    ini_set("display_startup_errors", "Off");
    ini_set("error_reporting", "E_ALL");
    ini_set("log_errors", "On");
}

//Autoload functionality
function loadClass($class)
{
    $directory = new RecursiveDirectoryIterator(ROOT_DIR . SEPARATOR . "application");
    $iterator = new RecursiveIteratorIterator($directory);
    foreach ($iterator as $file)
    {
        $include = str_replace("\\", "/", "$file");
        if(strpos($include, SEPARATOR . strtolower($class) . ".class.php"))
        {
            require_once($include);
            break;
        }
    }
}

spl_autoload_register('loadClass');