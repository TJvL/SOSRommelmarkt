<div class="container">
    <div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <h1>Winkel producten</h1>
        </div>

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/addshopproduct'?>" class="btn btn-default">Product toevoegen...</a>
            </div>
        </div>
        <div class="table-responsive padding-sm">
            <table id="productTable" class="display">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Kwaliteit</th>
                    <th>Prijs</th>
                    <th>Toegevoegd Door</th>
                    <th>Gereserveerd</th>
                    <th>Bewerken?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $products = ShopProductRepository::selectAll();
                    foreach ($products as $product)
                    {
                    	?>
                        <tr>
	                        <td><?php echo $product->name ?></td>
                            <?php
                            switch ($product->colorCode) {
                                case "blue":
                                   echo "<td>gebruikt</td>";
                                    break;

                                case "red":
                                    echo "<td>lichte schade</td>";
                                    break;

                                case "green":
                                    echo "<td>Als nieuw</td>";
                                    break;
                            }
                            ?>
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
								<a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
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