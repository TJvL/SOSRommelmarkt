<?php

class RoleRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
    {
        $role = new Role();
        $role->name = $array["name"];

        return $role;
    }

    public function insert($role)
    {
        $query = "INSERT INTO Role (name)
			VALUES (?)";

        $this->database->insert($query, "s", array($role->name));

        return $role;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM Role";

        $result = $this->database->select($query);

        $roles = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $roles[$i] = $this->createObjectFromArray($row);
        }

        $result->close();

        return $roles;
    }

    public function deleteByName($name)
    {
        $query = "DELETE FROM Role WHERE name = ?";

        $this->database->update($query, "s", array($name));
    }
}