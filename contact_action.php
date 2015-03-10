<?php
include "models/SubventionRequest.php";



$sv = new SubventionRequest();
$sv ->insertSubventionRequest($_POST["contactpersoon"],$_POST["onderneming"],$_POST["kvk"],
    $_POST["adres"],$_POST["postcode"],$_POST["plaats"],$_POST["telefoonnummer1"],
    $_POST["telefoonnummer2"],$_POST["fax"],$_POST["email"],$_POST["toelichting"],
    $_POST["activiteiten"],$_POST["resultaten"]);

