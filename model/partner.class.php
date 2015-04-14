<?php

class Partner
{
	public $id;
	public $name;
	public $website;
	
	private static function createObjectFromDatabaseRow($row)
	{
		$partner = new Partner();
		$partner->id = $row["id"];
		$partner->name = $row["name"];
		$partner->website = $row["website"];
	
		return $partner;
	}
	
	protected static function insert($name, $website)
	{
		$query = "INSERT INTO partners (name, website)
					VALUES (?, ?)";
		
		return Database::insert($query, "ss", array($name, $website));
	}
	
	protected function update()
	{
		$query = "UPDATE partners
					SET name = ?, website = ?
					WHERE id = ?";
		Database::update($query, "ssi", array($this->name, $this->website, $this->id));
	}
	
	protected static function deleteById($id)
	{
		$query = "DELETE FROM partners WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
	
	public static function selectAll()
    {
        $query = "SELECT *
			FROM partners";

        // Execute the query.
        $result = Database::fetch($query);

        // Put the results of the query into an array of Product objects.
        $partners = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $partners[$i] = Partner::createObjectFromDatabaseRow($row);
        }

        // Free the result set.
        $result->close();

        return $partners;
    }
}

?>