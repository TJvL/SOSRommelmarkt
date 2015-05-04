<?php

class AuctionRepository
{
	private static function createObjectFromArray($array)
	{
		$auction = new Auction();
		$auction->id = $array["id"];
		$auction->startDate = $array["startDate"];
		$auction->endDate = $array["endDate"];
	
		return $auction;
	}
	
	public static function insert($startDate, $endDate)
	{
		$query = "INSERT INTO Auction (startDate, endDate)
			VALUES (?, ?)";
		
		return Database::insert($query, "ss", array($startDate, $endDate)); // TODO: fix dates
	}
	
	public static function selectAll()
	{
		$query = "SELECT *
			FROM Auction";
		
		$result = Database::select($query);
		
		$auctions = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$auctions[$i] = AuctionRepository::createObjectFromArray($row);
		}
		
		$result->close();
	
		return $auctions;
	}
	
	public static function selectById($id)
	{
		$query = "SELECT *
			FROM Auction
			WHERE id = ?";
	
		$result = Database::select($query, "i", array($id));
	
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$auction = AuctionRepository::createObjectFromArray($row);
		else
			$auction = null;
	
		$result->close();
	
		return $auction;
	}
	
	public static function update($auction)
	{
		$query = "UPDATE Auction
			SET startDate = ?, endDate = ?
			WHERE id = ?";
		
		Database::update($query, "ssi", array($auction->startDate, $auction->endDate, $auction->id)); // TODO: fix dates
	}
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM Auction WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
}

?>