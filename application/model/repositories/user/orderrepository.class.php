<?php

class OrderRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $order = new Order();
        $order->id = $row["id"];
        $order->status = $row["status"];
        $order->shippingAddressId = $row["shippingAddressId"];
        $order->billingAddressId = $row["billingAddressId"];
        $order->deliveryMethod = $row["deliveryMethod"];
        $order->payMethod = $row["payMethod"];
        $order->placedOn = $row["placedOn"];
        $order->statusChangeOn = $row["statusChangeOn"];
        $order->isPayed = $row["isPayed"];

        return $order;
    }

    public function insert($order)
    {
        $query = "INSERT INTO `Order` (status, shippingAddressId, billingAddressId, deliveryMethod, payMethod, placedOn, statusChangeOn, isPayed)
			VALUES (?, ?, ?, ?, ?, NOW(), NOW(), ?)";

        $isPayed = 0;
        $parameters = array("Nieuw", $order->shippingAddressId, $order->billingAddressId, $order->deliveryMethod, $order->payMethod, $isPayed);
        $paramTypes = "sssssi";

        $id = $this->database->insert($query, $paramTypes, $parameters);

        return $id;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM `Order`";

        $result = $this->database->select($query);

        $orders = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $order = $this->mapRowToModel($row);
            $orders[$order->id] = $order;
        }

        $result->close();

        return $orders;
    }

    public function selectById($id)
    {
        $query = "SELECT *
			FROM `Order`
			WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $order = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $order = $this->mapRowToModel($row);
        }

        $result->close();

        return $order;
    }

    public function updateStatus($order)
    {
        $query = "UPDATE `Order`
			SET status = ?, statusChangedOn = NOW()
			WHERE id = ?";
        $parameters = array($order->status, $order->id);
        $paramTypes = "ss";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function updateAddress($order)
    {
        $query = "UPDATE `Order`
			SET shippingAddress = ?, billingAddress = ?
			WHERE id = ?";
        $parameters = array($order->shippingAddress, $order->billingAddress, $order->id);
        $paramTypes = "sss";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function updatePayMethod($order)
    {
        $query = "UPDATE `Order`
			SET payMethod = ?
			WHERE id = ?";
        $parameters = array($order->payMethod, $order->id);
        $paramTypes = "ss";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function updateDeliveryMethod($order)
    {
        $query = "UPDATE `Order`
			SET deliveryMethod = ?
			WHERE id = ?";
        $parameters = array($order->deliveryMethod, $order->id);
        $paramTypes = "ss";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function updateIsPayed($order)
    {
        $query = "UPDATE `Order`
			SET isPayed = ?
			WHERE id = ?";
        $parameters = array($order->deliveryMethod, $order->isPayed);
        $paramTypes = "si";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM `Order` WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
    }
}