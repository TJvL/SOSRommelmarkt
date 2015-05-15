<?php
class ManageController extends Controller
{
    function __construct()
    {
        parent::__constructor("manage");
    }
    public function index_GET()
    {
        $this->render("index");
    }
    public function subventions_GET()
    {
        $subventionList = new ArrayList("SubventionRequest");
        $subventionList->addAll(SubventionRequest::fetchAllSubventionRequests());
        $this->render("subventions", $subventionList);
    }
    public function subventions_POST()
    {
        SubventionRequest::deleteById($_POST["id"]);
        
        $subventionList = new ArrayList("SubventionRequest");
        $subventionList->addAll(SubventionRequest::fetchAllSubventionRequests());
        $this->render("subventions", $subventionList);
    }
    public function productList_GET()
    {
        $this->render("manageproduct");
    }
    public function addshopproduct_GET()
    {
        $this->render("addshopproduct");
    }
    public function addshopproduct_POST()
    {
        $shopProduct = ShopProductRepository::insert($_POST["name"], $_POST["description"], "Administrator", $_POST["colorCode"], $_POST["price"], 0);
        $this->redirectTo("/manage/shopproduct/$shopProduct->id");
    }
    public function settings_GET()
    {
        $this->render("settings");
    }

        public function pages_GET()
    {
        $this->render("pages");
    }
    
    public function shopproduct_GET()
    {
        // Check if the shopproduct id is set.
        if (isset($_GET["id"]))
        {
            // Get the product.
            $shopProduct = ShopProductRepository::selectById($_GET["id"]);
            
            // Render the view.
            $this->render("shopproduct", $shopProduct);
        }
        
        // TODO: Error or some shit
    }
    
