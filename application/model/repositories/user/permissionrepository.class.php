<?php

class PermissionRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $permission = new Permission();
        $permission->name = $row["name"];
        $permission->description = $row["description"];

        return $permission;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM Permission";

        $result = $this->database->select($query);

        $permissions = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $permission = $this->mapRowToModel($row);
            $permissions[$permission->name] = $permission;
        }

        $result->close();

        return $permissions;
    }

    public function selectByName($name)
    {
        $query = "SELECT *
			FROM Permission
			WHERE name = ?";
        $parameters = array($name);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $permission = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $permission = $this->mapRowToModel($row);
        }

        $result->close();

        return $permission;
    }
}