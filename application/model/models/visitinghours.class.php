<?php

class VisitingHours {
	
	public $id; // seems unnecessary, but it's in the db...
	public $monday;
	public $tuesday;
	public $wednesday;
	public $thursday;
	public $friday;
	public $saturday;
	public $sunday;
	
	// NB. Insert & Delete zijn niet aanwezig omdat er altijd maar 1 rij in de DB staat.
	
	private static function createObjectFromDatabaseRow($row)
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
	
	public function update()
	{
		$query = "UPDATE VisitingHours
			SET monday = ?, tuesday = ?, wednesday = ?, thursday = ?, friday = ?, saturday = ?, sunday = ?
			WHERE id = ?";
		
		Database::update($query, "sssssssi", array($this->monday, $this->tuesday, $this->wednesday, $this->thursday, $this->friday, $this->saturday, $this->sunday, $this-id));
	}
	
	public static function selectCurrent()
	{
		$query = "SELECT *
					FROM VisitingHours
					WHERE id = 1";
		
		// execute the query
		$result = Database::select($query);
		
		// put the result into an object
		$row = $result->fetch_assoc();
		$visitingHours = VisitingHours::createObjectFromDatabaseRow($row);
		
		// free the resultset
		$result->close();
		
		return $visitingHours;
	}
}
?>
