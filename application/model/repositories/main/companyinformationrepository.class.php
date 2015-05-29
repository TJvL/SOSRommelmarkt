<?php

class CompanyInformationRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromDatabaseRow($row)
    {
        $companyInformation				= new CompanyInformation();
        $companyInformation->id			= $row["id"];
        $companyInformation->phone		= $row["phone"];
        $companyInformation->email		= $row["email"];
        $companyInformation->address	= $row["address"];
        $companyInformation->city		= $row["city"];
        $companyInformation->postalcode	= $row["postalcode"];

        return $companyInformation;
    }

    public function update($companyInformation)
    {
        $query = "UPDATE Info
					SET phone= ?, email = ?, address = ?, city = ?, postalcode = ?
					WHERE id = ?";
        $this->database->update($query, "sssssi", array($companyInformation->phone, $companyInformation->email, $companyInformation->address, $companyInformation->city, $companyInformation->postalcode, $companyInformation->id));
    }

    public function selectCurrent()
    {
        $query = "SELECT *
					FROM Info
					WHERE id = 1";

        // execute the query
        $result = $this->database->select($query);

        // put the result into an object
        $row = $result->fetch_assoc();
        $companyInformation = $this->createObjectFromDatabaseRow($row);

        // free the result set
        $result->close();

        return $companyInformation;
    }
}