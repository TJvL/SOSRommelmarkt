<?php

class PartnerAPIController extends APIController
{
    public $partnerRepository;

    public function __construct()
    {
        Parent::__construct("partnerapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($partner)
    {
        if(isset($partner->id))
        {
            $this->partnerRepository->deleteById($partner->id);
            Partner::deleteImageById($partner->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function update_POST($partner){

        if(isset($partner->id))
        {
            $partner = new Partner();
            $partner->id = $_POST["id"];
            $partner->name = $_POST["name"];
            $partner->website = $_POST["website"];
            $partner->category = $_POST["category"];
            $this->partnerRepository->update($partner);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }

    }

    /**
     *{{Permission=Tekst;}}
     */
    public function add_POST($partner)
    {
        if((isset($partner->name))&&(isset($partner->website))&&(isset($partner->category)))
        {
            $newPartner = $this->partnerRepository->insert($partner);
            $newPartner->setImage($_FILES["image"]);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function setimage_POST()
    {
        if (isset($_POST["id"]) && isset($_FILES["image"]))
        {
            Partner::setImageById($_POST["id"], $_FILES["image"]);
            $this->respondOK();
        }

        throw new Exception("Resource not found.", 404);
    }

}