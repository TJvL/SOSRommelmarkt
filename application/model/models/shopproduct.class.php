<?php

class ShopProduct extends Product
{
	public $price;
	public $isReserved;
	public $imagePath;
	public $imagePaths;
	
    public static function getPriceRanges()
    {
        $query = "SELECT MIN(price) as lowestPrice, MAX(price) as highestPrice FROM ShopProduct";

        // Execute the query.
        $result = Database::select($query);
		
        $prices = $result->fetch_assoc();

        // Free the result set.
        $result->close();

        return $prices;
    }
}

?>