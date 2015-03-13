<?php
include_once "database.php";
/**
 * Model klasse voor de subsidieaanvraag.
 */
class SubventionRequest {
    //alle waardes die we straks door moeten krijgen van het formulier, het kan zijn dat er lege waardes bij zitten, ligt eraan hoe de w
    public $id;
    public $contactperson;
    public $firm;
    public $kvk;
    public $adress;
    public $postalcode;
    public $city;
    public $phonenumber1;
    public $phonenumber2;
    public $fax;
    public $email;
    public $elucidation;
    public $activities;
    public $results;







    //creeert en returned een SR object
    //op dit moment worden alle attributen individueel vanuit de sessie of de post apart meegegeven.
    //deze functie wordt op dit moment nog niet gebruikt maar kan van pas komen bij het referen/ophalen van aanvragen.
    function createSubventionRequest($id,$c,$o,$k,$a,$po,$pl,$t1,$t2,$f,$e,$t,$a,$r) {
        $sv = new SubventionRequest();
        //sla alle input op
        $sv->id = $id;
        $sv ->contactperson = $c;
        $sv ->firm = $o;
        $sv -> kvk = $k;
        $sv ->adress = $a;
        $sv ->postalcode = $po;
        $sv ->city = $pl;
        $sv ->phonenumber1 = $t1;
        $sv ->phonenumber2 = $t2;
        $sv ->fax = $f;
        $sv ->email = $e;
        $sv ->elucidation = $t;
        $sv ->results = $r;
        return $sv;
    }


    //insert object in de database.
    function insertSubventionRequest($contactperson,$firm,$kvk,$adress,$postalcode,$city,$phonenumber1
        ,$phonenumber2,$fax,$email,$elucidation,$activities,$results)
    {
        //construct query
        $query = "
INSERT INTO SubventionRequest(contactperson,firm,kvk,adress,postalcode,city,phonenumber1,phonenumber2,fax,email,elucidation,activities,results)
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //execute
       $id= Database::insert($query,"sssssssssssss",array($contactperson,$firm,$kvk,$adress,$postalcode,$city,$phonenumber1
        ,$phonenumber2,$fax,$email,$elucidation,$activities,$results));

    return $this->createSubventionRequest($id,$contactperson,$firm,$kvk,$adress,$postalcode,$city,$phonenumber1
        ,$phonenumber2,$fax,$email,$elucidation,$activities,$results);


    }



	static private function createSubventionRequestObjectFromDatabaseRow($row)
	{
		$subventionRequest = new SubventionRequest();
        $subventionRequest->id = $row["id"];
        $subventionRequest->contactperson = $row["contactperson"];
        $subventionRequest->firm = $row["firm"];
        $subventionRequest->kvk = $row["kvk"];
        $subventionRequest->adress = $row["adress"];
        $subventionRequest->postalcode = $row["postalcode"];
        $subventionRequest->city = $row["city"];
        $subventionRequest->phonenumber1 = $row["phonenumber1"];
        $subventionRequest->phonenumber2 = $row["phonenumber2"];
        $subventionRequest->fax = $row["fax"];
        $subventionRequest->email = $row["email"];
        $subventionRequest->elucidation = $row["elucidation"];
        $subventionRequest->activities = $row["activities"];
        $subventionRequest->results = $row["results"];
        
        return $subventionRequest;
	}

    static public function fetchAllSubventionRequests()
    {
    	$query = "SELECT * FROM SubventionRequest";
    	
    	// Execute the query.
    	$result = Database::fetch($query);
    	
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
    	$query = "SELECT * FROM SubventionRequest WHERE id = ?";
    	 
    	// Execute the query.
    	$result = Database::fetch($query, "i", array($id));
    	
    	// Put the results of the query into a subvention request object.
    	$row = $result->fetch_assoc();
    	 
    	$subventionRequest = SubventionRequest::createSubventionRequestObjectFromDatabaseRow($row);
    	
    	// Free the result set.
    	$result->close();
    	 
    	return $subventionRequest;
    }
}