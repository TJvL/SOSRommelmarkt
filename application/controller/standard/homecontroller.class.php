<?php
class HomeController extends Controller
{
    function __construct()
    {
        parent::__constructor("home");
    }

    public function error_GET()
    {
        $this->viewBag['msg'] = $_SESSION['msg'];
        $this->viewBag['code'] = $_SESSION['code'];
        $this->viewBag['prevLocation'] = $_SESSION['prevLocation'];
        $this->render("error");
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
        $projectList->addAll(ProjectRepository::selectAll());
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
        $subject = $_POST['options']; //Yeah, 'subject' is called options in the view
        $message =
            'Verzonden door: ' . $_POST['name'] . "\n".
            'Telefoon nummer: ' . $_POST['phone'] . "\n".
            'E-mail adres: ' . $_POST['email'] . "\n".
            'Bericht: ' . "\n" . $_POST['explanation'] . "\n";

        date_default_timezone_set("Europe/Amsterdam");


        if(Mailer::sendNotifMail($subject, $message))
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