<?php

class SubventionController extends Controller
{
    function __construct()
    {
        parent::__constructor("subvention");
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

        $subject = "Subsidie-aanvraag ontvangen";
        $content = "" . $_POST['name'] . " " . $_POST['lastname'];
        if(isset($_POST["companyname"]))
        {
            $content = $content . "\nnamens " . $_POST["companyname"];
        }
        if(isset($_POST['kvknr']))
        {
            $content = $content . "\n(KVK: " . $_POST['kvknr'] .  ")";
        }
        $content = $content . "\n\nToelichting: \n" . $_POST["explanation"];
        
        Mailer::sendNotifMail($subject, $content);

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
