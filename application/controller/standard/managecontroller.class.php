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
    public $accountRepository;
    public $roleRepository;
    public $permissionRepository;
    public $orderRepository;
    public $orderProductRepository;
    public $orderListRepository;
    public $orderStatusRepository;
    public $payMethodRepository;
    public $deliveryMethodRepository;
    public $addressRepository;

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

    //<editor-fold desc="Auction Manage">

    /**
     *{{Permission=Product;}}
     */
    public function auctionoverview_GET()
    {
        $auctionList = new ArrayList("Auction");
        $auctionList->addAll($this->auctionRepository->selectAll());
        $this->render("auctionoverview", $auctionList);
    }

    /**
     *{{Permission=Product;}}
     */
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

    /**
     *{{Permission=Product;}}
     */
    public function auctionadd_GET()
    {
        $this->render("auctionadd");
    }

    /**
     *{{Permission=Product;}}
     */
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

    /**
     *{{Permission=Product;}}
     */
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

    /**
     *{{Permission=Product;}}
     */
    public function auctionproductadd_GET()
    {
        $colorCodes = new ArrayList("ColorCode");
        $colorCodes->addAll($this->colorCodeRepository->selectAll());

        $this->render("auctionproductadd", $colorCodes);
    }

    //</editor-fold>

    //<editor-fold desc="News Manage">

    /**
     *{{Permission=Nieuws;}}
     */
    public function newsoverview_GET()
    {
        $allNews = new ArrayList("News");
        $allNews->addAll($this->newsRepository->selectAll());
        $this->render("newsoverview", $allNews);
    }

    /**
     *{{Permission=Nieuws;}}
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
     *{{Permission=Nieuws;}}
     */
    public function newsadd_GET()
    {
        $this->render("newsadd");
    }

    //  </editor-fold>

    //<editor-fold desc="Partner Manage">

    /**
     *{{Permission=Tekst;}}
     */
    public function partneroverview_GET()
    {
        $partnerArray = new ArrayList("Partner");
        $partnerArray->addAll($this->partnerRepository->selectAll());
        $this->render("partneroverview", $partnerArray);
    }

    /**
     *{{Permission=Tekst;}}
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
     *{{Permission=Tekst;}}
     */
    public function partneradd_GET()
    {
        $this->render("partneradd");
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function projectoverview_get()
    {
        $projectsVM = new ProjectsViewModel();
        
        $projectList = new ArrayList("Project");
        $projectList->addAll($this->projectRepository->selectAll());
        $projectDescription = $this->moduleRepository->selectByCategory("project-info");
        
        $projectsVM->projects = $projectList;
        $projectsVM->projectDescription = $projectDescription;
        
        $this->render("projectoverview", $projectsVM);
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function projectview_get($id)
    {
        $this->render("projectview", $this->projectRepository->selectById($id));
    }

    /**
     *{{Permission=Tekst;}}
     */
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

    //<editor-fold desc="Slogan Manage">

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
    public function settings_GET()
    {
        $settingsVM = new SettingsViewModel();

        $companyInformation = $this->companyInformationRepository->selectCurrent();
        $visitingHours = $this->visitingHoursRepository->selectCurrent();
        
        $result = glob("img/content/" . "background." . "*");
        if ($result)
        	$settingsVM->backgroundPath = ROOT_PATH . "/" . $result[0];
        else
        	$settingsVM->backgroundPath = null;

        $settingsVM->companyInformation = $companyInformation;
        $settingsVM->visitingHours = $visitingHours;

        $this->render("settings", $settingsVM);
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

    /**
     *{{Permission=Formulier;}}
     */
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

    //</editor-fold>

    //<editor-fold desc="Account Manage">

    /**
     *{{Permission=Account;}}
     */
    public function accountoverview_GET()
    {
        $accounts = $this->accountRepository->selectAll();
        $accountVMs = new ArrayList("AccountViewModel");
        foreach($accounts as $account)
        {
            $accountVM = new AccountViewModel();
            $accountVM->id = $account->id;
            $accountVM->email = $account->email;
            $accountVM->username = $account->username;
            $accountVM->role = $account->roleName;
            $accountVM->lastLogin = $account->lastLogin;

            $accountVMs->add($accountVM);
        }

        $this->render("accountoverview", $accountVMs);
    }

    /**
     *{{Permission=Account;}}
     */
    public function accountview_GET($id)
    {
        $user = AccountHelper::getUserInfo();

        if($user->id == $id)
        {
            $this->redirectTo("/account/index");
        }
        else
        {
            $account = $this->accountRepository->selectById($id);

            $accountVM = new AccountViewModel();
            $accountVM->id = $account->id;
            $accountVM->username = $account->username;
            $accountVM->email = $account->email;
            $accountVM->role = $account->roleName;
            $accountVM->lastLogin = $account->lastLogin;

            $roles = $this->roleRepository->selectAll();

            $accountPageVM = new AccountEditViewModel();
            $accountPageVM->account = $accountVM;
            $accountPageVM->possibleRoles = $roles;

            $_SESSION["edituserid"] = $id;

            $this->render("accountview", $accountPageVM);
        }
    }

    /**
     *{{Permission=Account;}}
     */
    public function accountadd_GET()
    {
        $roles = $this->roleRepository->selectAll();

        $this->render("accountadd", $roles);
    }

    //</editor-fold>

    //<editor-fold desc="Page Content Manage">

    /**
     *{{Permission=Tekst;}}
     */
    public function pagecontentmanage_GET()
    {
        $manageVM = new PageContentViewModel();

        $homeModules = $this->moduleRepository->selectByCategory("home");
        $aboutUsModules = $this->moduleRepository->selectByCategory("aboutus");

        $manageVM->homeModules = $homeModules;
        $manageVM->aboutUsModules = $aboutUsModules;

        $this->render("pagecontentmanage", $manageVM);
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function moduleadd_GET()
    {
        $this->render("moduleadd");
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function moduleview_GET($id)
    {
        $this->render("moduleview", $this->moduleRepository->selectById($id));
    }

    //</editor-fold>

    //<editor-fold desc="Order Manage">

    public function orderoverview_GET()
    {
        $orderVMs = array();

        $orders = $this->orderRepository->selectAll();
        foreach($orders as $order)
        {
            $orderVM = new OrderOverviewViewModel();

            $orderVM->id = $order->id;
            $orderVM->status = $order->status;
            $orderVM->deliveryMethod = $order->deliveryMethod;
            $orderVM->payMethod = $order->payMethod;
            $orderVM->statusChangedOn = $order->statusChangedOn;
            $orderVM->placedOn = $order->placedOn;

            if((isset($order->shippingAddressId))&&(!empty($order->shippingAddressId)))
            {
                $orderVM->shippingAddress = $this->addressRepository->selectById($order->shippingAddressId);
            }

            $orderVM->billingAddress = $this->addressRepository->selectById($order->billingAddressId);


            $orderList = $this->orderListRepository->selectByOrderId($orderVM->id);

            $totalPrice = 0.0;
            $orderVM->orderProducts = array();
            foreach($orderList as $item)
            {
                $orderProduct = $this->orderProductRepository->selectById($item->orderProduct_id);
                $totalPrice = $totalPrice + $orderProduct->price;
                $orderVM->orderProducts[] = $orderProduct;
            }
            $orderVM->totalPrice = $totalPrice;

            $orderVMs[] = $orderVM;
        }

        $this->render("orderoverview", $orderVMs);
    }

    public function orderadd_GET()
    {
        $orderVM = new OrderAddViewModel();

        $orderVM->deliveryMethods = $this->deliveryMethodRepository->selectAll();
        $orderVM->payMethods = $this->payMethodRepository->selectAll();
        $orderVM->orderStatuses = $this->$orderStatusRepository->selectAll();

        $this->render("orderadd", $orderVM);
    }

    public function orderview_GET($id)
    {
        $order = $this->orderRepository->selectById($id);

        $orderVM = new OrderOverviewViewModel();

        $orderVM->id = $order->id;
        $orderVM->status = $order->status;
        $orderVM->deliveryMethod = $order->deliveryMethod;
        $orderVM->payMethod = $order->payMethod;
        $orderVM->statusChangedOn = $order->statusChangedOn;
        $orderVM->placedOn = $order->placedOn;

        if((isset($order->shippingAddressId))&&(!empty($order->shippingAddressId)))
        {
            $orderVM->shippingAddress = $this->addressRepository->selectById($order->shippingAddressId);
        }

        $orderVM->billingAddress = $this->addressRepository->selectById($order->billingAddressId);

        if((isset($order->accountId))&&(!empty($order->accountId)))
        {
            $accountVM = new AccountViewModel();
            $account = $this->accountRepository->selectById($orderVM->billingAddress->accountId);

            $accountVM->id = $account->id;
            $accountVM->username = $account->username;
            $accountVM->email = $account->email;
        }

        $orderVM->userAccount =

        $orderList = $this->orderListRepository->selectByOrderId($orderVM->id);

        $totalPrice = 0.0;
        $orderVM->orderProducts = array();
        foreach($orderList as $item)
        {
            $orderProduct = $this->orderProductRepository->selectById($item->orderProduct_id);
            $totalPrice = $totalPrice + $orderProduct->price;
            $orderVM->orderProducts[] = $orderProduct;
        }
        $orderVM->totalPrice = $totalPrice;

        $this->render("orderview", $orderVM);
    }

    //</editor-fold>
}
