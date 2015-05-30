<?php

class ProjectRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
    {
        $project = new Project();
        $project->id = $array["idProject"];
        $project->title = $array["title"];
        $project->body = $array["body"];

        return $project;
    }

    public function insert($project)
    {
        $query = "INSERT INTO Project (title, body)
			VALUES (?, ?)";

        return $this->database->insert($query, "ss", array($project->title, $project->body));
    }

    public function selectAll()
    {
        $query = "SELECT * FROM Project";

        // Execute the query.
        $result = $this->database->select($query);

        // Put the results of the query into an array.
        $projects = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $projects[$i] = $this->createObjectFromArray($row);
        }

        // Free the result set.
        $result->close();

        return $projects;
    }

    public function selectById($id)
    {
        $query = "SELECT * FROM Project WHERE idProject = ?";

        $result = $this->database->select($query, "i", array($id));

        $row = $result->fetch_assoc();

        if ($row !== null)
            $project = $this->createObjectFromArray($row);
        else
            $project = null;

        $result->close();

        return $project;
    }

    public function update($project)
    {
        $query = "UPDATE Project
			SET title = ?, body = ?
			WHERE idProject = ?";

        $this->database->update($query, "ssi", array($project->title, $project->body, $project->id));
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Project WHERE idProject = ?";

        $this->database->update($query, "s", array($id));
    }
}