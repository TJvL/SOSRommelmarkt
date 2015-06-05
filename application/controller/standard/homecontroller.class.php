<?php
class HomeController extends Controller
{
    public $auctionProductRepository;
    public $sloganRepository;
    public $projectRepository;
    public $visitingHoursRepository;
    public $moduleRepository;
    public $newsRepository;

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
        
        $newsItems = $this->newsRepository->selectCurrent();

        $homeVM->auctionProducts = $auctionProducts;
        $homeVM->slogans = $slogans;
        $homeVM->visitingHours = $visitingHours;
        $homeVM->modules = $modules;
        $homeVM->newsItems = $newsItems;

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
        $companyInformation = $this->companyInformationRepository->selectCurrent();

        $this->render("contact", $companyInformation);
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


        if(Mailer::getInstance()->sendNotifMail($subject, $message))
        {
            $this->viewBag['message'] = "Uw bericht is verzonden, wij nemen spoedig contact met U op.";
        }
        else
        {
            $this->viewBag['message'] = "Er is een fout opgetreden, probeer U het later nog eens.";
        }
        $companyInformation = $this->companyInformationRepository->selectCurrent();

        $this->render("contact", $companyInformation);
    }

    public function articles_GET()
    {
        $newsList = new ArrayList("News");
        $newsList->addAll($this->newsRepository->selectCurrent());
        $this->render("articles", $newsList);
    }
}
