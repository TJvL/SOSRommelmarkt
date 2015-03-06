<?php

include("product.php");

$product = fetchProductById(1);
$products = fetchAllProducts();

// Quick dump.
/*echo "<pre>";
var_dump($product);
echo "</pre>";*/

// Showing a product image.
/*$imagePath = $product->getImagePath();
echo $imagePath;
echo '<img src="', $imagePath, '" alt="Mountain View""';*/

// Updating a product.
/*echo $product->description . "<br>";
$product->description = "Simon's product is nog veel geweldiger dan ik dacht.";
echo $product->description . "<br>";
updateProduct($product);
$product = fetchProductById(1);
echo $product->description . "<br>";*/

?>

<html>
<body>

<form action="productimageupload.php" method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="productImage">
<input type="hidden" name="productId" value="1">
<input type="submit" name="submit" value="Upload Image">
</form>

</body>
</html>