<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_DIR . '/manage/addshopproduct'?>" class="btn btn-default">Product toevoegen...</a>
            </div>
        </div>
        <div class="table-responsive padding-sm">
            <table id="productTable" class="display">
                <thead>
                <tr>
                    <th>product id</th>
                    <th>naam</th>
                    <th>kleur code</th>
                    <th>prijs</th>
                    <th>is gereserveerd</th>
                    <th>toegevoegd door</th>
                    <th>opties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $products = ShopProduct::selectAll();
                    foreach ($products as $product)
                    {
                    	?>
                        <tr>
	                        <td><?php echo $product->id ?></td>
	                        <td><?php echo $product->name ?></td>
	                        <td><?php echo $product->colorCode ?></td>
	                        <td><?php echo $product->price ?></td>
                            <td><?php echo $product->isReserved ?></td>
                            <td><?php echo $product->addedBy ?></td>
	                        <td>
								<a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-info"></i></button></a>
								<a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
								<a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
							</td>
						</tr>
						<?php
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