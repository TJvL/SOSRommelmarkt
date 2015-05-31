<?php

class PermissionRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
    {
        $permission = new Permission();
        $permission->name = $array["name"];
        $permission->description = $array["description"];

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

            $permissions[$i] = $this->createObjectFromArray($row);
        }

        $result->close();

        return $permissions;
    }

    public function selectByName($name)
    {
        $query = "SELECT *
			FROM Permission
			WHERE name = ?";

        $result = $this->database->select($query, "s", array($name));

        $row = $result->fetch_assoc();

        if ($row !== null)
            $permission = $this->createObjectFromArray($row);
        else
            $permission = null;

        $result->close();

        return $permission;
    }
}