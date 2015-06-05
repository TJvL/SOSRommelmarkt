<?php

class AuctionProductAPIController extends APIController
{
    public $auctionproductRepository;

    public function __construct()
    {
        parent::__construct("auctionproductapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($news)
    {
        if(isset($news->id))
        {
            $this->newsRepository->deleteById($news->id);
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
            $this->auctionproductRepository->update($auctionproduct);
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
    public function add_POST($news)
    {
        if((isset($news->heading))&&(isset($news->content))&&(isset($news->expiration_date)))
        {
            $user = $_SESSION["user"];

            $news->publisher = $user->username;
            $news->expiration_date = date("Y-m-d H:i:s", strtotime($news->expiration_date));

            $this->newsRepository->insert($news);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }
}