<?php
//Application global constants.
//Constant that defines a seperator to use in path strings.
define("SEPARATOR", "/");

//Constant that defines the absolute root path for server side use.
$root = $_SERVER['DOCUMENT_ROOT'] . SEPARATOR . "SOSRommelmarkt";
define("ROOT_DIR", $root);

//Constant that defines the relative root path for client side use.
$path = SEPARATOR . "SOSRommelmarkt";
define("ROOT_PATH", $path);

//Constant that defines what controller is considered the default.
define("DEFAULT_CONTROLLER", "HomeController");

//Constant that defines what controller action is considered the default.
define("DEFAULT_ACTION", "index");

//Constant that defines the route to be taken when redirecting to error page.
define("ERROR_ROUTE", "home/error");

//Constant that defines if http requests should be held under stricter rules.
define("STRICT_RULES", false);

//Constant that defines if this server is in development mode.
define("DEV_RULES", true);

//Error handling settings.
//If the server is running in development mode configure the error handling differently.
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
//This function searches all directories in application for the requested class and requires it.
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

//The previously defined function is registered in the autoloader so it can be called whenever a class file is needed.
spl_autoload_register('loadClass');