<?php

abstract class ProductRepository
{
    protected static function insert($name, $description, $addedBy, $colorCode)
    {
        $query = "INSERT INTO Product (name, description, addedBy, colorCode)
			VALUES (?, ?, ?, ?)";

        return Database::insert($query, "ssss", array($name, $description, $addedBy, $colorCode));
    }
    
    protected static function updateById($id, $name, $description, $colorCode)
    {
    	$query = "UPDATE Product
        	SET name = ?, description = ?, colorCode = ? WHERE id = ?";
    
    	Database::update($query, "sssi", array($name, $description, $colorCode, $id));
    }

    protected static function update($product)
    {
        ProductRepository::updateById($product->id, $product->name, $product->description, $product->colorCode);
    }

	protected static function deleteById($id)
	{
		$query = "DELETE FROM Product WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
}

?>