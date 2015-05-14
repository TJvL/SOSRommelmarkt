<?php
class Pages {
	public static function selectCurrent()
	{
		$query = "SELECT * FROM Pages ORDER BY name ASC";
		$r = mysqli_query($dbc, $q);
		 
		// execute the query
		// $result = Database::m ysql_fetch_array($query);
		
		// put the result into an object
		while($page_list = mysqli_fetch_assoc($r)) {
			echo $page_list['name'];	
			 $blurb = substr(strip_tags($page_list['body']), 0, 20)
		}
		
		// free the resultset
		$result->close();
		
		return $Pages;
	}
}
?>
