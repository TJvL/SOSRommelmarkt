<?php

class AuctionProduct extends Product
{
	// TODO: This should be done differently...
    public static function getCurrentAuctionDates()
    {
        $query = "SELECT startDate, endDate
			FROM Auction
			WHERE Auction.id = (SELECT MAX(id) FROM Auction)";

        // Execute the query.
        $result = Database::select($query);

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
    
    public function addToAuction($auctionId)
    {
    	$query = "INSERT INTO AuctionProductList (Auction_id, AuctionProduct_id) VALUES (?, ?)";
    	
    	// Execute query.
    	Database::insert($query, "ii", array($auctionId, $this->id));
    }
}

?>