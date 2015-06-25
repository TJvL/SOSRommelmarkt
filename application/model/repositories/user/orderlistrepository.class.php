<?php

class OrderListRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $orderList = new OrderList();
        $orderList->order_id = $row["order_id"];
        $orderList->orderProduct_id = $row["orderproduct_id"];

        return $orderList;
    }

    public function insert($orderList)
    {
        $query = "INSERT INTO OrderList (order_id, orderproduct_id)
			VALUES (?, ?)";
        $parameters = array($orderList->order_id, $orderList->orderProduct_id);
        $paramTypes = "ss";

        $id = $this->database->insert($query, $paramTypes, $parameters);

        return $id;
    }

    public function selectByOrderId($orderId)
    {
        $query = "SELECT *
			FROM OrderList
			WHERE order_id = ?";
        $parameters = array($orderId);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $orderList = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $orderItem = $this->mapRowToModel($row);
            $orderList[] = $orderItem;
        }

        $result->close();

        return $orderList;
    }

    public function deleteByOrderId($orderId)
    {
        $query = "DELETE FROM OrderList WHERE order_id = ?";
        $parameters = array($orderId);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function deleteByBothIds($orderId, $productId)
    {
        $query = "DELETE FROM OrderList WHERE order_id = ? AND orderproduct_id = ?";
        $parameters = array($orderId, $productId);
        $paramTypes = "ss";

        $this->database->update($query, $paramTypes, $parameters);
    }
}