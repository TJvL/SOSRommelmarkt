<?php

//$_POST["productName"];
//$_POST["productDesc"];
//
//$_POST["productColorCode"];
//$_POST["productPrice"];
//
//$_POST["xCoord"];
//$_POST["yCoord"];
//$_POST["width"];
//$_POST["heigth"];

//Insert data into database and create a product variable for later use.
//$product = ShopProduct::insert($_POST["productName"], $_POST["productDesc"], "PLACEHOLDER", $_POST["productColorCode"], $_POST["productPrice"], "0");

//Get the posted image file and crop data to create our final cropped image for storage.
$image = imagecreatefromjpeg($_POST["productImage"]);

$cropRectangle = array("x" => $_POST["xCoord"], "y" => $_POST["yCoord"], "height" => $_POST["height"], "width" => $_POST["width"]);

$croppedImage = imagecrop($image, $cropRectangle);

$imageTargetFilePath = Product::IMAGES_DIRECTORY . $product->id . "jpeg";
move_uploaded_file($croppedImage, $imageTargetFilePath); die ("error!!11!!");


