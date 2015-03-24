<?php

include_once("product.class.php");

class ShopProduct extends Product
{
	// The directory the images for the shop products are placed.
	const IMAGES_DIRECTORY = "img/content/shopproducts/";
	
	public $price;
	public $isReserved;
	
	static public function getImagesDirectory()
	{
		return ShopProduct::IMAGES_DIRECTORY;
	}
	
	private static function createObjectFromDatabaseRow($row)
	{
		$shopProduct = new ShopProduct();
		$shopProduct->id = $row["id"];
		$shopProduct->name = $row["name"];
		$shopProduct->description = $row["description"];
		$shopProduct->addedBy = $row["addedBy"];
		$shopProduct->colorCode = $row["colorCode"];
		$shopProduct->price = $row["price"];
		$shopProduct->isReserved = $row["isReserved"];
		$shopProduct->imagePath = $shopProduct->getImagePath();

		return $shopProduct;
	}
	
	public static function insert($name, $description, $addedBy, $colorCode, $price, $isReserved)
	{
		// Insert the product and get back the auto incremented key.
		$id = parent::insert($name, $description, $addedBy, $colorCode);
		
		$query = "INSERT INTO ShopProduct (id, price, isReserved)
				VALUES (?, ?, ?)";
		
		// Insert the shop product.
		Database::insert($query, "idi", array($id, $price, $isReserved));
	
		$shopProduct = new ShopProduct();
		$shopProduct->id = $id;
		$shopProduct->name = $name;
		$shopProduct->description = $description;
		$shopProduct->addedBy = $addedBy;
		$shopProduct->colorCode = $colorCode;
		$shopProduct->price = $price;
		$shopProduct->isReserved = $isReserved;
	
		// Return an object of the inserted product.
		return $shopProduct;
	}
	
	public static function selectAll()
	{
		$query = "SELECT ShopProduct.id, name, description, addedBy, colorCode, price, isReserved
			FROM ShopProduct
			LEFT JOIN Product
			ON ShopProduct.id = Product.id";
	
		// Execute the query.
		$result = Database::fetch($query);
		
		// Put the results of the query into an array of Product objects.
		$shopProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
				
			$shopProducts[$i] = ShopProduct::createObjectFromDatabaseRow($row);
		}
	
		// Free the result set.
		$result->close();
	
		return $shopProducts;
	}
	
	public static function selectById($id)
	{
		$query = "SELECT ShopProduct.id, name, description, addedBy, colorCode, price, isReserved
			FROM ShopProduct
			LEFT JOIN Product
			ON ShopProduct.id = Product.id
			WHERE ShopProduct.id = ?";
		
		// Execute the query.
		$result = Database::fetch($query, "i", array($id));
	
		// Put the results of the query into a product object.
		$row = $result->fetch_assoc();
		
		$shopProduct = ShopProduct::createObjectFromDatabaseRow($row);
	
		// Free the result set.
		$result->close();
	
		return $shopProduct;
	}
	
	public function update()
	{
		parent::update();
		
		$query = "UPDATE ShopProduct SET price = ?, isReserved = ? WHERE id = ?";
	
		// Execute the update query.
		Database::update($query, "dii", array($this->price, $this->isReserved, $this->id));
	}
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM ShopProduct WHERE id = ?";
		
		Database::update($query, "i", array($id));
		
		parent::deleteById($id);
	}

    public static function getPriceRanges()
    {
        $query = "SELECT MIN(price) as lowestPrice, MAX(price) as highestPrice FROM ShopProduct";

        // Execute the query.
        $result = Database::fetch($query);

        // Put the results of the query into an array of Product objects.
        $prices = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $prices[$i] = $row["lowestPrice"];
            $prices[$i+1] = $row["highestPrice"];

        }

        // Free the result set.
        $result->close();

        return $prices;
    }
}

?>