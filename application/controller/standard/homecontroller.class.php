<?php
class HomeController extends Controller
{
    public $auctionRepository;
    public $auctionProductRepository;
    public $sloganRepository;
    public $projectRepository;
    public $visitingHoursRepository;
    public $moduleRepository;
    public $newsRepository;
    public $shopProductRepository;
    public $subventionRequestRepository;
    public $subventionsContentRepository;

    public function __construct()
    {
        parent::__construct("home");
    }

    public function error_GET()
    {
        if(isset($_SESSION['msg']))
        {
            $this->viewBag['msg'] = $_SESSION['msg'];
        }
        else
        {
            $this->viewBag['msg'] = "Er is een onbekende fout opgetreden.";
        }

        if(isset($_SESSION['code']))
        {
            $this->viewBag['code'] = $_SESSION['code'];
        }
        else
        {
            $this->vieBag['code'] = "?";
        }

        if(isset($_SESSION['prevLocation']))
        {
            $this->viewBag['prevLocation'] = $_SESSION['prevLocation'];
        }
        else
        {
            $this->viewBag['prevLocation'] = "home/index";
        }

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

    public function shop_GET()
    {
        $shopHomeVM = new ShopHomeViewModel();

        $shopProducts = new ArrayList("Product");
        foreach($this->shopProductRepository->selectAll() as $shopProduct)
        {
            if($shopProduct->isSold == 0)
            {
                $shopProducts->add($shopProduct);
            }
        }

        $prices = $this->shopProductRepository->getPriceRanges();

        $shopHomeVM->shopProducts = $shopProducts;
        $shopHomeVM->prices = $prices;

        $this->render("shop", $shopHomeVM);
    }

    public function auction_GET()
    {
        $auctionHomeVM = new AuctionHomeViewModel();

        $auctionProducts = new ArrayList("Product");
        $auctionProducts->addAll($this->auctionProductRepository->selectByCurrentAuction());

        $auctionDates = $this->auctionRepository->getCurrentAuctionDates();

        $auctionHomeVM->auctionProducts = $auctionProducts;
        $auctionHomeVM->auctionDates = $auctionDates;

        $this->render("auction", $auctionHomeVM);
    }

    public function subvention_GET()
    {
        $subventionsContent = $this->subventionsContentRepository->selectCurrent();

        $this->render("subvention", $subventionsContent);
    }

    public function subventionrequest_GET()
    {
        $this->render("subventionrequest");
    }

    public function subventionsuccesspage_GET()
    {
        $this->render("subventionsuccesspage");
    }

}
