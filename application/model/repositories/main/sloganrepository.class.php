<?php

class SloganRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

	private function mapRowToModel($row)
	{
		$slogan			= new Slogan();
		$slogan->id		= $row["id"];
		$slogan->slogan	= $row["slogan"];
		
		return $slogan;
	}
	
	public function insert($slogan)
	{
		$query = "INSERT INTO Slogans (slogan)
					VALUES(?)";
        $parameters = array($slogan->slogan);
        $paramTypes = "s";

        $id = $this->database->insert($query, $paramTypes, $parameters);

		return $id;
	}
	
	public function update($slogan)
	{
		$query = "UPDATE Slogans
					SET slogan = ?
					WHERE id = ?";
        $parameters = array($slogan->slogan, $slogan->id);
        $paramTypes = "ss";

        $this->database->update($query, $paramTypes, $parameters);
	}
	
	public function selectById($id)
	{
		$query = "SELECT *
					FROM Slogans
					WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

		$result = $this->database->select($query, $paramTypes, $parameters);

        $slogan = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $slogan = $this->mapRowToModel($row);
        }

		$result->close();
		
		return $slogan;
	}

    public function deleteById($id)
    {
        $query = "DELETE FROM Slogans
					WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
    }
	
	public function selectAll()
	{
		$query = "SELECT *
					FROM Slogans";

		$result = $this->database->select($query);

		$slogans = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
            $slogan = $this->mapRowToModel($row);
			$slogans[$slogan->id] = $slogan;
		}

		$result->close();
		return $slogans;
	}
}