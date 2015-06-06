<?php

class ShopProductRepository extends ProductRepository
{
    public function __construct($database)
    {
        parent::__construct($database);
    }

	private function createObjectFromArray($array)
	{
		$shopProduct = new ShopProduct();
		$shopProduct->id = $array["id"];
		$shopProduct->name = $array["name"];
		$shopProduct->description = $array["description"];
		$shopProduct->addedBy = $array["addedBy"];
		$shopProduct->colorCode = $array["colorCode"];
		$shopProduct->price = $array["price"];
		$shopProduct->isReserved = $array["isReserved"];
		$shopProduct->imagePath = $shopProduct->getMainImagePath();
		$shopProduct->imagePaths = $shopProduct->getImagePaths();

		return $shopProduct;
	}
	
	public function insert($shopproduct)
	{
		// Insert a normal product and get back the auto incremented key.
		$id = $this->insertProduct($name, $description, $addedBy, $colorCode);
		
		$query = "INSERT INTO ShopProduct (id, price, isReserved)
				VALUES (?, ?, ?)";
		
		// Insert the shop product.
        $this->database->insert($query, "idi", array($id, $price, $isReserved));
		
		$shopProduct = new ShopProduct();
		$shopProduct->id = $id;
		$shopProduct->name = $name;
		$shopProduct->description = $description;
		$shopProduct->addedBy = $addedBy;
		$shopProduct->colorCode = $colorCode;
		$shopProduct->price = $price;
		$shopProduct->isReserved = $isReserved;
		$shopProduct->imagePath = $shopProduct->getMainImagePath();
		$shopProduct->imagePaths = $shopProduct->getImagePaths();
		
		// Return an object of the inserted product.
		return $shopProduct;
	}
	
	public function selectAll()
	{
		$query = "SELECT ShopProduct.id, name, description, addedBy, colorCode, price, isReserved
			FROM ShopProduct
			LEFT JOIN Product
			ON ShopProduct.id = Product.id";
	
		$result = $this->database->select($query);
	
		$shopProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$shopProducts[$i] = $this->createObjectFromArray($row);
		}
	
		$result->close();
	
		return $shopProducts;
	}
	
	public function selectById($id)
	{
		$query = "SELECT ShopProduct.id, name, description, addedBy, colorCode, price, isReserved
			FROM ShopProduct
			LEFT JOIN Product
			ON ShopProduct.id = Product.id
			WHERE ShopProduct.id = ?";
	
		$result = $this->database->select($query, "i", array($id));
	
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$shopProduct = $this->createObjectFromArray($row);
		else
			$shopProduct = null;
	
		$result->close();
	
		return $shopProduct;
	}
	
	public function updateById($id, $name, $description, $colorCode, $price, $isReserved)
	{
		$this->updateProductById($id, $name, $description, $colorCode);
	
		$query = "UPDATE ShopProduct SET price = ?, isReserved = ? WHERE id = ?";

        $this->database->update($query, "dii", array($price, $isReserved, $id));
	}
	
	public function update($product)
	{
		$this->updateById($product->id, $product->name, $product->description, $product->colorCode, $product->price, $product->isReserved);
	}
	
	public function deleteById($id)
	{
		$query = "DELETE FROM ShopProduct WHERE id = ?";

        $this->database->update($query, "i", array($id));
		
		$this->deleteProductById($id);
	}

    public function getPriceRanges()
    {
        $query = "SELECT MIN(price) as lowestPrice, MAX(price) as highestPrice FROM ShopProduct";

        // Execute the query.
        $result = $this->database->select($query);

        $prices = $result->fetch_assoc();

        // Free the result set.
        $result->close();

        return $prices;
    }
}