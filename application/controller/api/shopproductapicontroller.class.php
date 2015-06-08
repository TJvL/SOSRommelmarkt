<?php

class ShopProductAPIController extends APIController
{
    public $shopProductRepository;

    public function __construct()
    {
        parent::__construct("auctionproductapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($shopproduct)
    {
        if(isset($shopproduct->id))
        {
            $this->shopProductRepository->deleteById($shopproduct->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    public function update_POST($shopproduct)
    {
        if(isset($shopproduct->id))
        {
            $this->shopProductRepository->update($shopproduct);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }


    public function add_POST($shopproduct)
    {
        if((isset($shopproduct->name))&&(isset($shopproduct->description))&&(isset($shopproduct->colorCode))&&(isset($shopproduct->price)))
        {
            $user = $_SESSION["user"];
            $shopproduct->addedBy = $user->username;

            $this->shopProductRepository->insert($shopproduct);
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