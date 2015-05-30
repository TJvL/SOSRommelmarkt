<?php
class Project
{
    public $id;
    public $title;
    public $body;


    static function insertProject($title,$body)
    {
        //construct query
        $query = "INSERT INTO Project(
        	title,body)
			VALUES(?,?)";
        //execute
        $id= Database::insert($query,"ss",array($title,$body));
        return $id;
    }


    static private function createProjectObjectFromDatabaseRow($row)
    {
        $project = new Project();
        $project->id = $row["idProject"];
        $project->title = $row["title"];
        $project->body = $row["body"];
        return $project;
    }


    static public function fetchAllProjects()
    {
        $query = "SELECT * FROM Project";
        // Execute the query.
        $result = Database::select($query);
        // Put the results of the query into an aray of subvention request objects.
        $projects = array();
        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $projects[$i] = Project::createProjectObjectFromDatabaseRow($row);
        }
        // Free the result set.
        $result->close();
        return $projects;
    }


}
?>