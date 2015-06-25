<?php

class PayMethodRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $payMethod = new DeliveryMethod();
        $payMethod->name = $row["name"];
        $payMethod->description = $row["description"];

        return $payMethod;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM PayMethod";

        $result = $this->database->select($query);

        $payMethods = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $payMethod = $this->mapRowToModel($row);
            $payMethods[$payMethod->name] = $payMethod;
        }

        $result->close();

        return $payMethods;
    }
}