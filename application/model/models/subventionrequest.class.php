<?php
/**
 * Model klasse voor de subsidieaanvraag.
 */
class SubventionRequest
{
    //alle waardes die we straks door moeten krijgen van het formulier, het kan zijn dat er lege waardes bij zitten, ligt eraan hoe de w
    public $id;
    public $contactperson;
    public $firm;
    public $kvk;
    public $address;
    public $postalcode;
    public $city;
    public $phonenumber1;
    public $phonenumber2;
    public $fax;
    public $email;
    public $elucidation;
    public $activities;
    public $results;
    public $status;

	static function insertSubventionRequest($contactperson,$firm,$kvk,$address,$postalcode,$city,$phonenumber1,
		$phonenumber2,$fax,$email,$elucidation,$activities,$results)
    {
		//construct query
		$query = "INSERT INTO SubventionRequest(
        	contactperson,firm,kvk,address,postalcode,city,phonenumber1,phonenumber2,fax,email,elucidation,activities,results,status)
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //execute
		$id= Database::insert($query,"ssssssssssssss",array($contactperson,$firm,$kvk,$address,$postalcode,$city,$phonenumber1,
       		$phonenumber2,$fax,$email,$elucidation,$activities,$results,"nieuw"));
    }

	static private function createSubventionRequestObjectFromDatabaseRow($row)
	{
		$subventionRequest = new SubventionRequest();
        $subventionRequest->id = $row["id"];
        $subventionRequest->contactperson = $row["contactperson"];
        $subventionRequest->firm = $row["firm"];
        $subventionRequest->kvk = $row["kvk"];
        $subventionRequest->address = $row["address"];
        $subventionRequest->postalcode = $row["postalcode"];
        $subventionRequest->city = $row["city"];
        $subventionRequest->phonenumber1 = $row["phonenumber1"];
        $subventionRequest->phonenumber2 = $row["phonenumber2"];
        $subventionRequest->fax = $row["fax"];
        $subventionRequest->email = $row["email"];
        $subventionRequest->elucidation = $row["elucidation"];
        $subventionRequest->activities = $row["activities"];
        $subventionRequest->results = $row["results"];
        $subventionRequest->status = $row["status"];
        
        return $subventionRequest;
	}

    static public function fetchAllSubventionRequests()
    {
    	$query = "SELECT * FROM SubventionRequest";
    	
    	// Execute the query.
    	$result = Database::select($query);
    	
    	// Put the results of the query into an aray of subvention request objects.
    	$subventionRequests = array();
    	
    	for ($i = 0; $i < $result->num_rows; $i++)
    	{
	    	$row = $result->fetch_assoc();
	    	
	    	$subventionRequests[$i] = SubventionRequest::createSubventionRequestObjectFromDatabaseRow($row);
    	}
    	
    	// Free the result set.
    	$result->close();
    	
    	return $subventionRequests;
    }
    
    static public function fetchSubventionRequestById($id)
    {
//        TODO moet niet nodig zijn
        include_once "database.class.php";
    	$query = "SELECT * FROM SubventionRequest WHERE id = ?";
    	 
    	// Execute the query.
    	$result = Database::select($query, "i", array($id));
    	
    	// Put the results of the query into a subvention request object.
    	$row = $result->fetch_assoc();
    	 
    	$subventionRequest = SubventionRequest::createSubventionRequestObjectFromDatabaseRow($row);
    	
    	// Free the result set.
    	$result->close();
    	 
    	return $subventionRequest;
    }

    static public function deleteById($id)
    {
        $query = "DELETE FROM SubventionRequest WHERE id = ?";

        Database::update($query, "i", array($id));
    }

    static public function getAllStatuses()
    {
        $query = "SELECT * FROM SubventionStatus";

        // Execute the query.
        $result = Database::select($query);

        $statuses = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();

            $statuses[] = $row["status"];
        }

        // Free the result set.
        $result->close();

        return $statuses;
    }

    static public function updateStatus($id, $status)
    {
        $query = "UPDATE SubventionRequest SET status = ? WHERE id = ?";
        // Execute the update query.
        Database::update($query, "ss", array($status, $id));
    }
}