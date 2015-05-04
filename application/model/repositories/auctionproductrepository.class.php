<?php

class AuctionProductRepository extends ProductRepository
{
	private static function createObjectFromArray($array)
	{
		$auctionProduct = new AuctionProduct();
		$auctionProduct->id = $array["id"];
		$auctionProduct->name = $array["name"];
		$auctionProduct->description = $array["description"];
		$auctionProduct->addedBy = $array["addedBy"];
		$auctionProduct->colorCode = $array["colorCode"];
		$auctionProduct->imagePath = $auctionProduct->getMainImagePath();
	
		return $auctionProduct;
	}
	
	public static function insert($name, $description, $addedBy, $colorCode)
	{
		// Insert a normal product and get back the auto incremented key.
		$id = parent::insert($name, $description, $addedBy, $colorCode);
	
		$query = "INSERT INTO AuctionProduct (id)
				VALUES (?)";
		
		// Insert the auction product.
		Database::insert($query, "i", array($id));
	
		$auctionProduct = new AuctionProduct();
		$auctionProduct->id = $id;
		$auctionProduct->name = $name;
		$auctionProduct->description = $description;
		$auctionProduct->addedBy = $addedBy;
		$auctionProduct->colorCode = $colorCode;
	
		// Return an object of the newly inserted acution product.
		return $auctionProduct;
	}
	
	public static function selectAll()
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.id = Product.id";
	
		$result = Database::select($query);
	
		$auctionProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$auctionProducts[$i] = AuctionProductRepository::createObjectFromArray($row);
		}
	
		$result->close();
	
		return $auctionProducts;
	}
	
	public static function selectById($id)
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.id = Product.id
			WHERE AuctionProduct.id = ?";
	
		$result = Database::select($query, "i", array($id));
		
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$auctionProduct = AuctionProductRepository::createObjectFromArray($row);
		else
			$auctionProduct = null;
	
		$result->close();
	
		return $auctionProduct;
	}
	
	public static function selectByAuctionId($id)
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProductList
			JOIN AuctionProduct
			ON AuctionProduct.id = AuctionProductList.AuctionProduct_id
			JOIN Product
			ON AuctionProduct.id = Product.id
			WHERE Auction_id = ?";
	
		$result = Database::select($query, "i", array($id));
	
		$auctionProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$auctionProducts[$i] = AuctionProductRepository::createObjectFromArray($row);
		}
	
		$result->close();
	
		return $auctionProducts;
	}
	
	public static function selectByCurrentAuction()
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProductList
			JOIN AuctionProduct
        	ON AuctionProduct.id = AuctionProductList.AuctionProduct_id
			JOIN Product
        	ON AuctionProduct.id = Product.id
			WHERE AuctionProductList.Auction_id =
			(
				SELECT id FROM Auction
				WHERE startDate <= CURDATE()
				AND endDate > CURDATE()
				ORDER BY id ASC
				LIMIT 1
			)";
		
		$result = Database::select($query);
		
		$auctionProducts = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			
			$auctionProducts[$i] = AuctionProductRepository::createObjectFromArray($row);
		}
		
		$result->close();
		
		return $auctionProducts;
	}
	
	public static function update($product)
	{
		parent::update($product);
	}
	
	public static function deleteById($id)
	{
		// Delete from auctionproductlist table.
		$query = "DELETE FROM AuctionProductList WHERE AuctionProduct_id = ?";
		Database::update($query1, "i", array($id));
	
		// Delete from auctionproduct table.
		$query = "DELETE FROM AuctionProduct WHERE id = ?";
		Database::update($query2, "i", array($id));
	
		// Delete from product table.
		parent::deleteById($id);
	}
}

?>