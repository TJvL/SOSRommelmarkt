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
        $subventionList = new ArrayList("SubventionRequest");
        $subventionList->addAll(SubventionRequest::fetchAllSubventionRequests());

        $this->render("subventions", $subventionList);

    }


    public function productList_GET()
    {
        $this->render("manageproduct");
    }

    public function deleteshopproduct_POST()
    {
        $id = $_POST["id"];
        ShopProduct::deleteById($id);

        $dir = ROOT_DIR . "/img/Content/products/" . $id;
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it,
            RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($dir);

        $this->redirectTo("/manage/productList");
    }

    public function addshopproduct_GET()
    {
        $this->render("addshopproduct");
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
    			if (isset($_POST["productId"]) && isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["productColorCode"]) &&
    					isset($_POST["productPrice"]) && isset($_POST["productIsReserved"]))
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




    
}
?>