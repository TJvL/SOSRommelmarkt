<?php

class AuctionProductListRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addToAuction($auctionProductList)
    {
        $query = "INSERT INTO AuctionProductList (Auction_id, AuctionProduct_id) VALUES (?, ?)";

        // Execute query.
        $this->database->insert($query, "ii", array($auctionProductList->auctionId, $this->productId));
    }
}