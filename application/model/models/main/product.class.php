<?php

abstract class Product
{
	// The directory the images for the products are placed.
	const IMAGES_DIRECTORY = "img/products";
	
    // Maximum image size in bytes. 10 MB right now.
    const MAX_IMAGE_SIZE = 10000000;

    public $id;
    public $name;
    public $description;
    public $addedBy;
    public $colorCode;
    public $imagePath;
    public $imagePaths;

    public function getMainImagePath()
    {
        $result = glob(Product::IMAGES_DIRECTORY . "/" . $this->id . "/" . "*");
        if ($result)
            return ROOT_PATH . "/" . $result[0];
        else
            return null;
    }
    
    public function getImagePaths()
    {
    	$result = glob(Product::IMAGES_DIRECTORY . "/" . $this->id . "/" . "*");
    	if ($result)
    	{
    		$imagePaths = array();
    		
    		foreach ($result as $key => $imagePath)
    		{
    			$imagePaths[$key] = ROOT_PATH . "/" . $imagePath;
    		}
    		
    		return $imagePaths;
    	}
    	else
    		return array();
    }
}

?>