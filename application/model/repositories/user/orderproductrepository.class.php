<?php

class OrderProductRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $orderProduct = new OrderProduct();
        $orderProduct->id = $row["id"];
        $orderProduct->name = $row["name"];
        $orderProduct->description = $row["description"];
        $orderProduct->addedBy = $row["addedBy"];
        $orderProduct->colorCode = $row["colorCode"];
        $orderProduct->price = $row["price"];

        return $orderProduct;
    }

    public function insert($orderProduct)
    {
        $query = "INSERT INTO OrderProduct (name, description, addedBy, colorCode, price)
			VALUES (?, ?, ?, ?, ?)";
        $parameters = array($orderProduct->name, $orderProduct->description, $orderProduct->addedBy, $orderProduct->colorCode, $orderProduct->price);
        $paramTypes = "sssss";

        $id = $this->database->insert($query, $paramTypes, $parameters);

        return $id;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM OrderProduct";

        $result = $this->database->select($query);

        $orderProducts = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $orderProduct = $this->mapRowToModel($row);
            $orderProducts[$orderProduct->id] = $orderProduct;
        }

        $result->close();

        return $orderProducts;
    }

    public function selectById($id)
    {
        $query = "SELECT *
			FROM OrderProduct
			WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $orderProduct = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $orderProduct = $this->mapRowToModel($row);
        }

        $result->close();

        return $orderProduct;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM OrderProduct WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
    }
}