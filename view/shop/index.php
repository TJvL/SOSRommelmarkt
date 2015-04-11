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
                                <li><input type="checkbox" ng-click="selectAll(master)" ng-model="master" ng-init="master=true"><span> Alle</span></li>
                                <li><input type="checkbox" ng-click="includeColor('green')" ng-checked="master"/> <span >Z.G.A.N <i class="product-filter-quality filter-green" title="Z.G.A.N"></i><span></li>
                                <li><input type="checkbox" ng-click="includeColor('blue')" ng-checked="master"/> <span>Gebruikt <i class="product-filter-quality filter-blue" title="Z.G.A.N"></i></span></li>
                                <li><input type="checkbox" ng-click="includeColor('red')" ng-checked="master"/> <span>Lichte schade <i class="product-filter-quality filter-red" title="Z.G.A.N"></i></span></li>
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


                <div ng-repeat="x in shopProducts | filter:colorFilter | rangeFilter:sliderRanges" class="col-sm-3 product padding-lg animation ">
                    <button type="button" class="btn btn-block" data-toggle="modal" data-target=".bs-{{x.id}}-modal-lg"></button>

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

                    <!-- modal start -->
                    <div class="modal fade bs-{{x.id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div style="padding-left:12px;">
                                    <h3>{{x.name}}</h3>
                                    <img class="img" src="{{x.imagePath}}" alt="image for {{x.name}}"/>
                                    <p>&euro; {{x.price}}</p>
                                    <p>
                                        <b>Beschrijving</b><br />
                                        {{x.desc}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal end -->
                </div>

            <script>

                var app = angular.module('shopApp', ['ngAnimate', 'ui-rangeSlider']);
                app.controller('shopController', function($scope){
                    $scope.shopProducts = <?php echo $model->getJSON(); ?>;
                    $scope.sliderRanges = {

                      min: <?php echo floor($priceRanges[0]);?>,
                      max: <?php echo ceil($priceRanges[1]);?>
                    };

                    $scope.colorIncludes = ["green", "red", "blue"];

                    $scope.includeColor = function(color) {

                        var i = $.inArray(color, $scope.colorIncludes);
                        if (i > -1) {
                            $scope.colorIncludes.splice(i, 1);
                            if($scope.colorIncludes.length < 1){
                                $scope.colorIncludes = [""];
                            }
                        } else {
                            $scope.colorIncludes.push(color);
                        }
                    }

                    $scope.colorFilter = function(x) {
                        if ($scope.colorIncludes.length > 0) {
                            if ($.inArray(x.colorCode, $scope.colorIncludes) < 0)
                                return;
                        }
                        return x;
                    }

                    $scope.selectAll = function(master){
                        if(master){
                            $scope.colorIncludes = [""];
                        }
                        else{
                            $scope.colorIncludes = ["green", "red", "blue"];
                        }
                    }
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