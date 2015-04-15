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
                include_once "/model/SubventionRequest.class.php";
                SubventionRequest::deleteById($_POST["id"]);
                $this->render("subventions");

    }


    public function productList_GET()
    {
        $this->render("manageproduct");
    }

    public function addshopproduct_GET()
    {
        $this->render("addproduct");
    }

	public function instellingen_GET()
    {
        $this->render("instellingen");
    }
	
    public function shopproduct_GET()
    {
    	// Check if the shopproduct id is set.
    	if (isset($_GET["id"]))
    	{
    		// Get the product.
    		$shopProduct = ShopProduct::selectById($_GET["id"]);
    		
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
    		if ($_GET["id"] == "update")
    		{
    			// Check if all the necessary data has been sent with the request.
    			if (isset($_POST["productId"]) && isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["productColorCode"]) && isset($_POST["productPrice"]) && isset($_POST["productIsReserved"]))
    			{
    				// Get the product, set the data and update.
    				$shopProduct = ShopProduct::selectById($_POST["productId"]);
    				$shopProduct->name = $_POST["productName"];
    				$shopProduct->description = $_POST["productDescription"];
    				$shopProduct->colorCode = $_POST["productColorCode"];
    				$shopProduct->price = $_POST["productPrice"];
    				$shopProduct->isReserved = $_POST["productIsReserved"];
    				$shopProduct->update();
    				
    				// Return 0 for great success.
    				header('Content-Type: application/json');
    				exit(json_encode(0));
    			}
    		}
    	}
    	
    	// TODO: Error or some shit
    	exit(json_encode(1));
    }

    public function instellingen_POST()
    {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["Maandag"]) && isset($_POST["Dinsdag"]) && isset($_POST["Woensdag"]) && isset($_POST["Donderdag"]) && isset($_POST["Vrijdag"]) && isset($_POST["Zaterdag"]) && isset($_POST["Zondag"]))
                {
                    // Get the product, set the data and update.
                    VisitingHours::update($_POST["Maandag"],$_POST["Dinsdag"],$_POST["Woensdag"], $_POST["Donderdag"],$_POST["Vrijdag"],$_POST["Zaterdag"],$_POST["Zondag"]);
                }
                echo "update geslaagd";
    }

    public function companyInfomation_POST()
    {
                // Check if all the necessary data has been sent with the request.
                if (isset($_POST["Telefoon"]) && isset($_POST["Email"]) && isset($_POST["Adres"]) && isset($_POST["Plaats"]))
                {
                    // Get the product, set the data and update.
                    companyInfomation::update($_POST["Telefoon"],$_POST["Email"],$_POST["Adres"], $_POST["Plaats"]);
                }
                echo "update geslaagd1";
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
		$auctionList->addAll(Auction::selectAll());
		
		$this->render("auctions", $auctionList);
	}

	public function addauction_GET()
	{
		$this->render("addauction");
	}
	
	public function editauction_GET()
	{
		$this->render("editauction");
	}
}
?>
