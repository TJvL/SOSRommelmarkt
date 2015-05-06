<?php
class Pages {
	public static function selectCurrent()
	{
		$query = "SELECT *
		FROM Pages
		ORDER BY name ASC";
		
		// execute the query
		$result = Database::fetch($query);
		
		// put the result into an object
		while($page_list = mysqli_fetch_assoc($r)) {
			echo $page_list['name'];	
		}
		
		// free the resultset
		$result->close();
		
		return $Pages;
	}
}
?>
