<?php

class OrderStatusRepository 
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $orderStatus = new OrderStatus();
        $orderStatus->name = $row["name"];

        return $orderStatus;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM OrderStatus";

        $result = $this->database->select($query);

        $orderStatuses = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $orderStatus = $this->mapRowToModel($row);
            $orders[$orderStatus->name] = $orderStatus;
        }

        $result->close();

        return $orderStatuses;
    }
}