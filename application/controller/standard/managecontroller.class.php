<?php
class ManageController extends Controller
{
    public $projectRepository;
    public $colorCodeRepository;
    public $shopProductRepository;
    public $auctionRepository;
    public $partnerRepository;
    public $auctionProductRepository;
    public $subventionRequestRepository;
    public $moduleRepository;
    public $sloganRepository;
    public $companyInformationRepository;
    public $visitingHoursRepository;
    public $newsRepository;

    public function __construct()
    {
        parent::__construct("manage");
    }

    /**
     *{{Role=Junior,Senior,Administrator;}}
     */
    public function index_GET()
    {
        $this->render("index");
    }

    public function auctionoverview_GET()
    {
        $auctionList = new ArrayList("Auction");
        $auctionList->addAll($this->auctionRepository->selectAll());
        $this->render("auctionoverview", $auctionList);
    }

    public function auctionview_GET($id)
    {
        if (isset($id))
        {
            $auction = $this->auctionRepository->selectById($id);
            $this->render("auctionview", $auction);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    public function auctionadd_GET()
    {
        $this->render("auctionadd");
    }

    public function auctionproductoverview_GET($id)
    {
        if (isset($id))
        {
            $auctionProductList = new ArrayList("AuctionProduct");
            $auctionProductList->addAll($this->auctionProductRepository->selectByAuctionId($id));

            $_SESSION["auctionId"] = $id;
            $this->render("auctionproductoverview", $auctionProductList);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    public function auctionproductview_GET($id)
    {
        if (isset($id))
        {
            $auctionProductVM = new AuctionProductEditViewModel();

            $auctionProduct = $this->auctionProductRepository->selectById($id);
            $colorCodes = $this->colorCodeRepository->selectAll();

            $auctionProductVM->auctionProduct = $auctionProduct;
            $auctionProductVM->colorCodes = $colorCodes;

            $this->render("auctionproductview", $auctionProductVM);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    public function auctionproductadd_GET()
    {
        $colorCodes = new ArrayList("ColorCode");
        $colorCodes->addAll($this->colorCodeRepository->selectAll());

        $this->render("auctionproductadd", $colorCodes);
    }

    //<editor-fold desc="News Manage***">

    /**
     *{{Permission=Tekst;}}
     */
    public function newsoverview_GET()
    {
        $allNews = new ArrayList("News");
        $allNews->addAll($this->newsRepository->selectAll());
        $this->render("newsoverview", $allNews);
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function newsview_GET($id)
    {
        $news = $this->newsRepository->selectById($id);

        if(isset($news))
        {
            $this->render("newsview", $news);
        }
        else
        {
            throw new Exception("The requested information was not found.", 404);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function newsadd_GET()
    {
        $this->render("newsadd");
    }

    //  </editor-fold>

    //<editor-fold desc="Partner Manage">

    /**
     *{{Permission=Onderdeel;}}
     */
    public function partneroverview_GET()
    {
        $partnerArray = new ArrayList("Partner");
        $partnerArray->addAll($this->partnerRepository->selectAll());
        $this->render("partneroverview", $partnerArray);
    }

    /**
     *{{Permission=Onderdeel;}}
     */
    public function partnerview_GET($id)
    {
        if (isset($id))
        {
            $this->render("partnerview", $this->partnerRepository->selectById($id));
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    /**
     *{{Permission=Onderdeel;}}
     */
    public function partneradd_GET()
    {
        $this->render("partneradd");
    }

    public function projectoverview_get()
    {
        $projectList = new ArrayList("Project");
        $projectList->addAll($this->projectRepository->selectAll());
        $this->render("projectoverview", $projectList);
    }

    public function projectview_get($id)
    {
        $this->render("projectview", $this->projectRepository->selectById($id));
    }

    public function projectadd_GET()
    {
        $this->render("projectadd");
    }

    //  </editor-fold>

    //<editor-fold desc="Shop Product Manage">

    /**
     *{{Permission=Product;}}
     */
    public function shopproductoverview_GET()
    {
        $shopProducts = new ArrayList("ShopProduct");
        $shopProducts->addAll($this->shopProductRepository->selectAll());

        $this->render("shopproductoverview", $shopProducts);
    }

    /**
     *{{Permission=Product;}}
     */
    public function shopproductview_GET($id)
    {
        // Check if the shopproductview id is set.
        if (isset($id))
        {
            $shopProductVM = new ShopProductEditViewModel();

            // Get the product.
            $shopProduct = $this->shopProductRepository->selectById($id);

            $colorCodes = new ArrayList("ColorCode");
            $colorCodes->addAll($this->colorCodeRepository->selectAll());

            $shopProductVM->shopProduct = $shopProduct;
            $shopProductVM->colorCodes = $colorCodes;

            // Render the view.
            $this->render("shopproductview", $shopProductVM);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    /**
     *{{Permission=Product;}}
     */
    public function shopproductadd_GET()
    {
        $colorCodes = new ArrayList("ColorCode");
        $colorCodes->addAll($this->colorCodeRepository->selectAll());

        $this->render("shopproductadd", $colorCodes);
    }

    //</editor-fold>

    //<editor-fold desc="Slogan Manage***">

    /**
     *{{Permission=Tekst;}}
     */
    public function sloganoverview_GET()
    {
        $slogans = new ArrayList("Slogan");
        $slogans->addAll($this->sloganRepository->selectAll());
        $this->render("sloganoverview", $slogans);
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function sloganview_GET($id)
    {
        $slogan = $this->sloganRepository->selectById($id);

        if(isset($slogan))
        {
            $this->render("sloganview", $slogan);
        }
        else
        {
            throw new Exception("The requested information was not found.", 404);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function sloganadd_GET()
    {
        $this->render("sloganadd");
    }

    //</editor-fold>

    //<editor-fold desc="Settings Manage">

    /**
     *{{Role=Administrator;}}
     */
    public function pagecontentoverview_GET()
    {
        $settingsVM = new SettingsViewModel();

        $companyInformation = $this->companyInformationRepository->selectCurrent();
        $visitingHours = $this->visitingHoursRepository->selectCurrent();
        $slogans = $this->sloganRepository->selectAll();
        $homeModules = $this->moduleRepository->selectByCategory("home");
        $aboutUsModules = $this->moduleRepository->selectByCategory("aboutus");
        $newsItems = $this->newsRepository->selectAll();

        $settingsVM->companyInformation = $companyInformation;
        $settingsVM->visitingHours = $visitingHours;
        $settingsVM->slogans = $slogans;
        $settingsVM->homeModules = $homeModules;
        $settingsVM->aboutUsModules = $aboutUsModules;
        $settingsVM->newsItems = $newsItems;

        $this->render("pagecontentoverview", $settingsVM);
    }

    /**
     *{{Permission=Onderdeel;}}
     */
    public function moduleadd_GET()
    {
        $this->render("moduleadd");
    }

    /**
     *{{Permission=Onderdeel;}}
     */
    public function moduleview_GET()
    {
        if (isset($_GET["id"]))
        {
            $this->render("moduleview", $this->moduleRepository->selectById($_GET["id"]));
        }
    }


    //</editor-fold>

    //<editor-fold desc="Subvention Manage">

    /**
     *{{Permission=Formulier;}}
     */
    public function subventionoverview_GET()
    {
        $subventionList = new ArrayList("SubventionRequest");
        $subventionList->addAll($this->subventionRequestRepository->selectAll());
        $this->render("subventionoverview", $subventionList);
    }

    public function subventionview_GET($id)
    {
        $subventionVM = new SubventionViewModel();
        $subventionVM->subventionRequest = $this->subventionRequestRepository->selectById($id);
        $subventionVM->subventionStatuses = $this->subventionRequestRepository->getAllStatuses();

        if(isset($subventionVM->subventionRequest))
        {
            $this->render("subventionview", $subventionVM);
        }
        else
        {
            throw new Exception("The requested information was not found.", 404);
        }
    }



    /**
     *{{Permission=Onderdeel;}}
     */
    public function subventionsContent_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["titel"]) && isset($_POST["content"]))
        {
            // set the data and update
            $subventionsContent             = SubventionsContent::selectCurrent();
            $subventionsContent->titel      = $_POST["titel"];
            $subventionsContent->content     = $_POST["content"];
            $subventionsContent->update();
        }
        $this->redirectTo("/manage/subventions");
    }

    /**
     *{{Permission=Formulier;}}
     */
    public function changeSubventionStatus_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["id"]) && isset($_POST["status"]))
        {
            // Get the product, set the data and update.
            $this->subventionRequestRepository->updateStatus($_POST["id"], $_POST["status"]);
            $this->subventions_GET();
        }
        else{
            //TODO: error handling
        }
    }
}
