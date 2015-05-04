<?php

include("includes/config.inc.php");

$auctions = ShopProductRepository::selectById(1);

echo "<pre>";
echo var_dump($auctions);
echo "</pre>";

?>