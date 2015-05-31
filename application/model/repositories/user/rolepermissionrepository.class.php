<?php

class RolePermissionRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
    {
        $rolePermission = new RolePermission();
        $rolePermission->roleName = $array["roleName"];
        $rolePermission->permissionName = $array["permissionName"];

        return $rolePermission;
    }

    public function selectAllByRoleName($roleName)
    {
        $query = "SELECT *
			FROM RolePermission
			WHERE roleName = ?";

        $result = $this->database->select($query, "s", array($roleName));

        $rolePermissions = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $rolePermissions[$i] = $this->createObjectFromArray($row);
        }

        $result->close();

        return $rolePermissions;
    }
}