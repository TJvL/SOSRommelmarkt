<?php

class AuctionAPIController extends APIController
{
    public $auctionRepository;

    public function __construct()
    {
        parent::__construct("auctionapi");
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($auction)
    {
        if(isset($auction->id))
        {
            $this->auctionRepository->deleteById($auction->id);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Product;}}
     */
    public function update_POST($auction)
    {
        if(isset($auction->id))
        {
            //TODO: Validate if this auction doesn't overlap with another auction
            //Gebeurt in idealforms
            
            $this->auctionRepository->update($auction);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Resource not found.", 404);
        }
    }

    /**
     *{{Permission=Product;}}
     */
    public function add_POST($auction)
    {
        if((isset($auction->startDate))&&(isset($auction->endDate)))
        {
            //TODO: Validate if this auction doesn't overlap with another auction

            $this->auctionRepository->insert($auction);
            $this->respondOK();

        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }

    public function dateRanges_GET()
    {
        $auctions = $this->auctionRepository->selectAll();
        $ranges = array();
        foreach($auctions as $auction)
        {
            $range = array(
                "start" => $auction->startDate,
                "end" => $auction->endDate
            );
            $ranges[] = $range;
        }
        $this->respondWithJSON($ranges);
    }

}