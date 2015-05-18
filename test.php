<?php

file_put_contents("debug.txt", "test", FILE_APPEND | LOCK_EX);

include("includes/config.inc.php");

$auctions = ShopProductRepository::selectById(1);

echo "<pre>";
echo var_dump($auctions);
echo "</pre>";

?>