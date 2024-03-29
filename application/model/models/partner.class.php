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
	
	public static function insert($name, $website)
	{
		$query = "INSERT INTO Partners (name, website)
					VALUES (?, ?)";
		
		return Database::insert($query, "ss", array($name, $website));
	}
	
	public function update()
	{
		$query = "UPDATE Partners
					SET name = ?, website = ?
					WHERE id = ?";
		Database::update($query, "ssi", array($this->name, $this->website, $this->id));
	}

    public static function selectById($id)
    {
        $query = "SELECT *
			FROM Partners
			WHERE id = ?";

        // Execute the query.
        $result = Database::select($query, "i", array($id));

        // Put the results of the query into a product object.
        $row = $result->fetch_assoc();

        $partners = Partner::createObjectFromDatabaseRow($row);

        // Free the result set.
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

        // Execute the query.
        $result = Database::select($query);

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