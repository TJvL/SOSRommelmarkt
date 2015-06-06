<?php

abstract class ProductRepository
{
    protected $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    protected function insertProduct($product)
    {
        $query = "INSERT INTO Product (name, description, addedBy, colorCode)
			VALUES (?, ?, ?, ?)";

        $parameters = array($product->name, $product->description, $product->addedBy, $product->colorCode);
        $paramTypes = "ssss";

        return $this->database->insert($query, $paramTypes, $parameters);
    }
    
//    protected function updateProductById($id, $name, $description, $colorCode)
//    {
//    	$query = "UPDATE Product
//        	SET name = ?, description = ?, colorCode = ? WHERE id = ?";
//
//        $this->database->update($query, "sssi", array($name, $description, $colorCode, $id));
//    }

    protected function updateProduct($product)
    {
        $query = "UPDATE Product
        	SET name = ?, description = ?, colorCode = ? WHERE id = ?";

        $this->database->update($query, "sssi", array($product->name, $product->description, $product->colorCode, $product->id));

//        $this->updateProductById($product->id, $product->name, $product->description, $product->colorCode);
    }

	protected function deleteProductById($id)
	{
		$query = "DELETE FROM Product WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
}