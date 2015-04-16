<?php Type::check("ArrayList:AuctionProduct", $model) ?>

<div class="container" ng-app="auctionProductApp" ng-controller="auctionProductController">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="./auctions" class="btn btn-default">Terug</a><a href="./addauction" class="btn btn-default">Nieuwe Veiling</a>
			</div>
		</div>
		<div class="table-responsive padding-sm">
			<table id=auctionProductTable class="display">
				<thead>
					<tr>
						<th>Product ID</th>
						<th>Naam</th>
						<th>Kleur Code</th>
						<th>Toegevoegd Door</th>
						<th>Bewerken?</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="AuctionProduct in AuctionProducts">
						<td>{{AuctionProduct.id}}</td>
						<td>{{AuctionProduct.name}}</td>
						<td>{{AuctionProduct.colorCode}}</td>
						<td>{{AuctionProduct.addedBy}}</td>
						<td>
							<a href="#"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
							<a href="#"><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i></button></a>
						</td>
					</tr>
				</tbody>
			</table>
			
			<script>
				var app = angular.module("auctionProductApp", []);
				app.controller("auctionProductController", function($scope) {
					$scope.auctionProducts = <?php echo $model->getJSON(); ?>;
				});
			</script>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#auctionProductTable').DataTable();
	} );
</script>