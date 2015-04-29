<?php

class CompanyInformation {
	
	public $id; // seems unnecessary, but it's in the db...
	public $phone;
	public $email;
	public $address;
	public $city;
	public $postalcode;
	
	// NB. Insert & Delete zijn niet aanwezig omdat er altijd maar 1 adres in de DB staat.
	
	private static function createObjectFromDatabaseRow($row)
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
	
	public static function update()
	{
		// Als de DB veranderd naar engels moet dit ook anders genoemd worden...
		$query = "UPDATE Info
					SET phone= ?, email = ?, address = ?, city = ?, postalcode = ?
					WHERE id = ?";
		Database::update($query, "sssssi", array($this->phone, $this->email, $this->address, $this->city, $this->postalcode, $this-id));
	}
	
	public static function selectCurrent()
	{
		$query = "SELECT *
					FROM Info
					WHERE id = 1";
		
		// execute the query
		$result = Database::fetch($query);
		
		// put the result into an object
		$row = $result->fetch_assoc();
		$companyInformation = CompanyInformation::createObjectFromDatabaseRow($row);
		
		// free the resultset
		$result->close();
		
		return $companyInformation;
	}
}
?>
