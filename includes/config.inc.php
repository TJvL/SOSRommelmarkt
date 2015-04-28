<?php

define("SEPARATOR", "/");

$root = $_SERVER['DOCUMENT_ROOT'] . SEPARATOR . "SOSRommelmarkt";
define("ROOT_DIR", $root);
$path = SEPARATOR . "SOSRommelmarkt";
define("ROOT_PATH", $path);

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