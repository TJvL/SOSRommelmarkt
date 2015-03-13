<?php

include("product.class.php");

// Check if all necessary variables have been given.
if (isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_FILES["productImage"]) && isset($_POST["productColorCode"]) &&
		isset($_POST["addedBy"]) && isset($_POST["price"]) && isset($_POST["isReserved"]))
{
	// Insert the product into the database;
	$product = Product::insert($_POST["productColorCode"], $_POST["addedBy"], $_POST["productName"], $_POST["productDescription"], $_POST["price"], $_POST["isReserved"]);
	
	// Get the target path the image will be uploaded to. The name should be the ID of the product + the file extension.
	$imageTargetFilePath = Product::IMAGES_DIRECTORY . $product->id . substr($_FILES["productImage"]["name"], strrpos($_FILES["productImage"]["name"], '.'));
	move_uploaded_file($_FILES["productImage"]["tmp_name"], $imageTargetFilePath);
}

?>