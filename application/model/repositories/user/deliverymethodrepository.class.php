<?php

class DeliveryMethodRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->name = $row["name"];
        $deliveryMethod->description = $row["description"];

        return $deliveryMethod;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM DeliveryMethod";

        $result = $this->database->select($query);

        $deliveryMethods = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $deliveryMethod = $this->mapRowToModel($row);
            $deliveryMethods[$deliveryMethod->name] = $deliveryMethod;
        }

        $result->close();

        return $deliveryMethods;
    }
}