<?php

abstract class Partner
{
	public $id;
	public $name;
	public $website;
	
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
}

?>