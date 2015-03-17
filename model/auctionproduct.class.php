<?php

include("product.class.php");
include("database.php");

class AuctionProduct extends Product
{
	// The directory the images for the auction products are placed.
	const IMAGES_DIRECTORY = "img/content/auctionproducts";
	
	static public function getImagesDirectory()
	{
		return AuctionProduct::IMAGES_DIRECTORY;
	}
}

?>