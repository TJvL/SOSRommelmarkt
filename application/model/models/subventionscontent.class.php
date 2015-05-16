<?php

class SubventionsContent {

	public $id;
	public $titel;
	public $content;


	private static function createObjectFromDatabaseRow($row)
	{
		$subventionsContent				= new SubventionsContent();
		$subventionsContent->id			= $row["id"];
		$subventionsContent->titel		= $row["titel"];
		$subventionsContent->content	= $row["content"];
		
		return $subventionsContent;
	}

	public function update()
	{
		$query = "UPDATE SubventionsContent
			SET titel = ?, content = ?
			WHERE id = ?";
		
		Database::update($query, "ssi", array($this->titel, $this->content));
	}
	
		public static function selectCurrent()
	{
		$query = "SELECT *
					FROM SubventionsContent
					WHERE id = 1";
		
		// execute the query
		$result = Database::select($query);
		
		// put the result into an object
		$row = $result->fetch_assoc();
		$subventionsContent = SubventionsContent::createObjectFromDatabaseRow($row);
		
		// free the resultset
		$result->close();
		
		return $subventionsContent;
	}

}	?>