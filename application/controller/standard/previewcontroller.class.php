<?php
class PreviewController extends Controller
{
    public $auctionProductRepository;
    public $sloganRepository;
    public $projectRepository;
    public $visitingHoursRepository;
    public $moduleRepository;

    public function __construct()
    {
        parent::__construct("preview");
    }

    public function index_POST()
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
}