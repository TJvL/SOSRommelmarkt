<?php

class SubventionRequestRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    private function mapRowToModel($row)
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

    public function insertSubventionRequest($contactperson, $firm, $kvk, $address, $postalcode, $city, $phonenumber1,
		$phonenumber2, $fax, $email, $elucidation, $activities, $results)
    {
        //construct query
        $query = "INSERT INTO SubventionRequest(
        	contactperson,firm,kvk,address,postalcode,city,phonenumber1,phonenumber2,fax,email,elucidation,activities,results,status)
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //execute
        $id = $this->database->insert($query,"ssssssssssssss",array($contactperson,$firm,$kvk,$address,$postalcode,$city,$phonenumber1,
            $phonenumber2,$fax,$email,$elucidation,$activities,$results,"nieuw"));
        
        return $id;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM SubventionRequest";

        $result = $this->database->select($query);

        $subventionRequests = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            $news = $this->mapRowToModel($row);
            $subventionRequests[$news->id] = $news;
        }

        $result->close();
        return $subventionRequests;
    }

    public function selectById($id)
    {
        $query = "SELECT * FROM SubventionRequest WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $result = $this->database->select($query, $paramTypes, $parameters);

        $subventionRequest = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $subventionRequest = $this->mapRowToModel($row);
        }

        $result->close();

        return $subventionRequest;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM SubventionRequest WHERE id = ?";
        $this->database->update($query, "i", array($id));
    }

    public function getAllStatuses()
    {
        $query = "SELECT * FROM SubventionStatus";

        // Execute the query.
        $result = $this->database->select($query);

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

    public function updateStatus($subventionrequest)
    {
        $query = "UPDATE SubventionRequest SET status = ? WHERE id = ?";
        // Execute the update query.
        $this->database->update($query, "ss", array($subventionrequest->status, $subventionrequest->id));
    }


}

