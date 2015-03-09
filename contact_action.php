<?php
include "database.php";
//
//werkt ook niet meer
//function insertSubventionRequest($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten)
//{
////construct query
//$query = "
//INSERT INTO SubventionRequest(contactpersoon,onderneming,kvk,adres,postcode,plaats,telefoonnummer1,telefoonnummer2,fax,email,toelichting,activiteiten,resultaten)
//VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";$db = new Database();
//
//    //insert given data into database
//$db->insert($query,"sssssssssssss",array($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten));
//
//}
//
//
//insertSubventionRequest($_POST["contactpersoon"],$_POST["onderneming"],$_POST["kvk"],
//    $_POST["adres"],$_POST["postcode"],$_POST["plaats"],$_POST["telefoonnummer1"],
//    $_POST["telefoonnummer2"],$_POST["fax"],$_POST["email"],$_POST["toelichting"],
//    $_POST["activiteiten"a],$_POST["resultaten"]);