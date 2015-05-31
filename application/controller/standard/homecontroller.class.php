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

    public function indexpreview_POST()
    {
        $homeVM = new HomePageViewModel();

        $auctionProducts = new ArrayList("AuctionProduct");
        $auctionProducts->addAll($this->auctionProductRepository->selectByCurrentAuction());

        $slogans = new ArrayList("Slogan");
        $slogans->addAll($this->sloganRepository->selectAll());

        $visitingHours = $this->visitingHoursRepository->selectCurrent();

        $modules = $this->moduleRepository->selectByCategory("home");
        $newMod = new Module();
        $newMod->id = 0;
        if(isset($_POST['id']))
        {
            $newMod->id = $_POST['id'];
        }
        $newMod->category = 'home'; //we're in the homecontroller
        $newMod->content = htmlspecialchars($_POST['content']);
        $newMod->heading = htmlspecialchars($_POST['heading']);
        $newMod->position = 0; //waiting for update
        $newMod->reference = '#'; //not needed
        $newMod->reference_label = htmlspecialchars($_POST['reference_label']);

        //Code to remove duplicates (in case of edit)
        $idToRemove = -1;
        for($i = 0; $i < count($modules); $i++)
        {
            if($modules[$i]->id == $newMod->id)
            {
                $idToRemove = $i;
                break; //we can break, because there's only one module to be added.
            }
        }
        if($idToRemove >= 0)
        {
            unset($modules[$idToRemove]);
            $modules = array_values($modules);
        }
        //Duplicate code done

        $modules[] = $newMod;

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


        if(Mailer::sendNotifMail($subject, $message))
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



}
