<?php

abstract class ProductRepository
{
    protected $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    protected function insertProduct($name, $description, $addedBy, $colorCode)
    {
        $query = "INSERT INTO Product (name, description, addedBy, colorCode)
			VALUES (?, ?, ?, ?)";

        return $this->database->insert($query, "ssss", array($name, $description, $addedBy, $colorCode));
    }
    
    protected function updateProductById($id, $name, $description, $colorCode)
    {
    	$query = "UPDATE Product
        	SET name = ?, description = ?, colorCode = ? WHERE id = ?";

        $this->database->update($query, "sssi", array($name, $description, $colorCode, $id));
    }

    protected function updateProduct($product)
    {
        $this->updateById($product->id, $product->name, $product->description, $product->colorCode);
    }

	protected function deleteProductById($id)
	{
		$query = "DELETE FROM Product WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
}