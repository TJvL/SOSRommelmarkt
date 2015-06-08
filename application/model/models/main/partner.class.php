<?php

class Partner
{
	// The directory the images for the partneroverview are placed.
	const IMAGES_DIRECTORY = "img/partners";
	
	public $id;
	public $name;
	public $website;
    public $category;
	
	public static function getImagePathById($id)
	{
		$result = glob(Partner::IMAGES_DIRECTORY . "/" . $id . "." . "*");
		if ($result)
			return ROOT_PATH . "/" . $result[0];
		else
			return null;
	}
	
	public static function deleteImageById($id)
	{
		$result = glob(Partner::IMAGES_DIRECTORY . "/" . $id . "." . "*");
		if ($result)
			unlink($result[0]);
	}
	
	public static function setImageById($id, $uploadedImageFile)
	{
		// Get the image file extension.
		$imageFileExtension = pathinfo($uploadedImageFile["name"], PATHINFO_EXTENSION);
		
		// TODO: Check for valid image types.
		
		// Save the image.
		move_uploaded_file($uploadedImageFile["tmp_name"], Partner::IMAGES_DIRECTORY . "/" . $id . "." . $imageFileExtension);
	}
	
	public function getImagePath()
	{
		return Partner::getImagePathById($this->id);
	}
	
	public function setImage($uploadedImageFile)
	{		
		Partner::setImageById($this->id, $uploadedImageFile);
	}
}

?>