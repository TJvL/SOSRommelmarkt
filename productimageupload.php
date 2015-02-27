<?php

/* Example form this will work with.
 * 
 * <form action="productimageupload.php" method="post" enctype="multipart/form-data">
 * Select image to upload:
 * <input type="file" name="productImage">
 * <input type="hidden" name="productId" value="1">
 * <input type="submit" name="submit" value="Upload Image">
 * </form>
 */

include("product.php");

// Check if a file was actually uploaded.
if (!isset($_POST["submit"]))
{
	die("No file uploaded.");
}

// Check if a product id was passed.
if (!isset($_POST["productId"]))
{
	die("No product ID passed.");
}

// Get the image properties and immediately check if the uploaded file is an image.
$imageProperties = getimagesize($_FILES["productImage"]["tmp_name"]);
if ($imageProperties === false)
{
	die("Uploaded file is not an image.");
}

// Check the file size.
if ($_FILES["productImage"]["size"] > Product::MAX_IMAGE_SIZE)
{
	die("Image is too large.");
}

// Allow certain file formats.
/*if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif" )
{
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}*/

// Get the target path the image will be uploaded to. The name should be the ID of the product + the file extension.
$imageTargetFilePath = Product::IMAGES_DIRECTORY . $_POST["productId"] . substr($_FILES["productImage"]["name"], strrpos($_FILES["productImage"]["name"], '.'));

if (!move_uploaded_file($_FILES["productImage"]["tmp_name"], $imageTargetFilePath))
{
	die("Error moving the file.");
}

?>