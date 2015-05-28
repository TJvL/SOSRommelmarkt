<?php

class ModuleRepository
{
	private static function createObjectFromArray($array)
	{
		$module						= new Module();
		$module->id					= $array["id"];
		$module->heading			= $array["heading"];
		$module->content			= $array["content"];
		$module->position			= $array["position"];
		$module->category			= $array["category"];
		$module->reference			= $array["reference"];
		$module->reference_label	= $array["reference_label"];
		
		return $module;
	}
	
	public static function insert($heading, $content, $category, $reference, $reference_label)
	{
		$query = "INSERT INTO Modules (heading, content, category, reference, reference_label)
					VALUES(?, ?, ?, ?, ?)";
		
		return Database::insert($query, "sssss", array($heading, $content, $category, $reference, $reference_label));
	}
	
	public static function update($module)
	{
		$query = "UPDATE Modules
					SET heading = ?, content = ?, position = ?, category = ?, reference = ?, reference_label = ?
					WHERE id = ?";
		
		Database::update($query, "ssssssi", array($module->heading, $module->content, $module->position, $module->category, $module->reference, $module->reference_label, $module->id));
	}

    public static function selectById($id)
    {
		$query = "SELECT *
					FROM Modules
					WHERE id = ?";
		
		// execute the query
		$result = Database::select($query, "i", array($id));
		
		// put the results in an object
		$array = $result->fetch_assoc();
		$module = ModuleRepository::createObjectFromArray($array);
		
		// free result
		$result->close();
		
		return $module;
    }
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM Modules
					WHERE id = ?";
		
		Database::update($query, "i", array($id));
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
			$array = $result->fetch_assoc();
			$modules[$i] = ModuleRepository::createObjectFromArray($array);
		}
		
		// free result
		$result->close();
		return $modules;
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
			$array = $result->fetch_assoc();
			$modules[$i] = ModuleRepository::createObjectFromArray($array);
		}
		
		// free result
		$result->close();
		return $modules;
	}
}

?>