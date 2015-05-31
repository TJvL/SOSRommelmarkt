<?php

class AddressRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromArray($array)
    {
        $address = new Address();
        $address->id = $array["id"];
        $address->accountId = $array["accountId"];
        $address->firstName = $array["firstName"];
        $address->lastName = $array["lastName"];
        $address->streetName = $array["streetName"];
        $address->streetNumber = $array["streetNumber"];
        $address->postCode = $array["postCode"];
        $address->phoneNumber = $array["phoneNumber"];
        $address->country = $array["country"];

        return $address;
    }

    public function insert($address)
    {
        $query = "INSERT INTO Address (accountId, firstName, lastName, streetName, streetNumber, postCode, phoneNumber, country)
			VALUES (?)";

        $address->id = $this->database->insert($query, "ssssssss", array($address->accountId, $address->firstName, $address->lastName, $address->streetName, $address->streetNumber, $address->postCode, $address->phoneNumber, $address->country));

        return $address;
    }

    public function selectAllByUserId($userId)
    {
        $query = "SELECT *
			FROM Address
			WHERE userId = ?";

        $result = $this->database->select($query, "s", array($userId));

        $addresses = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $addresses[$i] = $this->createObjectFromArray($row);
        }

        $result->close();

        return $addresses;
    }

    public function update($address)
    {
        $query = "UPDATE Address
			SET firstName = ?, lastName = ?, streetName = ?, streetNumber = ?, postCode = ?, phoneNumber = ?, country = ?
			WHERE id = ?";

        $this->database->update($query, "ssssssss", array($address->firstName, $address->lastName, $address->streetName, $address->streetNumber, $address->postCode, $address->phoneNumber, $address->country, $address->id));
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Address WHERE id = ?";

        $this->database->update($query, "s", array($id));
    }
}