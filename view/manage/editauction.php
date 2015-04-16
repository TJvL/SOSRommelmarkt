<?php Type::check("ArrayList:AuctionProduct", $model) ?>

<div class="container" ng-app="auctionProductApp" ng-controller="auctionProductController">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="../auctions" class="btn btn-default">Terug</a>
			</div>
			<div class="col-md-1">
				<a href="./addauction" class="btn btn-default">Product Toevoegen</a>
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
					<tr ng-repeat="AuctionProduct in auctionProducts">
						<td>{{AuctionProduct.id}}</td>
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

<script>
	$(document).ready( function () {
		$('#auctionProductTable').DataTable();
	} );

	function deleteAuctionProduct($auctionProductId)
	{
		if (confirm("Weet u zeker dat u dit product uit de veiling wilt verwijderen?"))
		{
			var data = 
			{
					id: $auctionProductId
			};

			$.ajax(
			{
				url: "../auctionproduct/delete",
				type: "POST",
				data: data,
				async: true,
				success: function(result)
				{
					if (result == 0)
					{
						// OK
					}
					else
					{
						alert("Dit product kan niet worden verwijderd.");
					}

					location.reload();
				}
			});
		}
	}
</script>