<?php
include("includes/markup/manage_header.php");
include("product.class.php")
?>

<div class="container">
    <div class="white">
        <div class="table-responsive">
            <table id="productTable" class="display">
                <thead>
                <tr>
                    <th>product id</th>
                    <th>naam</th>
                    <th>kleur code</th>
                    <th>toegevoegd door</th>
                    <th>optie</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $products = fetchAllProducts();
                    foreach ($products as $product){
                        echo "<tr>";
                        echo "<td>" . $product->id . "</td>";
                        echo "<td>" . $product->name . "</td>";
                        echo "<td>" . $product->colorCode . "</td>";
                        echo "<td>" . $product->addedBy . "</td>";
                        echo "<td><a href='#'>details</a></td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#productTable').DataTable();
    } );
</script>