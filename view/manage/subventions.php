<head>
	<script src="<?php echo ROOT_DIR; ?>/includes/js/subvention_overview.js" type="text/javascript"></script>
</head>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-sm-12">
				<div class="list-group">					
					<?php foreach(SubventionRequest::fetchAllSubventionRequests() as $subventionRequest) { ?>
					<a class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo $subventionRequest->onderneming; ?></h4>
						<p class="list-group-item-text"><?php echo $subventionRequest->toelichting ?></p>
						<div class="collapse">
							<table class="table table-condensed">
								<tbody>
									<tr>
										<th scope="row">Contactpersoon</th>
										<td><?php echo $subventionRequest->contactpersoon ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Onderneming</th>
										<td><?php echo $subventionRequest->onderneming ?></td>
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
										<td><?php echo $subventionRequest->adres ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Postcode</th>
										<td><?php echo $subventionRequest->postcode ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Plaats</th>
										<td><?php echo $subventionRequest->plaats ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Telefoon (1)</th>
										<td><?php echo $subventionRequest->telefoonnummer1 ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Telefoon (2)</th>
										<td><?php echo $subventionRequest->telefoonnummer2 ?></td>
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
										<td><?php echo $subventionRequest->toelichting ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Activiteiten</th>
										<td><?php echo $subventionRequest->activiteiten ?></td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<th scope="row">Resultaten</th>
										<td><?php echo $subventionRequest->resultaten ?></td>
									</tr>
								</tbody>
							</table>
							<div class="row">
								<div class="col-sm-8"><!-- just a spacer --></div>
								<div class="col-sm-2"><button type="button" class="btn btn-default btn-block btn-success"><span class="glyphicon glyphicon-ok-circle"></span> Accepteer</button></div>
								<div class="col-sm-2"><button type="button" class="btn btn-default btn-block btn-danger"><span class="glyphicon glyphicon-ban-circle"></span> Weiger</button></div>
							</div>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>