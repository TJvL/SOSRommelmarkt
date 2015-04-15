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
                    <th>toegevoegd door</th>
                    <th>is gereserveerd</th>
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
                            <td><?php echo $product->addedBy ?></td>
                            <td>
                                <?php
                                if($product->isReserved == 1)
                                {
                                ?>
                                    Ja
                                <?php
                                }
                                else
                                {
                                ?>
                                    Nee
                                <?php
                                }
                                ?>
                            </td>
	                        <td>
								<a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-info"></i></button></a>
								<a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
                                <form id="delete" method="POST" action="<?php echo ROOT_DIR . '/manage/deleteshopproduct'?>">
                                    <input form="delete" name="id" type="hidden" value="<?php echo $product->id ?>">
								    <button form="delete" type="submit" class="btn btn-default" onsubmit="deletePressed()"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-picture-o"></i></button></a>
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

    function deletePressed()
    {
        return confirm("Bevestig het verwijderen van dit product.");
    }
</script>