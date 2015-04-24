<?php

 class companyInfomation {

    public static function update($Telefoon, $Email, $Adres, $Plaats )
    {
		$query = "UPDATE Info SET Telefoon = ?, Email = ?, Adres = ?, Plaats = ?";
        // Execute the update query.
        Database::update($query, "ssss", array($Telefoon, $Email, $Adres, $Plaats ));
    }
}
?>