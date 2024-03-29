<?php Type::check("ArrayList:Auction", $model) ?>

<div class="container" ng-app="auctionApp" ng-controller="auctionController">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="./addauction" class="btn btn-default">Nieuwe Veiling</a>
			</div>
		</div>
		<div class="table-responsive padding-sm">
			<table id="auctionTable" class="display">
				<thead>
					<tr>
						<th>Veiling ID</th>
						<th>Startdatum</th>
						<th>Einddatum</th>
						<th>Opties</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="Auction in auctions">
						<td>{{Auction.id}}</td>
						<td>{{Auction.startDate}}</td>
						<td>{{Auction.endDate}}</td>
						<td>
							<a href="editauction/{{Auction.id}}"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
							<button class="btn btn-default" title="Verwijderen" ng-click="deleteAuction(Auction.id)"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
			
			<script>
				var app = angular.module("auctionApp", []);
				app.controller("auctionController", ['$scope', '$http', function($scope, $http) {
					$scope.auctions = <?php echo $model->getJSON(); ?>;
					$scope.deleteAuction = function(AuctionID)
					{
						deleteAuction(AuctionID);
					}
				}]);
			</script>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#auctionTable').DataTable();
	} );

	function deleteAuction($auctionId)
	{
		if (confirm("Weet u zeker dat u deze veiling wilt verwijderen?"))
		{
			var data =
			{
					auctionId: $auctionId
			};

			$.ajax(
			{
				url: "/SOSRommelmarkt/manage/auctions/delete",
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
						alert("Deze veiling kan niet worden verwijderd.");
					}

					document.location.href = "./auctions";
				}
			});
		}
	}
</script>