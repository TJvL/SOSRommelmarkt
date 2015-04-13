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

    //Example for IdealForm usage - Can be deleted!
    public function example_GET()
    {
        $this->render("example");
    }
    //End Example

    public function index_POST()
    {
        include_once "/model/SubventionRequest.class.php";


        $sv = new SubventionRequest();
        $sv ->insertSubventionRequest($_POST["contactpersoon"],$_POST["onderneming"],$_POST["kvk"],
            $_POST["adres"],$_POST["postcode"],$_POST["plaats"],$_POST["telefoonnummer1"],
            $_POST["telefoonnummer2"],$_POST["fax"],$_POST["email"],$_POST["toelichting"],
            $_POST["activiteiten"],$_POST["resultaten"]);
        $this->render("index");
    }


}
