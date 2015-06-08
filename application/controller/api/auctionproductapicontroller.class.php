<?php

class AuctionProductAPIController extends APIController
{
    public $auctionProductRepository;
    public $auctionproductlistRepository;

    public function __construct()
    {
        parent::__construct("auctionproductapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($auctionproduct)
    {
        if(isset($auctionproduct->id))
        {
            $this->auctionProductRepository->deleteById($auctionproduct->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    public function update_POST($auctionproduct)
    {
        if(isset($auctionproduct->id))
        {
            $this->auctionProductRepository->update($auctionproduct);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }


    public function add_POST($auctionproduct)
    {
        if((isset($auctionproduct->name))&&(isset($auctionproduct->description))&&(isset($auctionproduct->colorCode))&&(isset($_POST["auctionId"])))
        {
            $user = $_SESSION["user"];
            $auctionproduct->addedBy = $user->username;

            $newAuctionProduct = $this->auctionProductRepository->insert($auctionproduct);
            $this->auctionproductlistRepository->addToAuction($_POST["auctionId"], $newAuctionProduct->id);
            $this->respondOK();

        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }

    public function addimage_POST(){

        if (isset($_POST["id"]) && isset($_POST["originalWidth"]) && isset($_POST["clientWidth"]) && isset($_POST["xCoord"]) && isset($_POST["width"]) &&
            isset($_POST["originalHeight"]) && isset($_POST["clientHeight"]) && isset($_POST["yCoord"]) && isset($_POST["height"]) && isset($_FILES["file"]))
        {
            $xScale = $_POST["originalWidth"] / $_POST["clientWidth"];

            $x1 = $_POST["xCoord"] * $xScale;
            $x2 = $x1 + ($_POST["width"] * $xScale);

            $yScale = $_POST["originalHeight"] / $_POST["clientHeight"];

            $y1 = $_POST["yCoord"] * $yScale;
            $y2 = $y1 + ($_POST["height"] * $yScale);

            // Generate image number.
            for ($i = 1; file_exists(Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $i . ".jpg"); $i++) {}

            $manipulator = new ImageManipulator($_FILES["file"]["tmp_name"]);
            $manipulator = $manipulator->crop($x1, $y1, $x2, $y2);
            $imageTargetFilePath = Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $i . ".jpg";
            $manipulator->save($imageTargetFilePath, IMAGETYPE_JPEG);

            $this->respondOK();
        }
        throw new Exception("Resource not found.", 404);
    }

    public function deleteimage_POST(){

        if (isset($_POST["id"]) && isset($_POST["imageName"]))
        {
            unlink(Product::IMAGES_DIRECTORY . "/" . $_POST["id"] . "/" . $_POST["imageName"]);

            $this->respondOK();
        }
        throw new Exception("Resource not found.", 404);
    }




}