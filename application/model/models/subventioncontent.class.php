<?php

class SubventionContent {

	public $id;
	public $titel;
	public $content;


	private static function createObjectFromDatabaseRow($row)
	{
		$SubventionContent				= new SubventionContent();
		$SubventionContent->id			= $row["id"];
		$SubventionContent->titel		= $row["titel"];
		$SubventionContent->content		= $row["content"];
		
		return $SubventionContent;
	}

	public function update()
		{
			$query = "UPDATE SubventionsContent
				SET titel = ?, content = ? WHERE id = ?";
			
			Database::update($query, "ssi", array($this->titel, $this->content, $this-id));
		}
		
		public static function selectCurrent()
	{
		$query = "SELECT *
					FROM SubventionContent
					WHERE id = 1";
		
		// execute the query
		$result = Database::select($query);
		
		// put the result into an object
		$row = $result->fetch_assoc();
		$SubventionContent = SubventionContent::createObjectFromDatabaseRow($row);
		
		// free the resultset
		$result->close();
		
		return $SubventionContent;
	}

}	?>