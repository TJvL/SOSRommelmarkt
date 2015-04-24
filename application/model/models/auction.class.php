<?php

class Auction
{
	public $id;
	public $startDate;
	public $endDate;
	
	private static function createObjectFromDatabaseRow($row)
	{
		$auction = new Auction();
		$auction->id = $row["id"];
		$auction->startDate = $row["startDate"];
		$auction->endDate = $row["endDate"];
	
		return $auction;
	}
	
	public static function insert($startDate, $endDate)
	{
		$query = "INSERT INTO Auction (startDate, endDate)
					VALUES (?, ?)";
		
		return Database::insert($query, "ss", array($startDate, $endDate)); // TODO: fix dates
	}
	
	public function update()
	{
		$query = "UPDATE Auction
					SET startDate = ?, endDate = ?
					WHERE id = ?";
		
		Database::update($query, "ssi", array($this->startDate, $this->endDate, $this->id)); // TODO: fix dates
	}
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM Auction WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
	
	public static function selectAll()
    {
        $query = "SELECT *
			FROM Auction";

        // Execute the query.
        $result = Database::fetch($query);

        // Put the results of the query into an array of Product objects.
        $auctions = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $auctions[$i] = Auction::createObjectFromDatabaseRow($row);
        }

        // Free the result set.
        $result->close();

        return $auctions;
    }
	
	public static function selectById($id)
	{
		$query = "SELECT *
			FROM Auction
			WHERE id = ?";
		
		// Execute the query.
		$result = Database::fetch($query, "i", array($id));
	
		// Put the results of the query into a product object.
		$row = $result->fetch_assoc();
		
		$auction = Auction::createObjectFromDatabaseRow($row);
	
		// Free the result set.
		$result->close();
	
		return $auction;
	}
}

?>