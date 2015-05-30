<?php
class HomeController extends Controller
{
    public $auctionProductRepository;
    public $sloganRepository;
    public $projectRepository;
    public $visitingHoursRepository;
    public $moduleRepository;

    public function __construct()
    {
        parent::__construct("home");
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
        $homeVM = new HomePageViewModel();

        $auctionProducts = new ArrayList("AuctionProduct");
        $auctionProducts->addAll($this->auctionProductRepository->selectByCurrentAuction());

        $slogans = new ArrayList("Slogan");
        $slogans->addAll($this->sloganRepository->selectAll());

        $visitingHours = $this->visitingHoursRepository->selectCurrent();

        $modules = $this->moduleRepository->selectByCategory("home");

        $homeVM->auctionProducts = $auctionProducts;
        $homeVM->slogans = $slogans;
        $homeVM->visitingHours = $visitingHours;
        $homeVM->modules = $modules;

        $this->render("index", $homeVM);
    }

    public function projects_GET()
    {
        $projectList = new ArrayList("Project");
        $projectList->addAll($this->projectRepository->selectAll());
        $this->render("projects", $projectList);
    }

    public function retrieval_GET()
    {
        $this->render("retrieval");
    }

    public function aboutus_GET()
    {
        $modules = $this->moduleRepository->SelectByCategory("aboutus");

        $this->render("aboutus", $modules);
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
            $this->viewBag['message'] = "Uw bericht is verzonden, wij nemen spoedig contact met U op.";
        }
        else
        {
            $this->viewBag['message'] = "Er is een fout opgetreden, probeer U het later nog eens.";
        }

        $this->render("contact");
    }



}