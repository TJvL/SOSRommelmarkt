<?php

class NewsRepository
{
	private static function createObjectFromArray($array)
	{
		$news					= new News();
		$news->id				= $array["id"];
		$news->heading			= $array["heading"];
		$news->content			= $array["content"];
		$news->create_date		= $array["create_date"];
		$news->expiration_date	= $array["expiration_date"];
		
		return $news;
	}
	
	public static function insert($heading, $content, $expiration_date)
	{
		$query = "INSERT INTO News (heading, content, create_date, expiration_date)
					VALUES(?, ?, NOW(), ?)";
		
		return Database::insert($query, "sss", array($heading, $content, $expiration_date));
	}
	
	public static function update($news)
	{
		$query = "UPDATE News
					SET heading = ?, content = ?, expiration_date = ?
					WHERE id = ?";
		
		Database::update($query, "ssssi", array($news->heading, $news->content, $news->expiration_date, $news->id));
	}

    public static function selectById($id)
    {
		$query = "SELECT *
					FROM News
					WHERE id = ?";
		
		// execute the query
		$result = Database::select($query, "i", array($id));
		
		// put the results in an object
		$array = $result->fetch_assoc();
		$news = NewsRepository::createObjectFromArray($array);
		
		// free result
		$result->close();
		
		return $news;
    }
	
	public static function deleteById($id)
	{
		$query = "DELETE FROM News
					WHERE id = ?";
		
		Database::update($query, "i", array($id));
	}
	
	public static function selectAll()
    {
		$query = "SELECT *
					FROM News";
		// execute the query
		$result = Database::select($query);
		
		// put the results in an array of objects
		$aNews = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$array = $result->fetch_assoc();
			$aNews[$i] = NewsRepository::createObjectFromArray($array);
		}
		
		// free result
		$result->close();
		return $aNews;
    }
    
    public static function selectCurrent()
    {
    	$query = "SELECT *
    				FROM News
    				WHERE expiration_date > NOW()
    				ORDER BY create_date DESC";
    	// execute the query
    	$result = Database::select($query);
		
		// put the results in an array of objects
		$aNews = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$array = $result->fetch_assoc();
			$aNews[$i] = NewsRepository::createObjectFromArray($array);
		}
		
		// free result
		$result->close();
		return $aNews;
    }
}

?>
