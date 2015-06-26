<?php $cartExists = isset($model); ?>

<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-lg-12">
                <h1>Uw Winkelwagen</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if ($cartExists) { ?>
                    <table class="table table-responsive">
                        <tr>
                            <th>Artikel</th>
                            <th>Prijs</th>
                            <th><!-- buttons --></th>
                        </tr>
                        <?php
                        $totalPrice = 0;
                        foreach ($model->cartContent as $product) { ?>
                        <tr>
                            <td><?php echo $product->name ?></td>
                            <td>€<?php echo $product->price ?></td>
                            <td><a><button class="btn btn-red" title="Verwijder" onclick="deleteProductFromCart(<?php echo $product->id ?>)"><i class="fa fa-trash"></i></button></a></td>
                        </tr>
                        <?php
                            $totalPrice+= $product->price;
                        } ?>
                        <tr>
                            <td></td>
                            <td><?php echo "Totaal: €" . number_format($totalPrice, 2, '.', ',');?></td>

                            <td></td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <p>U heeft geen artikelen in uw winkelwagen.</p>
                    <a href="<?php echo ROOT_PATH . '/home/shop'; ?>">Bezoek de winkel</a>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
        <?php if ($cartExists) { ?>
            <div class="row">
                <div class="col-lg-offset-10 col-lg-2">
                    <a class="btn btn-red btn-lg btn-block" onclick='addNewOrder()'>Bestellen <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
