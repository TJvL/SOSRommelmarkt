<?php

class ModuleRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
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
	
	public function insert($name, $website)
	{
		$query = "INSERT INTO Modules (heading, content, category, reference, reference_label)
					VALUES(?, ?, ?, ?, ?)";
		
		return Database::insert($query, "sssss", array($heading, $content, $category, $reference, $reference_label));
	}
	
	public function update($partner)
	{
		$query = "UPDATE Modules
					SET heading = ?, content = ?, position = ?, category = ?, reference = ?, reference_label = ?
					WHERE id = ?";
		
		Database::update($query, "ssssssi", array($this->heading, $this->content, $this->position, $this->category, $this->reference, $this->reference_label, $this->id));
	}

    public function selectById($id)
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
	
	public function deleteById($id)
	{
		$query = "DELETE FROM Modules
					WHERE id = ?";

        $this->database->update($query, "i", array($id));
	}
	
	public function selectAll()
    {
		$query = "SELECT *
					FROM Modules";
		// execute the query
		$result = $this->database->select($query);
		
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
	
	public function selectByCategory($category)
	{
		$query = "SELECT *
					FROM Modules
					WHERE category = ?
					ORDER BY position ASC";
				
		// execute the query
		$result = $this->database->select($query, "s", array($category));
		
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