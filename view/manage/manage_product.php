<div class="container">
    <div class="white">
        <div class="table-responsive padding-sm">
            <table id="productTable" class="display">
                <thead>
                <tr>
                    <th>product id</th>
                    <th>naam</th>
                    <th>kleur code</th>
                    <th>toegevoegd door</th>
                    <th>opties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $products = ShopProduct::selectAll();
                    foreach ($products as $product){
                        echo "<tr>";
                        echo "<td>" . $product->id . "</td>";
                        echo "<td>" . $product->name . "</td>";
                        echo "<td>" . $product->colorCode . "</td>";
                        echo "<td>" . $product->addedBy . "</td>";
                        echo "<td>
                                <a href='#'><button class='btn btn-default'><i class='fa fa-info'></i></button></a>
                                <a href='#'><button class='btn btn-default'><i class='fa fa-pencil'></i></button></a>
                                <a href='#'><button class='btn btn-default'><i class='fa fa-trash'></i></button></a>
                              </td>";
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