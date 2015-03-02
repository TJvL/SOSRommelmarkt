<?php

include("database.php");

class Product
{
	const MAX_IMAGE_SIZE	= 10000000;			// Maximum image size in bytes. 10 MB right now.
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

function createProductObject($row)
{
	$product = new Product();
	$product->id = $row["id"];
	$product->colorCode = $row["colorCode"];
	$product->addedBy = $row["addedBy"];
	$product->name = $row["name"];
	$product->description = $row["description"];
	
	return $product;
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

		$products[$i] = createProductObject($row);
	}

	// Free the result set.
	$result->close();

	return $products;
}

function fetchProductById($id)
{
	$query = "SELECT * FROM Product WHERE id = ?";
	
	// Execute the query.
	$result = Database::fetch($query, "i", array($id));

	// Put the results of the query into a product object.
	$row = $result->fetch_assoc();
	
	$product = createProductObject($row);

	// Free the result set.
	$result->close();

	return $product;
}

// TODO: Maybe implement only updating what needs to be updated. But that's probably too much work for performance we probably won't need.
function updateProduct($product)
{
	$query = "UPDATE Product SET colorCode = ?, addedBy = ?, name = ?, description = ? WHERE id = ?";
	
	// Execute the update query.
	Database::update($query, "isssi", array($product->colorCode, $product->addedBy, $product->name, $product->description, $product->id));
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