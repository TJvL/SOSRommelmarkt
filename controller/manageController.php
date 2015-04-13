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
        $this->render("subventions");
    }
    
    public function subventions_POST()
    {
        //kijk welk type post er binnen komt
        switch ($_POST["post_type"]) {
            case "print":

                break;
            case "delete":
                include_once "/model/SubventionRequest.class.php";
                SubventionRequest::deleteById($_POST["id"]);
                $this->render("subventions");
                break;
        }
	}

    public function productList_GET()
    {
        $this->render("manage_product");
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
    				if ($_POST["productIsReserved"] == "true")
    					$shopProduct->isReserved = 1;
    				else
    					$shopProduct->isReserved = 0;
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
}
?>