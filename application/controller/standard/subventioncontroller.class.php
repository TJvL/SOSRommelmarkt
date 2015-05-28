<?php

class SubventionController extends Controller
{
    public function __construct()
    {
        parent::__construct("subvention");
    }

    public function index_GET()
    {
        $this->render("index");
    }

    public function landing_GET()
    {
        $this->render("landing");
    }

    public function landing_POST()
    {
        SubventionrequestRepository::insertSubventionRequest($_POST["name"]. " ".$_POST["lastname"],$_POST["companyname"],$_POST["kvknr"],
            $_POST["street"],$_POST["zip"],$_POST["place"],$_POST["phone"],
            $_POST["gsm"],$_POST["fax"],$_POST["email"],$_POST["explanation"],
            $_POST["planned_activities"],$_POST["intended_results"]);

        Mailer::sendNotifMail("Nieuwe subsidie-aanvraag", "FANCY TEKST HIER");

        $this->render("aanvraagSucces");
    }

    //Example for IdealForm usage - Can be deleted!
    public function example_GET()
    {
        $this->render("example");
    }
    //End Example

    public function aanvraagSucces_GET()
    {
        $this->render("aanvraagSucces");
    }
}
