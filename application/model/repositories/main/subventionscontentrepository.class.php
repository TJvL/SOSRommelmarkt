<?php

class SubventionsContentRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromDatabaseRow($row)
    {
        $subventionsContent				= new SubventionsContent();
        $subventionsContent->id			= $row["id"];
        $subventionsContent->titel		= $row["titel"];
        $subventionsContent->content	= $row["content"];


        return $subventionsContent;
    }

    public function update($subventionsContent)
    {
        $query = "UPDATE SubventionsContent
			SET titel = ?, content = ?
			WHERE id = ?";

        $this->database->update($query, "ssi", array($subventionsContent->titel, $subventionsContent->content, $subventionsContent->id));
    }

    public function selectCurrent()
    {
        $query = "SELECT *
					FROM SubventionsContent
					WHERE id = 1";

        // execute the query.
        $result = $this->database->select($query);

        // put the result into an object
        $row = $result->fetch_assoc();
        $subventionsContent = $this->createObjectFromDatabaseRow($row);

        // free the result set.
        $result->close();

        return $subventionsContent;
    }
}