    public function shopproduct_POST()
    {
        // Check if the shopproduct id is set.
        if (isset($_GET["id"]))
        {
            // TODO: weird ass workaround t'll I know the best way to do this... w/e
            // If the id equals update a post request for updating a product has been sent.
            if ($_GET["id"] == "delete")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["productId"]))
                {
                    // Delete the product.
                    ShopProductRepository::deleteById($_POST["productId"]);
                    
                    // Delete the product images recursively.
                    $dir = Product::IMAGES_DIRECTORY . "/" . $_POST["productId"];
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
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["productId"]) && isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["productColorCode"]) &&
                        isset($_POST["productPrice"]) && isset($_POST["productIsReserved"]))
                {
                    // Get the product, set the data and update.
                    $shopProduct = ShopProductRepository::selectById($_POST["productId"]);
                    $shopProduct->name = $_POST["productName"];
                    $shopProduct->description = $_POST["productDescription"];
                    $shopProduct->colorCode = $_POST["productColorCode"];
                    $shopProduct->price = $_POST["productPrice"];
                    $shopProduct->isReserved = $_POST["productIsReserved"];
                    ShopProductRepository::update($shopProduct);
                    
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "addImage")
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
    
    public function settings_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["monday"]) && isset($_POST["tuesday"]) && isset($_POST["wednesday"]) && isset($_POST["thursday"]) && isset($_POST["friday"]) && isset($_POST["saturday"]) && isset($_POST["sunday"]))
        {
            // set the data and update
            $visitingHours              = VisitingHours::selectCurrent();
            $visitingHours->monday      = $_POST["monday"];
            $visitingHours->tuesday     = $_POST["tuesday"];
            $visitingHours->wednesday   = $_POST["wednesday"];
            $visitingHours->thursday    = $_POST["thursday"];
            $visitingHours->friday      = $_POST["friday"];
            $visitingHours->saturday    = $_POST["saturday"];
            $visitingHours->sunday      = $_POST["sunday"];
            $visitingHours->update();
        }
        
        $this->redirectTo("/manage/settings");
    }

        public function pages_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["title"]) && isset($_POST["label"]) && isset($_POST["header"]) && isset($_POST["body"]))
        
        {
            // set the data and update
            $addPages = AddPages::selectCurrent();
            $addPages->title         = $_POST["title"];
            $addPages->label         = $_POST["label"];
            $addPages->header        = $_POST["header"];
            $addPages->body          = $_POST["body"];
            $addPages->update();
        }
        
        $this->redirectTo("/manage/pages");
    }

    public function companyInformation_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["postalcode"]))
        {
            // set the data and update
            $companyInformation             = CompanyInformation::selectCurrent();
            $companyInformation->phone      = $_POST["phone"];
            $companyInformation->email      = $_POST["email"];
            $companyInformation->address    = $_POST["address"];
            $companyInformation->city       = $_POST["city"];
            $companyInformation->postalcode = $_POST["postalcode"];
            $companyInformation->update();
        }
        $this->redirectTo("/manage/settings");
    }
    public function changeSubventionStatus_POST()
    {
        // Check if all the necessary data has been sent with the request.
        if (isset($_POST["id"]) && isset($_POST["status"]))
        {
            // Get the product, set the data and update.
            SubventionRequest::updateStatus($_POST["id"], $_POST["status"]);
            $this->subventions_GET();
        }
        else{
            //TODO: error handling
        }
    }
    public function auctions_GET()
    {
        $auctionList = new ArrayList("Auction");
        $auctionList->addAll(AuctionRepository::selectAll());
        
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
                    $auction = AuctionRepository::deleteById($_POST["auctionId"]);
                    
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
        $auction = AuctionRepository::insert($_POST["startDate"], $_POST['endDate']);
        //$this->redirectTo("/manage/editauction/$auction->id");
        $this->redirectTo("/manage/auctions"); // tijdelijk totdat editauction compleet is
    }
    
    public function editauction_GET()
    {
        if (isset($_GET["id"]))
        {
            // get the auctionproducts
            $auctionProductList = new ArrayList("AuctionProduct");
            $auctionProductList->addAll(AuctionProductRepository::selectByAuctionId($_GET["id"]));
            
            // render
            $this->render("editauction", $auctionProductList);
        }
        
        // TODO: error catching
    }
    public function partners_GET()
    {
        $partnerArray = new ArrayList("Partner");
        $partnerArray->addAll(Partner::selectAll());
        $this->render("partners", $partnerArray);
    }
    public function addpartner_GET()
    {
        $this->render("addpartner");
    }
    public function partner_GET()
    {
        if (isset($_GET["id"]))
        {
            $this->render("partner", Partner::selectById($_GET["id"]));
        }
    }
    
    public function partner_POST()
    {
        // Check if the partner id is set.
        if (isset($_GET["id"]))
        {
            if ($_GET["id"] == "delete")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]))
                {
                    // Delete the partner.
                    Partner::deleteById($_POST["id"]);
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["website"]))
                {
                    // Get the partner, set the data and update.
                    $partner = Partner::selectById($_POST["id"]);
                    $partner->name = $_POST["name"];
                    $partner->website = $_POST["website"];
                    $partner->update();
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }
    
    public function auctionproduct_GET()
    {
        // Check if the id is set.
        if (isset($_GET["id"]))
        {
            // Render the view.
            $this->render("auctionproduct", AuctionProductRepository::selectById($_GET["id"]));
        }
         
        // TODO: Error or some shit
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
                    AuctionProductRepository::deleteById($_POST["id"]);
    
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
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "update")
            {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["colorCode"]))
                {
                    // Get the product, set the data and update.
                    $auctionProduct = AuctionProductRepository::selectById($_POST["id"]);
                    $auctionProduct->name = $_POST["name"];
                    $auctionProduct->description = $_POST["description"];
                    $auctionProduct->colorCode = $_POST["colorCode"];
                    AuctionProductRepository::update($auctionProduct);
    
                    // Return 0 for great success.
                    header("content-Type: application/json");
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
                        
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
            else if ($_GET["id"] == "deleteImage")
            {
                if (isset($_POST["id"]) && isset($_POST["imageName"]))
                {
                    unlink(Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $_POST["imageName"]);
    
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }
    
    public function addpartner_POST()
    {
    	// Check if everything needed is here.
    	if (isset($_POST["name"]) && isset($_POST["website"]) && isset($_FILES["image"]))
    	{
    		// Insert the partner record.
    		$partnerId = Partner::insert($_POST["name"], $_POST["website"]);
    		
    		// Get the image file extension.
    		$imageFileType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    		
    		// Save the image.
    		move_uploaded_file($_FILES["image"]["tmp_name"], "img/partners/" . $partnerId . "." . $imageFileType);
    	}
    }
    
    public function addslogan_GET()
    {
        $this->render("addslogan");
    }
    
    public function addslogan_POST()
    {
        Slogan::insert($_POST["slogan"]);
        
        $this->redirectTo("/manage/settings#tab_slogans"); // dit werkt niet?
    }
    public function slogan_GET()
    {
        if (isset($_GET["id"]))
        {
            $this->render("slogan", Slogan::selectById($_GET["id"]));
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
                    Slogan::deleteById($_POST["id"]);
        
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
                    $slogan = Slogan::selectById($_POST["id"]);
                    $slogan->slogan = $_POST["slogan"];
                    $slogan->update();
        
                    // Return 0 for great success.
                    header("content-Type: application/json");
                    exit(json_encode(0));
                }
            }
        }
        
        // TODO: Error or some shit
        exit(json_encode(1));
    }
}
?>

