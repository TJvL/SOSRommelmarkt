<?php

class PartnerRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
	{
		$partner = new Partner();
		$partner->id = $array["id"];
		$partner->name = $array["name"];
		$partner->website = $array["website"];
        $partner->category = $array["category"];
	
		return $partner;
	}
	
	public function insert($name, $website, $category)
	{
		$query = "INSERT INTO Partners (name, website, category)
			VALUES (?, ?, ?)";
		
		// Check if the website is valid (with http(s):// prefix). Add it if not.
		if (strpos($website, "http://") === false && strpos($website, "https://") === false)
			$website = "http://" . $website;
		
		$partner = new Partner();
		$partner->id = $this->database->insert($query, "sss", array($name, $website, $category));
		$partner->name = $name;
		$partner->website = $website;
        $partner->category = $category;
		
		return $partner;
	}
	
	public function update($partner)
	{
		$query = "UPDATE Partners
			SET name = ?, website = ?, category = ?
			WHERE id = ?";

        $this->database->update($query, "sssi", array($partner->name, $partner->website, $partner->category, $partner->id));
	}
	
	public function updateById($id, $name, $website, $category)
	{
		$query = "UPDATE Partners
			SET name = ?, website = ?, category = ?
			WHERE id = ?";

        $this->database->update($query, "sssi", array($name, $website, $category, $id));
	}

    public function selectById($id)
    {
        $query = "SELECT *
			FROM Partners
			WHERE id = ?";

        $result = $this->database->select($query, "i", array($id));

        $row = $result->fetch_assoc();
        
        if ($row !== null)
        	$partners = PartnerRepository::createObjectFromArray($row);
        else
        	$partners = null;

        $result->close();

        return $partners;
    }
	
	public function deleteById($id)
	{
		$query = "DELETE FROM Partners WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
	
	public function selectAll()
    {
        $query = "SELECT *
			FROM Partners";

        $result = $this->database->select($query);

        $partners = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $partners[$i] = PartnerRepository::createObjectFromArray($row);
        }

        $result->close();

        return $partners;
    }
}