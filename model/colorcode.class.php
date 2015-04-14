<?php

class ColorCode
{
	public function selectAll()
	{
		$query = "SELECT * FROM ColorCode";
		
		// Execute the query.
		$result = Database::fetch($query);
		
		// Put the results of the query into an array.
		$colorCodes = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			
			$colorCodes[$i] = $row["name"];
		}
		
		// Free the result set.
		$result->close();
		
		return $colorCodes;
	}
}

?>