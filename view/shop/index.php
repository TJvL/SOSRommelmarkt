<?php Type::check("ArrayList:Product", $model) ?>

<div class="container" data-ng-app="shopApp" ng-controller="shopController">

    <div class="white">

        <h1>Webshop</h1>

        <div class="row">

            <div class="col-sm-3">

                <div class="col-md-12 filter">
                    <ul class="filterContainer">
                        <li class="filterHeadings"><h3>Kwaliteit <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul id="filterOptions" class="filterListings ">
                                <li ng-click="colorFilter = null"><a href="#">Alle</a></li>
                                <li ng-click="colorFilter = {colorCode: 'green'}"><a href="#" class="green">Z.G.A.N <i class="product-filter-quality filter-green" title="Z.G.A.N"></i></a></li>
                                <li ng-click="colorFilter = {colorCode: 'blue'}"><a href="#" class="blue">Gebruikt <i class="product-filter-quality filter-blue" title="Z.G.A.N"></i></a></li>
                                <li ng-click="colorFilter = {colorCode: 'red'}"><a href="#" class="red">Lichte schade <i class="product-filter-quality filter-red" title="Z.G.A.N"></i></a></li>
                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Prijs <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>

                                        <?php $priceRanges = ShopProduct::getPriceRanges();?>

                                        <div class="col-lg-12 margin-ver-md">
                                            <div class="row">
                                                <div class="col-sm-5"><input type="text" class="form-control" ng-model="sliderRanges.min"></div>
                                                <div class="col-lg-2"></div>
                                                <div class="col-sm-5"><input type="text" class="form-control" ng-model="sliderRanges.max"></div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div range-slider min=<?php echo floor($priceRanges[0]);?> max=<?php echo ceil($priceRanges[1]);?> model-min="sliderRanges.min" model-max="sliderRanges.max" disabled="false" filter="currency:'€'"></div>
                                        </div>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-9 ">
                <p>{{selectedLowestPrice}}</p>

                <div class="col-sm-3 product padding-lg " ng-repeat="x in shopProducts | filter:colorFilter | rangeFilter:sliderRanges">

                    <i class="product-info-quality {{x.colorCode}}"></i>
                    <div class="view view-first">
                        <img class="img-responsive" src="{{x.imagePath}}" />
                        <div class="mask">
                            <h2>{{x.name}}</h2>
                            <p ng-show="{{x.isReserved}}">Gereserveerd</p>
                            <p ng-hide="{{x.isReserved}}"></p>
                            <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>
                        </div>
                    </div>

                    <div class="product-info">
                        <h4 class="product-name">{{x.name}}</h4>
                        <div class="product-info-left">
                            <p class="price">&euro; {{x.price}}</p>
                        </div>
                        <div class="product-info-right">
                            <p class="reserved" ng-show="{{x.isReserved}}">Gereserveerd</p>
                        </div>
                    </div>
                </div>

            <script>

                var app = angular.module('shopApp', ['ui-rangeSlider']);
                app.controller('shopController', function($scope){
                    $scope.shopProducts = <?php echo $model->getJSON(); ?>;
                    $scope.sliderRanges = {

                      min: <?php echo floor($priceRanges[0]);?>,
                      max: <?php echo ceil($priceRanges[1]);?>
                    };

                });

                app.filter('rangeFilter', function() {
                    return function(items, sliderRanges ) {

                        var filtered = [];
                        var priceMin = parseInt(sliderRanges.min);
                        var priceMax = parseInt(sliderRanges.max);

                        angular.forEach(items, function(item) {
                            if((item.price >= priceMin && item.price <= priceMax)) {
                                filtered.push(item);
                            }
                        });
                        return filtered;
                    };
                });

            </script>

            </div>
        </div>
    </div>
</div>