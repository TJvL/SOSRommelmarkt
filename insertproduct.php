<?php

include("product.php");

// Check if all necessary variables have been given.
if (isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_FILES["productImage"]) && isset($_POST["productColorCode"]))
{
	// Insert the product into the database;
	$product = insertProduct($_POST["productColorCode"], "placeholder", $_POST["productName"], $_POST["productDescription"]);
	
	// Get the target path the image will be uploaded to. The name should be the ID of the product + the file extension.
	$imageTargetFilePath = Product::IMAGES_DIRECTORY . $product->id . substr($_FILES["productImage"]["name"], strrpos($_FILES["productImage"]["name"], '.'));
	move_uploaded_file($_FILES["productImage"]["tmp_name"], $imageTargetFilePath);
}

?>