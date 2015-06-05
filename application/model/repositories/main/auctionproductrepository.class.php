<?php

class AuctionProductRepository extends ProductRepository
{
    public function __construct($database)
    {
        parent::__construct($database);
    }

	private function createObjectFromArray($array)
	{
		$auctionProduct = new AuctionProduct();
		$auctionProduct->id = $array["id"];
		$auctionProduct->name = $array["name"];
		$auctionProduct->description = $array["description"];
		$auctionProduct->addedBy = $array["addedBy"];
		$auctionProduct->colorCode = $array["colorCode"];
		$auctionProduct->imagePath = $auctionProduct->getMainImagePath();
		$auctionProduct->imagePaths = $auctionProduct->getImagePaths();
	
		return $auctionProduct;
	}
	
	public function insert($name, $description, $addedBy, $colorCode)
	{
		// Insert a normal product and get back the auto incremented key.
		$id = $this->insertProduct($name, $description, $addedBy, $colorCode);
	
		$query = "INSERT INTO AuctionProduct (id)
				VALUES (?)";
		
		// Insert the auction product.
        $this->database->insert($query, "i", array($id));
	
		$auctionProduct = new AuctionProduct();
		$auctionProduct->id = $id;
		$auctionProduct->name = $name;
		$auctionProduct->description = $description;
		$auctionProduct->addedBy = $addedBy;
		$auctionProduct->colorCode = $colorCode;
		$auctionProduct->imagePath = $auctionProduct->getMainImagePath();
		$auctionProduct->imagePaths = $auctionProduct->getImagePaths();
	
		// Return an object of the newly inserted auction product.
		return $auctionProduct;
	}
	
	public function selectAll()
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.id = Product.id";
	
		$result = $this->database->select($query);
	
		$auctionProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$auctionProducts[$i] = $this->createObjectFromArray($row);
		}
	
		$result->close();
	
		return $auctionProducts;
	}
	
	public function selectById($id)
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.id = Product.id
			WHERE AuctionProduct.id = ?";
	
		$result = $this->database->select($query, "i", array($id));
		
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$auctionProduct = $this->createObjectFromArray($row);
		else
			$auctionProduct = null;
	
		$result->close();
	
		return $auctionProduct;
	}
	
	public function selectByAuctionId($id)
	{
		$query = "SELECT AuctionProduct.id, name, description, addedBy, colorCode
			FROM AuctionProductList
			JOIN AuctionProduct
			ON AuctionProduct.id = AuctionProductList.AuctionProduct_id
			JOIN Product
			ON AuctionProduct.id = Product.id
			WHERE Auction_id = ?";
	
		$result = $this->database->select($query, "i", array($id));
	
		$auctionProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$auctionProducts[$i] = $this->createObjectFromArray($row);
		}
	
		$result->close();
	
		return $auctionProducts;
	}
	
	public function selectByCurrentAuction()
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
		
		$result = $this->database->select($query);
		
		$auctionProducts = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			
			$auctionProducts[$i] = $this->createObjectFromArray($row);
		}
		
		$result->close();
		
		return $auctionProducts;
	}
	
	public function update($auctionproduct)
	{
		$this->updateProduct($auctionproduct);
	}
	
	public function deleteById($id)
	{
		// Delete from auctionproductlist table.
		$query1 = "DELETE FROM AuctionProductList WHERE AuctionProduct_id = ?";
        $this->database->update($query1, "i", array($id));
	
		// Delete from auctionproduct table.
		$query2 = "DELETE FROM AuctionProduct WHERE id = ?";
        $this->database->update($query2, "i", array($id));
	
		// Delete from product table.
        $this->deleteProductById($id);
	}
}