
<div class="container">

    <div class="white">

        <div class="row">

            <div class="col-sm-3">

                <!--Filters-->
                <!-- Browse: categories, Filter by price, Reset filters -->
                <div class="col-md-12 filter">

                    <ul class="filterContainer">
                        <li class="filterHeadings"><h3>Categori&euml;en <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>Electronica <small class="category-count">[10]</small></li>
                                <li>Meubels <small class="category-count">[33]</small></li>
                                <li>Shit <small class="category-count">[99]</small></li>
                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Kwaliteit <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>Z.G.A.N<i class="product-filter-quality green" title="Z.G.A.N"></i></li>
                                <li>Gebruikt<i class="product-filter-quality blue" title="Gebruikt"></i></li>
                                <li>Shit<i class="product-filter-quality red" title="Shit"></i></li>
                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Prijs <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>
                                    <div class="price-slider">
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
            <div class="col-sm-9 ">


            <?php foreach(Product::fetchAll() as $product) { ?>

                <div class="col-sm-3 product padding-lg">

                    <div class="view view-first">
                        <img class="img-responsive" src="<?php echo $product->getImagePath() ?>" />
                        <div class="mask">
                            <h2><?php echo $product->name; ?></h2>
                            <p><?php if($product->isReserved){echo ("Gereserveed");} ?></p>
                            <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>
                        </div>
                    </div>

                    <div class="product-info">

                        <div class="product-info-left">

                            <h4><?php echo $product->name; ?></h4>
                            <i class="product-info-quality <?php echo $product->colorCode; ?>" title="<?php echo $product->colorCode; ?>"></i>

                        </div>
                        <div class="product-info-right">

                            <p class="price">&euro; <?php echo $product->price; ?></p>
                            <p class="reserved"><?php if($product->isReserved){echo ("Gereserveed");} ?></p>

                        </div>

                    </div>


                </div>

            <?php } ?>


            </div>



        </div>

    </div>

</div>