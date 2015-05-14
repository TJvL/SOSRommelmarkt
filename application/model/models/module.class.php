<?php

class Module
{
	public $id;
	public $heading;
	public $content;
	public $category;
	
	private static function createObjectFromDatabaseRow($row)
	{
		$module = new Module();
		$module->id = $row["id"];
		$module->heading = $row["heading"];
		$module->content = $row["content"];
		$module->category = $row["category"];
		
		return $module;
	}
	
	public static function insert($module)
	{
		$query = "INSERT INTO Modules (heading, content, category)
					VALUES(?, ?, ?)";
		
		return Database::insert($query, "sss", array($heading, $content, $category));
	}
	
	public function update()
	{
		$query = "UPDATE Modules
					SET heading = ?, content = ?, category = ?
					WHERE id = ?";
		
		Database::update($query, "sssi", array($this->heading, $this->content, $this->category, $this->id));
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
