<?php

class AuctionRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

	private function createObjectFromArray($array)
	{
		$auction = new Auction();
		$auction->id = $array["id"];
		$auction->startDate = $array["startDate"];
		$auction->endDate = $array["endDate"];
	
		return $auction;
	}
	
	public function insert($auction)
	{
		$query = "INSERT INTO Auction (startDate, endDate)
			VALUES (?, ?)";

		return $this->database->insert($query, "ss", array($auction->startDate, $auction->endDate));
	}
	
	public function selectAll()
	{
		$query = "SELECT *
			FROM Auction";
		
		$result = $this->database->select($query);
		
		$auctions = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$auctions[$i] = $this->createObjectFromArray($row);
		}
		
		$result->close();
	
		return $auctions;
	}
	
	public function selectById($id)
	{
		$query = "SELECT *
			FROM Auction
			WHERE id = ?";
	
		$result = $this->database->select($query, "i", array($id));
	
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$auction =$this->createObjectFromArray($row);
		else
			$auction = null;
	
		$result->close();
	
		return $auction;
	}

	public function update($auction)
	{
		$query = "UPDATE Auction
			SET startDate = ?, endDate = ?
			WHERE id = ?";

        $this->database->update($query, "ssi", array($auction->startDate, $auction->endDate, $auction->id)); // TODO: fix dates
	}
	
	public function deleteById($id)
	{
        //Delete all connected auctionproducts and images

		$query = "DELETE FROM Auction WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}

    public function getCurrentAuctionDates()
    {
        $query = "SELECT startDate, endDate
			FROM Auction
			WHERE Auction.id = (SELECT MAX(id) FROM Auction)";

        // Execute the query.
        $result = $this->database->select($query);

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
