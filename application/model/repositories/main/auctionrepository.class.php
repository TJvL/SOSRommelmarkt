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
	
	public function insert($startDate, $endDate)
	{
		$query = "INSERT INTO Auction (startDate, endDate)
			VALUES (?, ?)";
		
		return $this->database->insert($query, "ss", array($startDate, $endDate)); // TODO: fix dates
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
		
			$auctions[$i] = AuctionRepository::createObjectFromArray($row);
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
			$auction = AuctionRepository::createObjectFromArray($row);
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
		$query = "DELETE FROM Auction WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
}