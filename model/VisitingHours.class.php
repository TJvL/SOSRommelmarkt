<?php

 class VisitingHours {

    public static function update($Maandag, $Dinsdag, $Woensdag, $Donderdag, $Vrijdag, $Zaterdag, $Zondag )
    {
		$query = "UPDATE Openingstijden SET Maandag = ?, Dinsdag = ?, Woensdag = ?, Donderdag = ?, Vrijdag = ?, Zaterdag = ?, Zondag = ?";
        // Execute the update query.
        Database::update($query, "iiiiiii", array($Maandag, $Dinsdag, $Woensdag, $Donderdag, $Vrijdag, $Zaterdag, $Zondag ));

    }
}
?>