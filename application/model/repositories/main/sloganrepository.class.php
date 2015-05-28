<?php

class SloganRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

	private function createObjectFromArray($array)
	{
		$slogan			= new Slogan();
		$slogan->id		= $array["id"];
		$slogan->slogan	= $array["slogan"];
		
		return $slogan;
	}
	
	public function insert($slogan)
	{
		$query = "INSERT INTO Slogans (slogan)
					VALUES(?)";
		
		return $this->database->insert($query, "s", array($slogan));
	}
	
	public function update($slogan)
	{
		$query = "UPDATE Slogans
					SET slogan = ?
					WHERE id = ?";

        $this->database->update($query, "si", array($slogan->slogan, $slogan->id));
	}
	
	public function selectById($id)
	{
		$query = "SELECT *
					FROM Slogans
					WHERE id = ?";
		
		// execute the query
		$result = $this->database->select($query, "i", array($id));
		
		// put the results in an object
		$array = $result->fetch_assoc();
		$slogan = $this->createObjectFromArray($array);
		
		// free result
		$result->close();
		
		return $slogan;
	}
	
	public function selectAll()
	{
		$query = "SELECT *
					FROM Slogans";
		// execute the query
		$result = $this->database->select($query);
		
		// put the results in an array of objects
		$slogans = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$slogans[$i] = $this->createObjectFromArray($row);
		}
		
		// free result
		$result->close();
		return $slogans;
	}
	
	public function deleteById($id)
	{
		$query = "DELETE FROM Slogans
					WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
}