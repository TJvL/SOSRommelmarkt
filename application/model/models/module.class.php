<?php

class Module
{
	public $id;
	public $heading;
	public $content;
	public $position;
	public $category;
	public $reference;
	
	private static function createObjectFromDatabaseRow($row)
	{
		$module = new Module();
		$module->id = $row["id"];
		$module->heading = $row["heading"];
		$module->content = $row["content"];
		$module->position = $row["position"];
		$module->category = $row["category"];
		$module->reference = $row["reference"];
		
		return $module;
	}
	
	public static function insert($module)
	{
		$query = "INSERT INTO Modules (heading, content, position, category, reference)
					VALUES(?, ?, ?, ?, ?)";
		
		return Database::insert($query, "sssss", array($heading, $content, $position, $category, $reference));
	}
	
	public function update()
	{
		$query = "UPDATE Modules
					SET heading = ?, content = ?, position = ?, category = ?, reference = ?
					WHERE id = ?";
		
		Database::update($query, "sssssi", array($this->heading, $this->content, $this->position, $this->category, $this->reference, $this->id));
	}
	
	public static function selectById($id)
	{
		$query = "SELECT *
					FROM Modules
					WHERE id = ?";
		
		// execute the query
		$result = Database::select($query, "i", array($id));
		
		// put the results in an object
		$row = $result->fetch_assoc();
		$module = Module::createObjectFromDatabaseRow($row);
		
		// free result
		$result->close();
		
		return $module;
	}
	
	public static function selectByCategory($category)
	{
		$query = "SELECT *
					FROM Modules
					WHERE category = ?
					ORDER BY position ASC";
				
		// execute the query
		$result = Database::select($query, "s", array($category));
		
		// put the results in an array of objects
		$modules = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$modules[$i] = Module::createObjectFromDatabaseRow($row);
		}
		
		// free result
		$result->close();
		return $modules;
	}
	
	public static function selectAll()
	{
		$query = "SELECT *
					FROM Modules";
		// execute the query
		$result = Database::select($query);
		
		// put the results in an array of objects
		$modules = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$modules[$i] = Module::createObjectFromDatabaseRow($row);
		}
		
		// free result
		$result->close();
		return $modules;
	}
	
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM Modules
					WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
}

?>
