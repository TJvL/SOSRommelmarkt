<?php Type::check("ArrayList:AuctionProduct", $model) ?>

<div class="container" ng-app="auctionProductApp" ng-controller="auctionProductController">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="../auctions" class="btn btn-default">Terug</a>
			</div>
			<div class="col-md-1">
				<a href="/SOSRommelmarkt/auction/addProduct/<?php echo $_GET['id']; ?>" class="btn btn-default">Product Toevoegen</a>
			</div>
		</div>
		<div class="table-responsive padding-sm">
			<table id=auctionProductTable class="display">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Kleur Code</th>
						<th>Toegevoegd Door</th>
						<th>Bewerken?</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="AuctionProduct in auctionProducts">
						<td>{{AuctionProduct.name}}</td>
						<td>{{AuctionProduct.colorCode}}</td>
						<td>{{AuctionProduct.addedBy}}</td>
						<td>
							<a href="../auctionproduct/{{AuctionProduct.id}}"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
							<button class="btn btn-default" title="Verwijderen" ng-click="deleteAuctionProduct(AuctionProduct.id)"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
			
			<script>
				var app = angular.module("auctionProductApp", []);
				app.controller("auctionProductController", ['$scope', '$http', function($scope, $http) {
					$scope.auctionProducts = <?php echo $model->getJSON(); ?>;
					$scope.deleteAuctionProduct = function(AuctionProductID)
					{
						deleteAuctionProduct(AuctionProductID);
					}
				}]);
			</script>
		</div>
	</div>
</div>
