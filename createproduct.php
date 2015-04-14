<?php
include("includes/utility/imagemanipulator.php");
//Insert data into database and create a product variable for later use.
//$product = ShopProduct::insert($_POST["productName"], $_POST["productDesc"], "PLACEHOLDER", $_POST["productColorCode"], $_POST["productPrice"], "0");

$xScale = $_POST["originalWidth"] / $_POST["clientWidth"];

$x1 = $_POST["xCoord"] * $xScale;
$x2 = $x1 + ($_POST["width"] * $xScale);

$yScale = $_POST["originalHeight"] / $_POST["clientHeight"];

$y1 = $_POST["yCoord"] * $yScale;
$y2 = $y1 + ($_POST["height"] * $yScale);

$manipulator = new ImageManipulator($_FILES["picture"]["tmp_name"]);
$manipulator = $manipulator->crop($x1, $y1, $x2, $y2);
$imageTargetFilePath = "img/TESTER.jpeg";
$manipulator->save($imageTargetFilePath, IMAGETYPE_JPEG);


