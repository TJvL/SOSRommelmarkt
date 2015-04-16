<?php Type::check("ArrayList:Partner", $model) ?>

<div class="container" ng-app="partnerApp" ng-controller="partnerController">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="./addpartner" class="btn btn-default">Nieuwe Partner</a>
			</div>
		</div>
		<div class="table-responsive padding-sm">
			<table id="partnerTable" class="display">
				<thead>
					<tr>
						<th>Partner ID</th>
						<th>Naam</th>
						<th>Website</th>
						<th>Opties</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="Partner in partners">
						<td>{{Partner.id}}</td>
						<td>{{Partner.name}}</td>
						<td>{{Partner.website}}</td>
						<td>
							<a href="editauction/{{Partner.id}}"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
							<a href="deleteauction/{{Partner.id}}"><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i></button></a>
						</td>
					</tr>
				</tbody>
			</table>
			
			<script>
				var app = angular.module("partnerApp", []);
				app.controller("partnerController", function($scope) {
					$scope.partners = <?php echo $model->getJSON(); ?>;
				});
			</script>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#partnerTable').DataTable();
	} );
</script>