<?php

class AddressRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
    {
        $address = new Address();
        $address->id = $row["id"];
        $address->accountId = $row["accountId"];
        $address->firstName = $row["firstName"];
        $address->lastName = $row["lastName"];
        $address->streetName = $row["streetName"];
        $address->streetNumber = $row["streetNumber"];
        $address->postCode = $row["postCode"];
        $address->city = $row["city"];
        $address->phoneNumber = $row["phoneNumber"];

        return $address;
    }

    public function insert($address)
    {
        $query = "INSERT INTO Address (accountId, firstName, lastName, streetName, streetNumber, postCode, phoneNumber, city)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $address->id = $this->database->insert($query, "ssssssss", array($address->accountId, $address->firstName, $address->lastName, $address->streetName, $address->streetNumber, $address->postCode, $address->phoneNumber, $address->city));

        return $address;
    }

    public function selectById($id)
    {
        $query = "SELECT *
			FROM Address
			WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $address = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $address = $this->mapRowToModel($row);
        }

        $result->close();

        return $address;
    }

    public function selectAllByAccountId($accountId)
    {
        $query = "SELECT *
			FROM Address
			WHERE accountId = ?";
        $parameters = array($accountId);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $addresses = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $address = $this->mapRowToModel($row);
            $addresses[$address->id] = $address;
        }

        $result->close();

        return $addresses;
    }

    public function selectAll()
    {
        $query = "SELECT *
			FROM Address";

        $result = $this->database->select($query);

        $addresses = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $address = $this->mapRowToModel($row);
            $addresses[$address->id] = $address;
        }

        $result->close();

        return $addresses;
    }

    public function update($address)
    {
        $query = "UPDATE Address
			SET firstName = ?, lastName = ?, streetName = ?, streetNumber = ?, postCode = ?, phoneNumber = ?, city = ?
			WHERE id = ?";
        $parameters = array($address->firstName, $address->lastName, $address->streetName, $address->streetNumber, $address->postCode, $address->phoneNumber, $address->city, $address->id);
        $paramTypes = "ssssssss";

        $this->database->update($query, $paramTypes, $parameters);
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Address WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
    }
}