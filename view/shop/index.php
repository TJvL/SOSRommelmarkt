<?php Type::check("ArrayList:Product", $model) ?>

<div class="container">

    <div class="white">

        <h1>Webshop</h1>

        <div class="row">

            <div class="col-sm-3">

                <!--Filters-->
                <!-- Browse: categories, Filter by price, Reset filters -->
                <div class="col-md-12 filter">

                    <ul class="filterContainer">
<!--                        <li class="filterHeadings"><h3>Categori&euml;en <i class="fa fa-minus category-plus-open"></i></h3></li>-->
<!--                        <li>-->
<!--                            <ul class="filterListings ">-->
<!--                                <li>Electronica <small class="category-count">[10]</small></li>-->
<!--                                <li>Meubels <small class="category-count">[33]</small></li>-->
<!--                                <li>Kleding <small class="category-count">[99]</small></li>-->
<!--                            </ul>-->
<!--                        </li>-->
                        <li class="filterHeadings"><h3>Kwaliteit <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul id="filterOptions" class="filterListings ">
                                <li class="active"><a href="#" class="all">Alle</a></li>
                                <li><a href="#" class="green">Z.G.A.N <i class="product-filter-quality filter-green" title="Z.G.A.N"></i></a></li>
                                <li><a href="#" class="blue">Gebruikt <i class="product-filter-quality filter-blue" title="Z.G.A.N"></i></a></li>
                                <li><a href="#" class="red">Lichte schade <i class="product-filter-quality filter-red" title="Z.G.A.N"></i></a></li>

                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Prijs <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>
                                    <div class="price-slider">
                                        <div id="priceRanges" data-prices="<?php $prices = ShopProduct::getPriceRanges(); echo $prices[0] . "," . $prices[1]; ?>">
                                        <p>
                                          <input type="text" id="amount" readonly style="border:0; color:#b20000; font-weight:bold;">
                                        </p>
                                        <div id="slider-range"></div>

                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="ourHolder" class="col-sm-9 ">
                <!-- Product rendering start -->
            <?php foreach($model as $product) { ?>

                <button class="btn btn-default" data-toggle="modal" data-target=".bs-<?php echo $product->id; ?>-modal-lg">
                <div class="col-sm-3 product padding-lg item <?php echo $product->colorCode; ?>">

                    <i class="product-info-quality <?php echo $product->colorCode; ?>" title="<?php echo $product->colorCode; ?>"></i>

                    <div class="view view-first">
                        <img class="img-responsive" src="<?php echo $product->getImagePath() ?>" />
                        <div class="mask">
                            <h2><?php echo $product->name; ?></h2>
                            <p><?php if($product->isReserved){echo ("Gereserveerd");} ?></p>
                            <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>
                        </div>
                    </div>

                    <div class="product-info">
                        <h4 class="product-name"><?php echo $product->name; ?></h4>

                        <div class="product-info-left">
                            <p class="price">&euro; <?php echo $product->price; ?></p>
                        </div>

                        <div class="product-info-right">
                            <p class="reserved"><?php if($product->isReserved){echo ("Gereserveerd");} ?></p>
                        </div>
                    </div>
                </div>
                </button>

                <!-- modal start -->
                <div class="modal fade bs-<?php echo $product->id; ?>-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div style="padding-left:12px;">
                                <h3><?php echo $product->name; ?></h3>
                                <img class="img" src="<?php echo $product->getImagePath() ?>" alt="image for <?php echo $product->name; ?>"/>
                                <!-- <p><?php echo $product->price; ?></p> -->
                                <p>
                                    <b>Beschrijving</b><br />
                                    <?php
                                    if(isset($product->desc))
                                    {
                                        echo $product->desc;
                                    }
                                    else
                                    {
                                        echo "Beschrijving ontbreekt";
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal end -->

            <?php } ?>
                <!-- Product redering end -->
            </div>
        </div>
    </div>
</div>