<?php

class AuctionProductListRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addToAuction($auctionId, $auctionproductId)
    {
        $query = "INSERT INTO AuctionProductList (Auction_id, AuctionProduct_id) VALUES (?, ?)";
        $parameters = array($auctionId, $auctionproductId);
        $paramTypes = "ii";

        $this->database->insert($query, $paramTypes, $parameters);
    }
}