<?php
include("includes/markup/manage_header.php");
include("product.php")
?>

<div class="container">
    <div class="grey">
        <div class="table-responsive">
            <table class="table">
                <?php
                    $products = fetchAllProducts();
                    foreach ($products as $product){
                        echo "<tr>";
                        echo "<td><img class='img-responsive' src=" . $product->getImagePath() . " ></td>";
                        echo "<td>" . $product->id . "</td>";
                        echo "<td>" . $product->name . "</td>";
                        echo "<td>" . $product->colorCode . "</td>";
                        echo "<td>" . $product->addedBy . "</td>";
                        echo "<td> <a href='#'>" . "Bewerk.." . "</a> </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</div>