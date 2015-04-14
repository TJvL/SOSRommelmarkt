<?php

include_once("product.class.php");

class AuctionProduct extends Product
{	
	private static function createObjectFromDatabaseRow($row)
	{
		$auctionProduct = new AuctionProduct();
		$auctionProduct->id = $row["Product_id"];
		$auctionProduct->name = $row["name"];
		$auctionProduct->description = $row["description"];
		$auctionProduct->addedBy = $row["addedBy"];
		$auctionProduct->colorCode = $row["colorCode"];
		$auctionProduct->imagePath = $auctionProduct->getMainImagePath();
	
		return $auctionProduct;
	}
	
	public static function insert($name, $description, $addedBy, $colorCode)
	{
		// Insert the product and get back the auto incremented key.
		$id = parent::insert($name, $description, $addedBy, $colorCode);
		
		$query = "INSERT INTO AuctionProduct (id)
				VALUES (?)";
		
		// Insert the shop product.
		Database::insert($query, "i", array($id));
	
		$auctionProduct = new AuctionProduct();
		$auctionProduct->id = $id;
		$auctionProduct->name = $name;
		$auctionProduct->description = $description;
		$auctionProduct->addedBy = $addedBy;
		$auctionProduct->colorCode = $colorCode;
	
		// Return an object of the inserted product.
		return $auctionProduct;
	}
	
	public static function selectAll()
	{
		$query = "SELECT AuctionProduct.Product_id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.Product_id = Product.id";
	
		// Execute the query.
		$result = Database::fetch($query);
		
		// Put the results of the query into an array of Product objects.
		$auctionProducts = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
				
			$auctionProducts[$i] = AuctionProduct::createObjectFromDatabaseRow($row);
		}
	
		// Free the result set.
		$result->close();
	
		return $auctionProducts;
	}

    public static function selectCurrentAuction()
    {
        $query = "SELECT AuctionProduct.Product_id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.Product_id = Product.id
			WHERE AuctionProduct.Auction_id = (SELECT MAX(id) FROM Auction)
			";

        // Execute the query.
        $result = Database::fetch($query);

        // Put the results of the query into an array of Product objects.
        $auctionProducts = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $auctionProducts[$i] = AuctionProduct::createObjectFromDatabaseRow($row);
        }

        // Free the result set.
        $result->close();

        return $auctionProducts;
    }
	
	public static function selectById($id)
	{
		$query = "SELECT AuctionProduct.Product_id, name, description, addedBy, colorCode
			FROM AuctionProduct
			LEFT JOIN Product
			ON AuctionProduct.Product_id = Product.id
			WHERE AuctionProduct.Product_id = ?";
		
		// Execute the query.
		$result = Database::fetch($query, "i", array($id));
	
		// Put the results of the query into a product object.
		$row = $result->fetch_assoc();
		
		$auctionProduct = AuctionProduct::createObjectFromDatabaseRow($row);
	
		// Free the result set.
		$result->close();
	
		return $auctionProduct;
	}
	
	public function update()
	{
		parent::update();
	}
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM AuctionProduct WHERE id = ?";
		
		Database::update($query, "i", array($id));
		
		parent::deleteById($id);
	}

    public static function getCurrentAuctionDates()
    {
        $query = "SELECT startDate, endDate
			FROM Auction
			WHERE Auction.id = (SELECT MAX(id) FROM Auction)";

        // Execute the query.
        $result = Database::fetch($query);

        // Put the results of the query into an array of Product objects.
        $dates = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $dates[$i] = $row["startDate"];
            $dates[$i+1] = $row["endDate"];

        }

        // Free the result set.
        $result->close();

        return $dates;
    }
}

?>