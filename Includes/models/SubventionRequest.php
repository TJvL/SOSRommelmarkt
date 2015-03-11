<?php
/**
 * Model klasse voor de subsidieaanvraag.
 */
include("database.php");
class SubventionRequest {
    //alle waardes die we straks door moeten krijgen van het formulier, het kan zijn dat er lege waardes bij zitten, ligt eraan hoe de w
    //INSERT AFMAKEN, ZORGEN DAT ER EEN OBJECT WORDT AANGEMAAKT EN WORDT GETRETURNED
    public $id;
    public $contactpersoon;
    public $onderneming;
    public $kvk;
    public $adres;
    public $postcode;
    public $plaats;
    public $telefoonnummer1;
    public $telefoonnummer2;
    public $fax;
    public $email;
    public $toelichting;
    public $activiteiten;
    public $resultaten;







    //creeert en returned een SR object
    //op dit moment worden alle attributen individueel vanuit de sessie of de post apart meegegeven.
    //deze functie wordt op dit moment nog niet gebruikt maar kan van pas komen bij het referen/ophalen van aanvragen.
    function createSubventionRequest($id,$c,$o,$k,$a,$po,$pl,$t1,$t2,$f,$e,$t,$a,$r) {
        $sv = new SubventionRequest();
        //sla alle input op
        $sv->id = $id;
        $sv ->contactpersoon = $c;
        $sv ->onderneming = $o;
        $sv -> kvk = $k;
        $sv ->adres = $a;
        $sv ->postcode = $po;
        $sv ->plaats = $pl;
        $sv ->telefoonnummer1 = $t1;
        $sv ->telefoonnummer2 = $t2;
        $sv ->fax = $f;
        $sv ->email = $e;
        $sv ->toelichting = $t;
        $sv ->resultaten = $r;
        return $sv;
    }
//dit werkte eerst maar volgensmij is de insert methoe veranderd

    //insert object in de database.
    function insertSubventionRequest($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
        ,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten)
    {
        //construct query
        $query = "
INSERT INTO SubventionRequest(contactpersoon,onderneming,kvk,adres,postcode,plaats,telefoonnummer1,telefoonnummer2,fax,email,toelichting,activiteiten,resultaten)
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //execute
       $id= Database::insert($query,"sssssssssssss",array($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
        ,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten));

    return $this->createSubventionRequest($id,$contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
        ,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten);


    }



//
//    //construct query
//$query = "
//                  INSERT INTO SubventionRequest(contactpersoon,onderneming,kvk,adres,postcode,plaats,telefoonnummer1,telefoonnummer2,fax,email,toelichting,activiteiten,resultaten)
//                  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
//
//    //insert given data into database and return auto incremented key
//Database::insert($query,"sssssssssssss",array($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten));
//
//    //return a SV object
//createSubsentionRequest($id,$contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten);

	static private function createSubventionRequestObjectFromDatabaseRow($row)
	{
		$subventionRequest = new SubventionRequest();
        $subventionRequest->id = $row["id"];
        $subventionRequest->contactpersoon = $row["contactpersoon"];
        $subventionRequest->onderneming = $row["onderneming"];
        $subventionRequest->kvk = $row["kvk"];
        $subventionRequest->adres = $row["adres"];
        $subventionRequest->postcode = $row["postcode"];
        $subventionRequest->plaats = $row["plaats"];
        $subventionRequest->telefoonnummer1 = $row["telefoonnummer1"];
        $subventionRequest->telefoonnummer2 = $row["telefoonnummer2"];
        $subventionRequest->fax = $row["fax"];
        $subventionRequest->email = $row["email"];
        $subventionRequest->toelichting = $row["toelichting"];
        $subventionRequest->activiteiten = $row["activiteiten"];
        $subventionRequest->resultaten = $row["resultaten"];
        
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