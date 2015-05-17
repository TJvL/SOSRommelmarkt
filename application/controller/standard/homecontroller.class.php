<?php
class HomeController extends Controller
{
    function __construct()
    {
        parent::__constructor("home");
    }

    public function index_GET()
    {
        $productList = new ArrayList("AuctionProduct");
        $productList->addAll(AuctionProductRepository::selectByCurrentAuction());
        $this->render("index", $productList);
    }

    public function projects_GET()
    {
        $projectList = new ArrayList("Project");
        $projectList->addAll(Project::fetchAllProjects());
        $this->render("projects", $projectList);
    }

    public function retrieval_GET()
    {
        $this->render("retrieval");
    }

    public function aboutus_GET()
    {
        $this->render("aboutus");
    }

    public function contact_GET()
    {
        $this->render("contact");
    }

    public function contact_POST()
    {
        $from = $_POST['email'];
        $to = "caboel@student.avans.";
        $subject = $_POST['subject'];
        $message =
            'Verzonden door: ' . $_POST['name'] . "\n".
            'Telefoon nummer: ' . $_POST['phone'] . "\n".
            'Bericht:' . $_POST['comments'] . "\n";
        $headers = 'From: ' . $from . "\r\n";

        date_default_timezone_set("Europe/Amsterdam");


        if(mail($to, $subject, $message, $headers))
        {
            $this->viewbag['message'] = "Uw bericht is verzonden, wij nemen spoedig contact met U op.";
        }
        else
        {
            $this->viewbag['message'] = "Er is een fout opgetreden, probeer U het later nog eens.";
        }

        $this->render("contact");
    }



}
?>