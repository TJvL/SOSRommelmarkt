<?php

class PartnerRepository
{
	private static function createObjectFromArray($array)
	{
		$partner = new Partner();
		$partner->id = $array["id"];
		$partner->name = $array["name"];
		$partner->website = $array["website"];
	
		return $partner;
	}
	
	public static function insert($name, $website)
	{
		$query = "INSERT INTO Partners (name, website)
			VALUES (?, ?)";
		
		$partner = new Partner();
		$partner->id = Database::insert($query, "ss", array($name, $website));
		$partner->name = $name;
		$partner->website = $website;
		
		return $partner;
	}
	
	public static function update($partner)
	{
		$query = "UPDATE Partners
			SET name = ?, website = ?
			WHERE id = ?";
		
		Database::update($query, "ssi", array($partner->name, $partner->website, $partner->id));
	}
	
	public static function updateById($id, $name, $website)
	{
		$query = "UPDATE Partners
			SET name = ?, website = ?
			WHERE id = ?";
	
		Database::update($query, "ssi", array($name, $website, $id));
	}

    public static function selectById($id)
    {
        $query = "SELECT *
			FROM Partners
			WHERE id = ?";

        $result = Database::select($query, "i", array($id));

        $row = $result->fetch_assoc();

        $partners = PartnerRepository::createObjectFromArray($row);

        $result->close();

        return $partners;
    }
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM Partners WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
	
	public static function selectAll()
    {
        $query = "SELECT *
			FROM Partners";

        $result = Database::select($query);

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

?>