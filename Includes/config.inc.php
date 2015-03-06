<?php
/**
 * Created by PhpStorm.
 * User: Conno
 * Date: 6-3-2015
 * Time: 10:01
 */

$root = "";

//root dir incompatibility fix
if(in_array("SOSRommelmarkt", scandir($_SERVER['DOCUMENT_ROOT'])))
{
    $root = $root . "/SOSRommelmarkt";
}
define("ROOT_DIR", $root);

//Include everything here, in the right order.

require("/controller/Controller.php");
require("/controller/homeController.php");

?>