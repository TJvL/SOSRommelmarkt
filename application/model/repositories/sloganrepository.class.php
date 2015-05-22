<?php

class SloganRepository
{
	private static function createObjectFromArray($array)
	{
		$slogan			= new Slogan();
		$slogan->id		= $row["id"];
		$slogan->slogan	= $row["slogan"];
		
		return $slogan;
	}
	
	public static function insert($slogan)
	{
		$query = "INSERT INTO Slogans (slogan)
					VALUES(?)";
		
		return Database::insert($query, "s", array($slogan));
	}
	
	public function update()
	{
		$query = "UPDATE Slogans
					SET slogan = ?
					WHERE id = ?";
		
		Database::update($query, "si", array($this->slogan, $this->id));
	}
	
	public static function selectById($id)
	{
		$query = "SELECT *
					FROM Slogans
					WHERE id = ?";
		
		// execute the query
		$result = Database::select($query, "i", array($id));
		
		// put the results in an object
		$array = $result->fetch_assoc();
		$slogan = SloganRepository::createObjectFromArray($array);
		
		// free result
		$result->close();
		
		return $slogan;
	}
	
	public static function selectAll()
	{
		$query = "SELECT *
					FROM Slogans";
		// execute the query
		$result = Database::select($query);
		
		// put the results in an array of objects
		$slogans = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$slogans[$i] = SloganRepository::createObjectFromArray($row);
		}
		
		// free result
		$result->close();
		return $slogans;
	}
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM Slogans
					WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
}

?>