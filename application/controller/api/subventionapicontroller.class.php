<?php

class SubventionAPIController extends APIController
{
	public $subventionRequestRepository;
	
	public function __construct()
	{
		Parent::__construct("subventionapi");
	}

	public function createsubventionrequest_POST()
	{
		// Check if all the needed info is here.
		if (isset($_POST["name"]) &&
			isset($_POST["lastname"]) &&
			isset($_POST["firm"]) &&
			isset($_POST["kvk"]) &&
			isset($_POST["address"]) &&
			isset($_POST["postalcode"]) &&
			isset($_POST["city"]) &&
			isset($_POST["phonenumber1"]) &&
			isset($_POST["phonenumber2"]) &&
			isset($_POST["fax"]) &&
			isset($_POST["email"]) &&
			isset($_POST["elucidation"]) &&
			isset($_POST["activities"]) &&
			isset($_POST["results"]))
		{
			$contactperson = $_POST["name"] . " " . $_POST["lastname"];
			
			// Insert the request.
			$id = $this->subventionRequestRepository->insertSubventionRequest($contactperson, $_POST["firm"],
				$_POST["kvk"], $_POST["address"], $_POST["postalcode"], $_POST["city"],
				$_POST["phonenumber1"], $_POST["phonenumber2"], $_POST["fax"], $_POST["email"],
				$_POST["elucidation"], $_POST["activities"], $_POST["results"]);
			
			$uploadDirectory = "files/subventions/" . $id . "/";
			
			if (!is_dir($uploadDirectory))
				mkdir($uploadDirectory, 0777, true);
			
			// Upload any attached files.
			foreach ($_FILES as $file)
			{
				// TODO: Check file extensions. It's done clientside already though.
				
				if (is_array($file["tmp_name"]))
				{
					foreach ($file["tmp_name"] as $key => $tempName)
						move_uploaded_file($tempName, $uploadDirectory . $file["name"][$key]);
				}
				else
				{
					move_uploaded_file($file["tmp_name"], $uploadDirectory . $file["name"]);
				}
			}
			
			// Send a notification mail that a subvention has been requested.
			$subject = "Subsidie-aanvraag ontvangen";
			$content = $contactperson;
			if (isset($_POST["firm"]))
			{
				$content = $content . "\nnamens " . $_POST["firm"];
			}
			if (isset($_POST['kvk']))
			{
				$content = $content . "\n(KvK: " . $_POST["kvk"] .  ")";
			}
			$content = $content . "\n\nToelichting: \n" . $_POST["elucidation"];
			
			Mailer::sendNotifMail($subject, $content);
			
			$this->respondWithJSON(0);
		}
		
		$this->respondWithJSON(1);
	}
}

?>