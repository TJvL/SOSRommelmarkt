<?php

include("database.php");

class Product
{
	const MAX_IMAGE_SIZE	= 10000000;			// Maximum image size in bytes.
	const IMAGES_DIRECTORY	= "img/products/";
	
	public $id;
	public $colorCode;
	public $addedBy;
	public $name;
	public $description;
	
	public function getImagePath()
	{
		$result = glob(Product::IMAGES_DIRECTORY . $this->id . '*');
		if ($result)
			return $result[0];
		else
			return null;
	}
}

function fetchAllProducts()
{
	$query = "SELECT * FROM Product";

	// Execute the query.
	$result = Database::fetch($query);
	
	// Put the results of the query into an aray of Product objects.
	$products = array();

	for ($i = 0; $i < $result->num_rows; $i++)
	{
		$row = $result->fetch_assoc();

		$products[$i] = new Product();
		$products[$i]->id = $row["id"];
		$products[$i]->colorCode = $row["colorCode"];
		$products[$i]->addedBy = $row["addedBy"];
		$products[$i]->name = $row["name"];
		$products[$i]->description = $row["description"];
	}

	// Free the result set.
	$result->close();

	return $products;
}

function insertProduct($colorCode, $addedBy, $name, $description)
{
	$query = "INSERT INTO Product (colorCode, addedBy, name, description) VALUES (?, ?, ?, ?)";
	
	// Insert the product and get back the auto incremented key.
	$id = Database::insert($query, "isss", $colorCode, $addedBy, $name, $description);

	$product = new Product();
	$product->id = $id;
	$product->colorCode = $colorCode;
	$product->addedBy = $addedBy;
	$product->name = $name;
	$product->description = $description;

	// Return an object of the inserted product.
	return $product;
}

?>