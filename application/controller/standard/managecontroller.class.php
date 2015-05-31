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

    //<editor-fold desc="Pages Manage">

    public function pages_GET()
    {
        $this->render("pages");
    }

    //     public function pages_POST()
    // {
    //     // Check if all the necessary data has been sent with the request.
    //     if (isset($_POST["title"]) && isset($_POST["label"]) && isset($_POST["header"]) && isset($_POST["body"]))

    //     {
    //         // set the data and update
    //         $addPages = AddPages::selectCurrent();
    //         $addPages->title         = $_POST["title"];
    //         $addPages->label         = $_POST["label"];
    //         $addPages->header        = $_POST["header"];
    //         $addPages->body          = $_POST["body"];
    //         $addPages->update();
    //     }

    //     $this->redirectTo("/manage/pages");
    // }

    //</editor-fold>

    //<editor-fold desc="Settings Manage">

    public function settings_GET()
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

        $this->render("settings", $settingsVM);
    }

    public function settings_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["monday"]) && isset($_POST["tuesday"]) && isset($_POST["wednesday"]) && isset($_POST["thursday"]) && isset($_POST["friday"]) && isset($_POST["saturday"]) && isset($_POST["sunday"]))
        {
            // set the data and update
            $visitingHours              = new VisitingHours();
            $visitingHours->monday      = $_POST["monday"];
            $visitingHours->tuesday     = $_POST["tuesday"];
            $visitingHours->wednesday   = $_POST["wednesday"];
            $visitingHours->thursday    = $_POST["thursday"];
            $visitingHours->friday      = $_POST["friday"];
            $visitingHours->saturday    = $_POST["saturday"];
            $visitingHours->sunday      = $_POST["sunday"];
            $visitingHours->update($visitingHours);
        }

        $this->redirectTo("/manage/settings");
    }

    public function companyInformation_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["postalcode"]))
        {
            // set the data and update
            $companyInformation             = new CompanyInformation();
            $companyInformation->phone      = $_POST["phone"];
            $companyInformation->email      = $_POST["email"];
            $companyInformation->address    = $_POST["address"];
            $companyInformation->city       = $_POST["city"];
            $companyInformation->postalcode = $_POST["postalcode"];
            $companyInformation->update($companyInformation);
        }
        $this->redirectTo("/manage/settings");
    }

    //</editor-fold>

    //<editor-fold desc="Subvention Manage">
    
    public function subventions_GET()
    {
        $subventionList = new ArrayList("SubventionRequest");
        $subventionList->addAll($this->subventionRequestRepository->fetchAllSubventionRequests());
        $this->render("subventions", $subventionList);
    }
    
    public function subventions_POST()
    {
        $this->subventionRequestRepository->deleteById($_POST["id"]);
        
        $subventionList = new ArrayList("SubventionRequest");
        $subventionList->addAll($this->subventionRequestRepository->fetchAllSubventionRequests());
        $this->render("subventions", $subventionList);
    }

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

    //  </editor-fold>

    //<editor-fold desc="Projects Manage">

    public function projects_get()
    {
        $projectList = new ArrayList("Project");
        $projectList->addAll($this->projectRepository->selectAll());
        $this->render("projects", $projectList);
    }

    public function addproject_GET()
    {
        $this->render("addproject");
    }

    public function addproject_POST()
    {
        $newProject = new Project();
        $newProject->title = $_POST["title"];
        $newProject->body = $_POST["description"];

        $noVarsNull = true;

        if (!isset($_POST["title"])){
            $noVarsNull = false;
        }
        if (!isset($_POST["description"])){
            $noVarsNull = false;
        }

        if($noVarsNull) {
            $this->projectRepository->insert($newProject);

            //TODO: images upload function
//            if(!empty( $_FILES ) )
//            {
//                foreach($_FILES['images'] as $index => $tmpName  )
//                {
//                    if( !empty( $_FILES[ 'images' ][ 'error' ][ $index ] ) )
//                    {
//                        // some error occured with the file in index $index
//                        // yield an error here
//                        return false; // return false also immediately perhaps??
//                    }
//
//                    /*
//                        edit: the following is not necessary actually as it is now
//                        defined in the foreach statement ($index => $tmpName)
//
//                        // extract the temporary location
//                        $tmpName = $_FILES[ 'image' ][ 'tmp_name' ][ $index ];
//                    */
//
//                    // check whether it's not empty, and whether it indeed is an uploaded file
//                    if( !empty( $tmpName ) && is_uploaded_file( $tmpName ) )
//                    {
//                        // the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
//                        // do something with it:
//                        echo $index;
//                        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/SOSRommelmarkt/img/projects/" . $id . "/" ;
//                        move_uploaded_file( $index, $uploadPath ); // move to new location perhaps?
//                    }
//                }
//            }

//            move_uploaded_file($_FILES["images"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/" . Project::IMAGES_DIRECTORY . "/" . $id . ".png");
//            unset($_FILES["images"]);
            $this->redirectTo("/manage/projects/$newProject->id");
//            var_dump($_FILES);
//            echo $uploadPath;
        }
        else{
            //TODO:Error handling (empty object fields)
        }

    }

    public function deleteproject_POST(){

        $this->projectRepository->deleteById($_POST["id"]);
        $this->redirectTo("/manage/projects");
    }

    public function editproject_POST(){

        $project = new Project();
        $project->id = $_POST["id"];
        $project->title = $_POST["title"];
        $project->body = $_POST["description"];

        $noVarsNull = true;

        if (!isset($_POST["id"])){
            $noVarsNull = false;
        }
        if (!isset($_POST["title"])){
            $noVarsNull = false;
        }
        if (!isset($_POST["description"])){
            $noVarsNull = false;
        }

        if($noVarsNull){
            $this->projectRepository->update($project);
            $this->redirectTo("/manage/projectdetails/$project->id"); //TODO: add succes message (session data?)
        }
        else{
            //TODO: ERROR Handling
        }
    }

    public function projectdetails_GET()
    {
        // Check if the projectid id is set.
        if (isset($_GET["id"]))
        {
            // Get the product.
            $project = $this->projectRepository->selectById($_GET["id"]);

            // Render the view.
            $this->render("project", $project);
        }

        // TODO: Error or some shit
    }

    //  </editor-fold>

    //<editor-fold desc="Shop Product Manage">

    /**
     *<<Permission=Product;>>
     */
    public function shopproducts_GET()
    {
        $productIndexVM = new ShopProductsIndexViewModel();

        $shopProducts = new ArrayList("ShopProduct");
        $shopProducts->addAll($this->shopProductRepository->selectAll());

        $colorCodes = new ArrayList("ColorCode");
        $colorCodes->addAll($this->colorCodeRepository->selectAll());

        $productIndexVM->shopProducts = $shopProducts;
        $productIndexVM->colorCodes = $colorCodes;

        $this->render("shopproducts", $productIndexVM);
    }

    /**
     *<<Permission=Product;>>
     */
    public function addshopproduct_GET()
    {
        $colorCodes = new ArrayList("ColorCode");
        $colorCodes->addAll($this->colorCodeRepository->selectAll());

        $this->render("addshopproduct", $colorCodes);
    }
    
    public function addshopproduct_POST()
    {
        $shopProduct = $this->shopProductRepository->insert($_POST["name"], $_POST["description"], "Administrator", $_POST["colorCode"], $_POST["price"], false);
        $this->redirectTo("/manage/shopproduct/$shopProduct->id");
    }

    /**
     *<<Permission=Product;>>
     */
    public function shopproduct_GET($id)
    {
        // Check if the shopproduct id is set.
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
            $this->render("shopproduct", $shopProductVM);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    /**
     *<<Permission=Product;>>
     */
    public function updateshopproduct_POST()
    {
    	// Check if everything needed is here.
    	if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["colorCode"]) && isset($_POST["price"]) && isset($_POST["isReserved"]))
    	{
            $this->shopProductRepository->updateById($_POST["id"], $_POST["name"], $_POST["description"], $_POST["colorCode"], $_POST["price"], $_POST["isReserved"]);
    			
    		exit(json_encode(0));
    	}
    	 
    	exit(json_encode(1));
    }

    /**
     *<<Permission=Product;>>
     */
    public function deleteshopproduct_POST()
    {
    	// Check if everything needed is here.
    	if (isset($_POST["id"]))
    	{
    		// Delete the database entry.
            $this->shopProductRepository->deleteById($_POST["id"]);
    		
    		// Delete the product images recursively.
    		$dir = Product::IMAGES_DIRECTORY . "/" . $_POST["id"];
    		if (is_dir($dir))
    		{
    			$objects = scandir($dir);
    			foreach ($objects as $object)
    			{
    				if ($object != "." && $object != "..")
    				{
    					if (filetype($dir . "/" . $object) == "dir")
    						rrmdir($dir . "/" . $object);
    					else
    						unlink($dir . "/" . $object);
    				}
    			}
    			reset($objects);
    			rmdir($dir);
    		}
    	
    		exit(json_encode(0));
    	}
    	
    	exit(json_encode(1));
    }

    /**
     *<<Permission=Product>>
     */
    public function shopproduct_POST()
    {
        // Check if the shopproduct id is set.
        if (isset($_GET["id"]))
        {
            // TODO: weird ass workaround t'll I know the best way to do this... w/e
            // If the id equals update a post request for updating a product has been sent.
            if ($_GET["id"] == "addImage")
            {
                if (isset($_POST["productId"]) && isset($_POST["originalWidth"]) && isset($_POST["clientWidth"]) && isset($_POST["xCoord"]) && isset($_POST["width"]) &&
                        isset($_POST["originalHeight"]) && isset($_POST["clientHeight"]) && isset($_POST["yCoord"]) && isset($_POST["height"]) && isset($_FILES["file"]))
                {
                    $xScale = $_POST["originalWidth"] / $_POST["clientWidth"];
                    
                    $x1 = $_POST["xCoord"] * $xScale;
                    $x2 = $x1 + ($_POST["width"] * $xScale);
                    
                    $yScale = $_POST["originalHeight"] / $_POST["clientHeight"];
                    
                    $y1 = $_POST["yCoord"] * $yScale;
                    $y2 = $y1 + ($_POST["height"] * $yScale);
                    
                    // Generate numbah.
                    for ($i = 1; file_exists(Product::IMAGES_DIRECTORY . "/" . $_POST["productId"] . "/" . $i . ".jpg"); $i++) {}
                    
                    $manipulator = new ImageManipulator($_FILES["file"]["tmp_name"]);
                    $manipulator = $manipulator->crop($x1, $y1, $x2, $y2);
                    $imageTargetFilePath = Product::IMAGES_DIRECTORY . "/" . $_POST["productId"] . "/" . $i . ".jpg";
                    $manipulator->save($imageTargetFilePath, IMAGETYPE_JPEG);
                    
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "deleteImage")
            {
                if (isset($_POST["productId"]) && isset($_POST["imageName"]))
                {
                    unlink(Product::IMAGES_DIRECTORY . "/" . $_POST["productId"] . "/" . $_POST["imageName"]);
                    
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }

    //  </editor-fold>

    //<editor-fold desc="Auction Manage">

    public function auctions_GET()
    {
        $auctionList = new ArrayList("Auction");
        $auctionList->addAll($this->auctionRepository->selectAll());
        
        $this->render("auctions", $auctionList);
    }
    
    public function auctions_POST()
    {
        if (isset($_GET["id"]))
        {
            if ($_GET["id"] == "delete")
            {
                if (isset($_POST["auctionId"]))
                {
                    $auction = $this->auctionRepository->deleteById($_POST["auctionId"]);
                    
                    // return 0 for success
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // TODO: Implement update function
            }
        }
        
        // TODO: deal with errors
        exit(json_encode(1));
    }
    public function addauction_GET()
    {
        $this->render("addauction");
    }
    
    public function addauction_POST()
    {
        $auction = $this->auctionRepository->insert($_POST["startDate"], $_POST['endDate']);
        //$this->redirectTo("/manage/editauction/$auction->id");
        $this->redirectTo("/manage/auctions"); // tijdelijk totdat editauction compleet is
    }
    
    public function editauction_GET($id)
    {
        if (isset($id))
        {
            // get the auction products
            $auctionProductList = new ArrayList("AuctionProduct");
            $auctionProductList->addAll($this->auctionProductRepository->selectByAuctionId($id));
            
            // render
            $_SESSION["auctionId"] = $id;
            $this->render("editauction", $auctionProductList);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }

    //  </editor-fold>

    //<editor-fold desc="Partner Manage">

    public function partners_GET()
    {
        $partnerArray = new ArrayList("Partner");
        $partnerArray->addAll($this->partnerRepository->selectAll());
        $this->render("partners", $partnerArray);
    }

    public function addpartner_GET()
    {
        $this->render("addpartner");
    }

    public function partner_GET($id)
    {
        if (isset($id))
        {
            $this->render("partner", $this->partnerRepository->selectById($id));
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }


    public function createpartner_POST()
    {
        // Check if everything needed is here.
        if (isset($_POST["name"]) && isset($_POST["website"]) && isset($_POST["category"]) && isset($_FILES["image"]))
        {
            // Insert the partner record. And set $post id to the id for setpartnerimage.
            $image = $this->partnerRepository->insert($_POST["name"], $_POST["website"], $_POST["category"]);

            // Set the image.
            $image->setImage($_FILES["image"]);

            exit(json_encode(0));
        }

        exit(json_encode(1));
    }

    public function setpartnerimage_POST()
    {
        if (isset($_POST["id"]) && isset($_FILES["image"]))
        {
            Partner::setImageById($_POST["id"], $_FILES["image"]);

            exit(json_encode(0));
        }

        exit(json_encode(1));
    }

    public function updatepartner_POST()
    {
        // Check if everything needed is here.
        if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["website"]) && isset($_POST["category"]))
        {
            $this->partnerRepository->updateById($_POST["id"], $_POST["name"], $_POST["website"], $_POST["category"]);

            exit(json_encode(0));
        }

        exit(json_encode(1));
    }

    public function deletepartner_POST()
    {
        // Check if everything needed is here.
        if (isset($_POST["id"]))
        {
            // Delete the database entry.
            $this->partnerRepository->deleteById($_POST["id"]);

            // Delete the image.
            Partner::deleteImageById($_POST["id"]);

            exit(json_encode(0));
        }

        exit(json_encode(1));
    }

    //</editor-fold>

    //<editor-fold desc="Auction Product Manage">
    
    public function auctionproduct_GET($id)
    {
        // Check if the id is set.
        if (isset($id))
        {
            $auctionProductVM = new AuctionProductEditViewModel();

            $auctionProduct = $this->auctionProductRepository->selectById($id);
            $colorCodes = $this->colorCodeRepository->selectAll();

            $auctionProductVM->auctionProduct = $auctionProduct;
            $auctionProductVM->colorCodes = $colorCodes;

            // Render the view.
            $this->render("auctionproduct", $auctionProductVM);
        }
        else
        {
            throw new Exception("Resource was not found. No id was provided", 404);
        }
    }
    
    public function auctionproduct_POST()
    {
        // Check if the id is set.
        if (isset($_GET["id"]))
        {
            // TODO: weird ass workaround t'll I know the best way to do this... w/e
            // If the id equals update a post request for updating a product has been sent.
            if ($_GET["id"] == "delete")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]))
                {
                    // Delete the product.
                    $this->auctionProductRepository->deleteById($_POST["id"]);
    
                    // Delete the product images recursively.
                    $dir = Product::IMAGES_DIRECTORY . "/" . $_POST["id"];
                    if (is_dir($dir))
                    {
                        $objects = scandir($dir);
                        foreach ($objects as $object)
                        {
                            if ($object != "." && $object != "..")
                            {
                                if (filetype($dir . "/" . $object) == "dir")
                                    rrmdir($dir . "/" . $object);
                                else
                                    unlink($dir . "/" . $object);
                            }
                        }
                        reset($objects);
                        rmdir($dir);
                    }
    
                    // Return 0 for great success.
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["colorCode"]))
                {
                    // Get the product, set the data and update.
                    $auctionProduct = $this->auctionProductRepository->selectById($_POST["id"]);
                    $auctionProduct->name = $_POST["name"];
                    $auctionProduct->description = $_POST["description"];
                    $auctionProduct->colorCode = $_POST["colorCode"];
                    $this->auctionProductRepository->update($auctionProduct);
    
                    // Return 0 for great success.
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "addImage")
            {
                if (isset($_POST["id"]) && isset($_POST["originalWidth"]) && isset($_POST["clientWidth"]) && isset($_POST["xCoord"]) && isset($_POST["width"]) &&
                        isset($_POST["originalHeight"]) && isset($_POST["clientHeight"]) && isset($_POST["yCoord"]) && isset($_POST["height"]) && isset($_FILES["file"]))
                {
                    $xScale = $_POST["originalWidth"] / $_POST["clientWidth"];
    
                    $x1 = $_POST["xCoord"] * $xScale;
                    $x2 = $x1 + ($_POST["width"] * $xScale);
    
                    $yScale = $_POST["originalHeight"] / $_POST["clientHeight"];
    
                    $y1 = $_POST["yCoord"] * $yScale;
                    $y2 = $y1 + ($_POST["height"] * $yScale);
    
                    // Generate numbah.
                    for ($i = 1; file_exists(Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $i . ".jpg"); $i++) {}
                        
                    $manipulator = new ImageManipulator($_FILES["file"]["tmp_name"]);
                    $manipulator = $manipulator->crop($x1, $y1, $x2, $y2);
                    $imageTargetFilePath = Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $i . ".jpg";
                    $manipulator->save($imageTargetFilePath, IMAGETYPE_JPEG);
                        
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "deleteImage")
            {
                if (isset($_POST["id"]) && isset($_POST["imageName"]))
                {
                    unlink(Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $_POST["imageName"]);
    
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }

    //</editor-fold>

    //<editor-fold desc="Slogan Manage">
    
    public function addslogan_GET()
    {
        $this->render("addslogan");
    }
    
    public function addslogan_POST()
    {
        $this->sloganRepository->insert($_POST["slogan"]);
        
        $this->redirectTo("/manage/settings#tab_slogans");
    }
    
    public function slogan_GET()
    {
        if (isset($_GET["id"]))
        {
            $this->render("slogan", $this->sloganRepository->selectById($_GET["id"]));
        }
    }
    
    public function slogan_POST()
    {
        // Check if the slogan id is set.
        if (isset($_GET["id"]))
        {
            if ($_GET["id"] == "delete")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]))
                {
                    // Delete the partner.
                    $this->sloganRepository->deleteById($_POST["id"]);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]) && isset($_POST["slogan"]))
                {
                    // Get the slogan, set the data and update.
                    $slogan = $this->sloganRepository->selectById($_POST["id"]);
                    $slogan->slogan = $_POST["slogan"];
                    $this->sloganRepository->update($slogan);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }

    //</editor-fold>

    //<editor-fold desc="Module Manage">

    public function addmodule_GET()
    {
    	$this->render("addmodule");
    }
    
    
    public function addmodule_POST()
    {
        $this->moduleRepository->insert($_POST["heading"], $_POST["content"], $_POST["category"], $_POST["reference"], $_POST["reference_label"]);
		$this->redirectTo($_POST["returnPath"]);
    }
    
    public function module_GET()
    {
        if (isset($_GET["id"]))
        {
            $this->render("module", $this->moduleRepository->selectById($_GET["id"]));
        }
    }
    
    
    public function module_POST()
    {
        // Check if the module id is set.
        if (isset($_GET["id"]))
        {
            if ($_GET["id"] == "delete")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]))
                {
                    // Delete the module.
                    $this->moduleRepository->deleteById($_POST["id"]);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]) && isset($_POST["heading"]) && isset($_POST["content"]) && isset($_POST["category"]) && isset($_POST["reference"]) && isset($_POST["reference_label"]))
                {
                    // Get the module, set the data and update.
                    $module						= $this->moduleRepository->selectById($_POST["id"]);
                    $module->heading			= $_POST["heading"];
                    $module->content			= $_POST["content"];
                    $module->category			= $_POST["category"];
                    $module->reference			= $_POST["reference"];
                    $module->reference_label	= $_POST["reference_label"];
                    $this->moduleRepository->update($module);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }
    
	//</editor-fold>
	
	//<editor-fold desc="News Manage">
    
    public function addnews_GET()
    {
    	$this->render("addnews");
    }
    
    public function addnews_POST()
    {
    	// TODO: Dit later normaal doen...
    	$_POST["publisher"] = "Administrator";
    	
    	if (isset($_POST["heading"]) && isset($_POST["content"]) && isset($_POST["expiration_date"]) && isset($_POST["publisher"]))
    	{
    		$news = new News();
    		$news->heading			= $_POST["heading"];
    		$news->content			= $_POST["content"];
    		$news->expiration_date	= date("Y-m-d H:i:s", strtotime($_POST["expiration_date"]));
    		$news->publisher		= $_POST["publisher"];
    		 
    		$this->newsRepository->insert($news);
    		$this->redirectTo("/manage/settings#tab_news-items");
    	}
    	else
    	{
    		throw new Exception("Resource was not found. Not all fields were provided.", 404);
    	}
    }
    
    public function news_GET()
    {
        if (isset($_GET["id"]))
        {
            $this->render("news", $this->newsRepository->selectById($_GET["id"]));
        }
    }
    
    public function news_POST()
    {
        // Check if the module id is set.
        if (isset($_GET["id"]))
        {
            if ($_GET["id"] == "delete")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]))
                {
                    // Delete the module.
                    $this->newsRepository->deleteById($_POST["id"]);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
            	// TODO: Dit later normaal doen...
            	$_POST["publisher"] = "Administrator";
            	
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]) && isset($_POST["heading"]) && isset($_POST["content"]) && isset($_POST["create_date"]) && isset($_POST["expiration_date"]) && isset($_POST["publisher"]))
                {
                    // Get the news item, set the data and update.
                    $news					= $this->newsRepository->selectById($_POST["id"]);
                    $news->heading			= $_POST["heading"];
                    $news->content			= $_POST["content"];
                    $news->create_date		= date("Y-m-d H:i:s", strtotime($_POST["create_date"]));
                    $news->expiration_date	= date("Y-m-d H:i:s", strtotime($_POST["expiration_date"]));
                    $news->publisher		= $_POST["publisher"];
                    $this->newsRepository->update($news);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }
	
	//</editor-fold>
}
