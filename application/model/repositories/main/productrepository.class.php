<?php

abstract class ProductRepository
{
    protected $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    protected function insert($name, $description, $addedBy, $colorCode)
    {
        $query = "INSERT INTO Product (name, description, addedBy, colorCode)
			VALUES (?, ?, ?, ?)";

        return $this->database->insert($query, "ssss", array($name, $description, $addedBy, $colorCode));
    }
    
    protected function updateById($id, $name, $description, $colorCode)
    {
    	$query = "UPDATE Product
        	SET name = ?, description = ?, colorCode = ? WHERE id = ?";

        $this->database->update($query, "sssi", array($name, $description, $colorCode, $id));
    }

    protected function update($product)
    {
        $this->updateById($product->id, $product->name, $product->description, $product->colorCode);
    }

	protected function deleteById($id)
	{
		$query = "DELETE FROM Product WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
}