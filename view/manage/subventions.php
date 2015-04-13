<head>
	<script src="<?php echo ROOT_DIR; ?>/includes/js/subvention_overview.js" type="text/javascript"></script>
	<script src="<?php echo ROOT_DIR; ?>/includes/js/jquery.deletesub.js" type="text/javascript"></script>
</head>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-sm-12">
				<div class="list-group collapse-group">
					<?php foreach(SubventionRequest::fetchAllSubventionRequests() as $subventionRequest) { ?>
					<a class="list-group-item collapse-group-item">
						<div class="collapse-button">
							<h4 class="list-group-item-heading"><?php echo $subventionRequest->firm; ?> <i class="fa fa-expand pull-right"></i></h4>
							<p class="list-group-item-text"><?php echo $subventionRequest->elucidation ?></p>
						</div>
						<div class="collapse">
							<table class="table table-condensed">
								<tbody>
									<tr>
										<th scope="row">Contactpersoon</th>
										<td><?php echo $subventionRequest->contactperson ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Onderneming</th>
										<td><?php echo $subventionRequest->firm ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">KVK</th>
										<td><?php echo $subventionRequest->kvk ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Adres</th>
										<td><?php echo $subventionRequest->adress ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Postcode</th>
										<td><?php echo $subventionRequest->postalcode ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Plaats</th>
										<td><?php echo $subventionRequest->city ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Telefoon (1)</th>
										<td><?php echo $subventionRequest->phonenumber1 ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Telefoon (2)</th>
										<td><?php echo $subventionRequest->phonenumber2 ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Fax</th>
										<td><?php echo $subventionRequest->fax ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">E-Mail</th>
										<td><?php echo $subventionRequest->email ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Toelichting</th>
										<td><?php echo $subventionRequest->elucidation ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Activiteiten</th>
										<td><?php echo $subventionRequest->activities ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Resultaten</th>
										<td><?php echo $subventionRequest->results ?></td>
									</tr>
								</tbody>
							</table>

							<div class="row">
								<div class="col-sm-8"><!-- just a spacer --></div>
								<button id="<?php echo $subventionRequest->id?>" onClick="print_sub(this.id)" type="button" title="Print" class="btn btn-default">
									<span class="glyphicon glyphicon-print col-sm-1" aria-hidden="true"></span>
								</button>

								<button id="<?php echo $subventionRequest->id?>" onClick="delete_sub(this.id)" type="button" title="Print" class="btn btn-default">
									<span class="glyphicon glyphicon-trash col-sm-1" aria-hidden="true"></span>
								</button>



							</div>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php



?>

