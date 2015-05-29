<?php Type::check("ArrayList:Product", $model);?>


<div class="container">

    <div class="white">
        <div class="row">
            <div class="col-sm-12">
                <p>Alle producten aangeboden in deze webshop zijn telefonisch te reserveren.</p>
                <p>U kunt langs komen in onze winkel om uw reserveringen af te rekenen.</p>
                <p>Telefoon nummer: 073 613 3774</p>
            </div>
        </div>
    </div>

    <div class="white">

        <h1>Webshop</h1>

        <div class="row">

            <div class="col-sm-3">

                <div class="col-md-12 filter">
                    <ul class="filterContainer">
                        <li class="filterHeadings"><h3>Kwaliteit <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul id="filterOptions" class="filterListings ">
                                <li><input id="type-All" type="checkbox" checked="checked"/><span> Alles</span></li>
                                <li><input id="type-Groen" type="checkbox" checked="checked"/> <span >Als nieuw<i class="product-filter-quality filter-green" title="Als nieuw"></i><span></li>
                                <li><input id="type-Blauw" type="checkbox" checked="checked"/> <span>Gebruikt <i class="product-filter-quality filter-blue" title="Gebruikt"></i></span></li>
                                <li><input id="type-Rood" type="checkbox" checked="checked"/> <span>Lichte schade <i class="product-filter-quality filter-red" title="Lichte schade"></i></span></li>
                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Prijs <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>
                                    <?php $priceRanges = ShopProduct::getPriceRanges();?>
                                    <div class="col-lg-12">
                                        <p>
                                            <span type="text" id="amount"/>
                                        </p>

                                        <div id="rangeSlider" data-minPrice="<?php echo floor($priceRanges["lowestPrice"]);?>" data-maxPrice="<?php echo ceil($priceRanges["highestPrice"]);?>"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-9 ">

                <?php foreach($model as $product){?>
                <div id="product<?php echo $product->id?>" class="col-sm-3 product padding-lg animation <?php echo $product->colorCode?>" data-productPrice="<?php echo $product->price?>">
                    <i class="product-info-quality <?php echo $product->colorCode ?>"></i>
                    <div class="view view-first">
                        <img class="img-responsive" src="<?php echo $product->imagePath ?>" />
                        <div class="mask">
                            <h2><?php echo $product->name ?></h2>
                            <?php if($product->isReserved){echo "<p>Gereserveerd</p>";} ?>
                            <button type="button" class="btn-clear" data-toggle="modal" data-target=".bs-<?php echo $product->id ?>-modal-lg">
                                <a href="#" class="info"><i class="glyphicon glyphicon-new-window glyphicon fa-2x"></i></a>
                            </button>
                        </div>
                    </div>

                    <div class="product-info">

                        <h4 class="product-name"><?php echo $product->name ?></h4>
                        <div class="product-info-left">
                            <p class="price">&euro; <?php echo $product->price ?></p>
                        </div>
                        <div class="product-info-right">
                            <?php if($product->isReserved){echo "<p class='reserved'>Gereserveerd</p>";} ?>
                        </div>
                    </div>

                    <!-- modal start -->
                    <div class="modal fade bs-<?php echo $product->id ?>-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="padding-lg">
                                    <!-- Carousel start -->
                                    <div id="prod-<?php echo $product->id ?>-carousel" class="carousel-modal slide " style="display:inline-table;" data-ride="carousel">

                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php
                                            $count = 0;
                                            foreach($product->imagePaths as $image){

                                                if($count == 0)
                                                {
                                                    echo '<li data-target="#prod-' . $product->id . '-carousel" data-slide-to="' . $count . '" class="active"></li>';
                                                }
                                                else
                                                {
                                                    echo '<li data-target="#prod-' . $product->id . '-carousel" data-slide-to="' . $count . '"></li>';
                                                }
                                                $count = $count + 1;
                                                ?>

                                            <?php } ?>
                                        </ol>

                                        <!-- Data -->
                                        <div class="carousel-inner" role="listbox">
                                            <?php
                                            $count = 0;
                                            foreach($product->imagePaths as $image){

                                                if($count == 0)
                                                {
                                                    echo "<div class='item active'>";
                                                }
                                                else
                                                {
                                                    echo "<div class='item'>";
                                                }
                                                $count = $count + 1;

                                                echo "<img class='img' src='" . $image . "' alt='image for $product->name'/> </div>";

                                            } ?>

                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#prod-<?php echo $product->id ?>-carousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#prod-<?php echo $product->id ?>-carousel" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>

                                    </div>
                                    <!-- Carousel end -->
                                    <div style="display: inline-block; width: 65%; vertical-align: top;">
                                        <div class="row margin-sm">

                                            <div class="col-md-12 margin-sm black-bar">

                                                <h1><?php echo $product->name ?></h1>

                                            </div>
                                            <div class="col-md-12 margin-sm padding-hor-lg red-bar">

                                                <h4>Beschrijving</h4>

                                            </div>
                                            <div class="col-md-12 margin-lg padding-sm">

                                                <p>
                                                    <?php echo $product->description ?>
                                                </p>

                                            </div>
                                            <div class="col-md-12 margin-sm padding-hor-lg red-bar">

                                                <h4>Prijs</h4>

                                            </div>
                                            <div class="col-md-12 margin-lg padding-sm">

                                                <p>
                                                    <b>&euro;<?php echo $product->price ?></b>
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal end -->
                </div>
                <?php } ?>

            </div>

        </div>
    </div>
</div>