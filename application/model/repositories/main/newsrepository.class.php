<?php

class NewsRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
	
	private function createObjectFromArray($array)
	{
		$news					= new News();
		$news->id				= $array["id"];
		$news->heading			= $array["heading"];
		$news->content			= $array["content"];
		$news->create_date		= $array["create_date"];
		$news->expiration_date	= $array["expiration_date"];
		$news->publisher		= $array["publisher"];
		
		return $news;
	}
	
	public function insert($news)
	{
		$query = "INSERT INTO News (heading, content, create_date, expiration_date, publisher)
					VALUES(?, ?, NOW(), ?, ?)";
		
		return $this->database->insert($query, "ssss", array($news->heading, $news->content, $news->expiration_date, $news->publisher));
	}
	
	public function update($news)
	{
		$query = "UPDATE News
					SET heading = ?, content = ?, create_date = ?, expiration_date = ?, publisher = ?
					WHERE id = ?";
		
		$this->database->update($query, "sssssi", array($news->heading, $news->content, $news->create_date, $news->expiration_date, $news->publisher, $news->id));
	}

    public function selectById($id)
    {
		$query = "SELECT *
					FROM News
					WHERE id = ?";
		
		// execute the query
		$result = $this->database->select($query, "i", array($id));
		
		// put the results in an object
		$array = $result->fetch_assoc();
		$news = $this->createObjectFromArray($array);
		
		// free result
		$result->close();
		
		return $news;
    }
	
	public function deleteById($id)
	{
		$query = "DELETE FROM News
					WHERE id = ?";
		
		$this->database->update($query, "i", array($id));
	}
	
	public function selectAll()
    {
		$query = "SELECT *
					FROM News";
		// execute the query
		$result = $this->database->select($query);
		
		// put the results in an array of objects
		$aNews = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$array = $result->fetch_assoc();
			$aNews[$i] = $this->createObjectFromArray($array);
		}
		
		// free result
		$result->close();
		return $aNews;
    }
    
    public function selectCurrent()
    {
    	$query = "SELECT *
    				FROM News
    				WHERE expiration_date > NOW()
    				ORDER BY create_date DESC";
    	// execute the query
    	$result = $this->database->select($query);
		
		// put the results in an array of objects
		$aNews = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$array = $result->fetch_assoc();
			$aNews[$i] = $this->createObjectFromArray($array);
		}
		
		// free result
		$result->close();
		return $aNews;
    }
}

?>
