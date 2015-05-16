<?php

class ProjectRepository
{
    private static function createObjectFromArray($array)
    {
        $project = new Project();
        $project->id = $array["idProject"];
        $project->title = $array["title"];
        $project->body = $array["body"];

        return $project;
    }

    public static function insert($title, $description)
    {
        $query = "INSERT INTO Project (title, body)
			VALUES (?, ?)";

        return Database::insert($query, "ss", array($title, $description));
    }

    public static function selectAll()
    {
        $query = "SELECT * FROM Project";

        // Execute the query.
        $result = Database::select($query);

        // Put the results of the query into an array.
        $projects = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $projects[$i] = ProjectRepository::createObjectFromArray($row);
        }

        // Free the result set.
        $result->close();

        return $projects;
    }

    public static function selectById($id)
    {
        $query = "SELECT * FROM Project WHERE idProject = ?";

        $result = Database::select($query, "i", array($id));

        $row = $result->fetch_assoc();

        if ($row !== null)
            $project = ProjectRepository::createObjectFromArray($row);
        else
            $project = null;

        $result->close();

        return $project;
    }

    public static function update($project)
    {
        $query = "UPDATE Project
			SET title = ?, body = ?
			WHERE idProject = ?";

        Database::update($query, "ssi", array($project->title, $project->body, $project->id));
    }

    public static function deleteById($id)
    {
        $query = "DELETE FROM Project WHERE idProject = ?";

        Database::update($query, "s", array($id));
    }
}

?>