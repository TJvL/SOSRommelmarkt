<?php

class VisitingHoursRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function createObjectFromDatabaseRow($row)
    {
        $visitingHours				= new VisitingHours();
        $visitingHours->id			= $row["id"];
        $visitingHours->monday		= $row["monday"];
        $visitingHours->tuesday		= $row["tuesday"];
        $visitingHours->wednesday	= $row["wednesday"];
        $visitingHours->thursday	= $row["thursday"];
        $visitingHours->friday 		= $row["friday"];
        $visitingHours->saturday	= $row["saturday"];
        $visitingHours->sunday 		= $row["sunday"];

        return $visitingHours;
    }

    public function update($visitingHours)
    {
        $query = "UPDATE VisitingHours
			SET monday = ?, tuesday = ?, wednesday = ?, thursday = ?, friday = ?, saturday = ?, sunday = ?
			WHERE id = ?";

        $this->database->update($query, "sssssssi", array($visitingHours->monday, $visitingHours->tuesday, $visitingHours->wednesday, $visitingHours->thursday, $visitingHours->friday, $visitingHours->saturday, $visitingHours->sunday, $visitingHours->id));
    }

    public function selectCurrent()
    {
        $query = "SELECT *
					FROM VisitingHours
					WHERE id = 1";

        // execute the query
        $result = $this->database->select($query);

        // put the result into an object
        $row = $result->fetch_assoc();
        $visitingHours = $this->createObjectFromDatabaseRow($row);

        // free the result set
        $result->close();

        return $visitingHours;
    }
}