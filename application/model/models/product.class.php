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

    protected static function insert($name, $description, $addedBy, $colorCode)
    {
        $query = "INSERT INTO Product (name, description, addedBy, colorCode)
                                VALUES (?, ?, ?, ?)";

        // Insert the product and get back the auto incremented key.
        return Database::insert($query, "ssss", array($name, $description, $addedBy, $colorCode));
    }

    protected function update()
    {
        $query = "UPDATE Product SET name = ?, description = ?, addedBy = ?, colorCode = ? WHERE id = ?";

        // Execute the update query.
        Database::update($query, "ssssi", array($this->name, $this->description, $this->addedBy, $this->colorCode, $this->id));
    }

	protected static function deleteById($id)
	{
		$query = "DELETE FROM Product WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
}

?>