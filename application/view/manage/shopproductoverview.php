<div class="container">
    <div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/shopproductadd'?>" class="btn btn-success">Nieuw product</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Winkel producten</h1>
            <hr>
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
                    <th>Verkocht</th>
                    <th>Bewerken?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($model as $product)
                    {
                    	?>
                        <tr>
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
                                <?php
                                if($product->isSold == 1)
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
								<a href="<?php echo ROOT_PATH ?>/manage/shopproductview/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
							</td>
						</tr>
						<?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
    </div>
</div>