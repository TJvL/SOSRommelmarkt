<?php

class NewsRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
	
	private function mapRowToModel($row)
	{
		$news					= new News();
		$news->id				= $row["id"];
		$news->heading			= $row["heading"];
		$news->content			= $row["content"];
		$news->create_date		= $row["create_date"];
		$news->expiration_date	= $row["expiration_date"];
		$news->publisher		= $row["publisher"];
		
		return $news;
	}
	
	public function insert($news)
	{
		$query = "INSERT INTO News (heading, content, create_date, expiration_date, publisher)
					VALUES(?, ?, NOW(), ?, ?)";
        $parameters = array($news->heading, $news->content, $news->expiration_date, $news->publisher);
        $paramTypes = "ssss";

        $id = $this->database->insert($query, $paramTypes, $parameters);

		return $id;
	}
	
	public function update($news)
	{
		$query = "UPDATE News
					SET heading = ?, content = ?, expiration_date = ?
					WHERE id = ?";
        $parameters = array($news->heading, $news->content, $news->expiration_date, $news->id);
        $paramTypes = "sssss";
		
		$this->database->update($query, $paramTypes, $parameters);
	}

    public function selectById($id)
    {
		$query = "SELECT *
					FROM News
					WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

		$result = $this->database->select($query, $paramTypes, $parameters);

        $news = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $news = $this->mapRowToModel($row);
        }

		$result->close();
		
		return $news;
    }
	
	public function deleteById($id)
	{
		$query = "DELETE FROM News
					WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";
		
		$this->database->update($query, $paramTypes, $parameters);
	}
	
	public function selectAll()
    {
		$query = "SELECT *
					FROM News";

		$result = $this->database->select($query);

		$allNews = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
            $news = $this->mapRowToModel($row);
			$allNews[$news->id] = $news;
		}

		$result->close();
		return $allNews;
    }
    
    public function selectCurrent()
    {
    	$query = "SELECT *
    				FROM News
    				WHERE expiration_date > NOW()
    				ORDER BY create_date DESC";

    	$result = $this->database->select($query);

		$allNews = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
			$allNews[$i] = $this->mapRowToModel($row);
		}
		
		// free result
		$result->close();
		return $allNews;
    }
}
