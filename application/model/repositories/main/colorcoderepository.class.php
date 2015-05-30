<?php

class ColorCodeRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
	{
		$colorCode = new ColorCode();
		$colorCode->name = $array["name"];
		$colorCode->description = $array["description"];
	
		return $colorCode;
	}
	
	public function insert($name, $description)
	{
		$query = "INSERT INTO ColorCode (name, description)
			VALUES (?, ?)";
		
		return $this->database->insert($query, "ss", array($name, $description));
	}
	
	public function selectAll()
	{
		$query = "SELECT * FROM ColorCode";
	
		// Execute the query.
		$result = $this->database->select($query);
	
		$colorCodes = array();
	
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
				
			$colorCodes[$i] = ColorCodeRepository::createObjectFromArray($row);
		}
	
		$result->close();
	
		return $colorCodes;
	}
	
	public function deleteByName($name)
	{
		$query = "DELETE FROM ColorCode WHERE name = ?";

        $this->database->update($query, "s", array($name));
	}
}