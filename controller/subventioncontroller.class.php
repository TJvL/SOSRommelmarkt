<?php
/**
 * Created by PhpStorm.
 * User: bram
 * Date: 3/12/2015
 * Time: 5:37 PM
 */


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

    //Example for IdealForm usage - Can be deleted!
    public function example_GET()
    {
        $this->render("example");
    }
    //End Example

    public function aanvraagSucces_GET()
    {
        $this->viewbag['voorbeeld'] = "hello, greetings from the viewbag";
        $this->render("aanvraagSucces");
    }


    public function landing_POST()
    {
        include_once "/model/subventionrequest.class.php";


        $sv = new SubventionRequest();
        $sv ->insertSubventionRequest($_POST["name"]. " ".$_POST["lastname"],$_POST["companyname"],$_POST["kvknr"],
            $_POST["street"],$_POST["zip"],$_POST["place"],$_POST["phone"],
            $_POST["gsm"],$_POST["fax"],$_POST["email"],$_POST["explanation"],
            $_POST["planned_activities"],$_POST["intended_results"]);
        $this->viewbag['voorbeeld'] = "hello, greetings from the viewbag";
        $this->render("aanvraagSucces");
    }


}
