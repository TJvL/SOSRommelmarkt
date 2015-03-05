<?php
include "database.php";

//deze methode insert een request mbv de data die meegegeven wordt
//er kan nog een mogelijke model tussengevoegd worden
function insertSubventionRequest($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten)
{
//construct query
$query = "
INSERT INTO SubventionRequest(contactpersoon,onderneming,kvk,adres,postcode,plaats,telefoonnummer1,telefoonnummer2,fax,email,toelichting,activiteiten,resultaten)
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";$db = new Database();

    //insert given data into database
$db->insert($query,"sssssssssssss",array($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten));

}
//execute function met gegeven data
insertSubventionRequest($_POST["contactpersoon"],$_POST["onderneming"],$_POST["kvk"],
    $_POST["adres"],$_POST["postcode"],$_POST["plaats"],$_POST["telefoonnummer1"],
    $_POST["telefoonnummer2"],$_POST["fax"],$_POST["email"],$_POST["toelichting"],
    $_POST["activiteiten"],$_POST["resultaten"]);