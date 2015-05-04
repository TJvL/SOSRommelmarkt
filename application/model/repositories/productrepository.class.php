<?php

abstract class ProductRepository
{
    protected static function insert($name, $description, $addedBy, $colorCode)
    {
        $query = "INSERT INTO Product (name, description, addedBy, colorCode)
			VALUES (?, ?, ?, ?)";

        return Database::insert($query, "ssss", array($name, $description, $addedBy, $colorCode));
    }

    protected static function update($product)
    {
        $query = "UPDATE Product
        	SET name = ?, description = ?, addedBy = ?, colorCode = ? WHERE id = ?";

        Database::update($query, "ssssi", array($product->name, $product->description, $product->addedBy, $product->colorCode, $product->id));
    }

	protected static function deleteById($id)
	{
		$query = "DELETE FROM Product WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
}

?>