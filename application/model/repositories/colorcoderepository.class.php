<?php

class ColorCodeRepository
{
	private static function createObjectFromArray($array)
	{
		$colorCode = new ColorCode();
		$colorCode->name = $array["name"];
		$colorCode->description = $array["description"];
	
		return $colorCode;
	}
	
	public static function insert($name, $description)
	{
		$query = "INSERT INTO ColorCode (name, description)
			VALUES (?, ?)";
		
		return Database::insert($query, "ss", array($name, $description));
	}
	
	public static function selectAll()
	{
		$query = "SELECT * FROM ColorCode";
	
		// Execute the query.
		$result = Database::select($query);
	
		// Put the results of the query into an array.
		$colorCodes = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
				
			$colorCodes[$i] = ColorCodeRepository::createObjectFromArray($row);
		}
	
		// Free the result set.
		$result->close();
	
		return $colorCodes;
	}
	
	public static function deleteByName($name)
	{
		$query = "DELETE FROM ColorCode WHERE name = ?";
		
		Database::update($query, "s", array($name));
	}
}

?>