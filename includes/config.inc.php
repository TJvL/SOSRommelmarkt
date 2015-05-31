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

//Constant that defines if http requests should be held under stricter rules. Meaning that values extracted from $_GET and $_POST should be mapped before the controller is called.
define("STRICT_RULES", false);

//Constant that defines if this server is in development mode.
define("DEV_RULES", true);

//Constant that defines the main database. This must also be the name of the directory where all repositories that depend on this database are located. This is inside application/model/repositories
define("MAIN_DB", "main");

//Constant that defines the user database. This must also be the name of the directory where all repositories that depend on this database are located. This is inside application/model/repositories
define("USER_DB", "user");

//Database connections
$dbCons = array(
    //Main database:
    MAIN_DB=>array(
        "host"=>"samwise.technotive.nl",
        "username"=>"sosAdmin",
        "password"=>"shadowrend",
        "database"=>"sosRommel",
        "port"=>3306),
    //User Database:
    USER_DB=>array(
        "host"=>"samwise.technotive.nl",
        "username"=>"sosAccountUser",
        "password"=>"supaplex",
        "database"=>"sosUser",
        "port"=>3306)
    );

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

// Starts the session for use in error handling and authentication.
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    if(array_key_exists("user", $_SESSION))
    {
        if(isset($_SESSION["user"]))
        {
            unset($_SESSION["user"]);
        }
    }
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

session_regenerate_id(true);