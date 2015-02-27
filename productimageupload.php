<?php

include("product.php");

$imageFilePath = Product::IMAGES_DIRECTORY . basename($_FILES["productImage"]["name"]);
$imageFileType = pathinfo($imageFilePath, PATHINFO_EXTENSION);

// Check if an image was actually uploaded.
if (isset($_POST["submit"]))
{
	$imageProperties = getimagesize($_FILES["productImage"]["tmp_name"]);
	
	if ($imageProperties !== false)
	{
		echo "File is an image - " . $imageProperties["mime"] . ".";
	}
	else
		die("File is not an image.");
}

// Check file size.
if ($_FILES["productImage"]["size"] > Product::MAX_IMAGE_SIZE)
{
	die("Sorry, your file is too large.");
}

// Allow certain file formats.
/*if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
{
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}*/

if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $imageFilePath))
{
	echo "The file ". basename($_FILES["productImage"]["name"]). " has been uploaded.";
}
else
{
	die("Sorry, there was an error uploading your file.");
}

?>