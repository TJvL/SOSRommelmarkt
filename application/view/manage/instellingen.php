<div class="container">
	<div class="white">
		<div class="row">
			<div class="span8">             
				<div class="widget stacked ">
					<div class="widget-header">
						<i class="icon-user"></i>
						<h3>Instellingen</h3>
					</div> 
					<div class="widget-content">
						<div class="tabbable"> <!-- Only required for left/right tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Adres</a></li>
								<li><a href="#tab2" data-toggle="tab">Openingstijden</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1">
            
						            <?php 
						            	// contactinfo ophalen
						            	$companyInformation = CompanyInformation::selectCurrent();
						            ?>
						            <br />
										<form class="form-horizontal"  action="<?php echo ROOT_PATH;?>/manage/companyInformation" method="Post">
											<div class="form-group">
												<label class="col-sm-2 control-label" for="info-address">Adres</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="info-address" name="address" value="<?php echo $companyInformation->address; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="info-city">Plaats</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="info-city" name="city" value="<?php echo $companyInformation->city; ?>"/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="info-postalcode">Postcode</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="info-postalcode" name="postalcode" value="<?php echo $companyInformation->postalcode; ?>"/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="info-phone">Telefoon</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="info-phone" name="phone" value="<?php echo $companyInformation->phone; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label" for="info-email">Email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" id="info-email" name="email" value="<?php echo $companyInformation->email; ?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-8">
													<button type="submit" class="btn btn-danger btn-block">Opslaan</button>
												</div>
											</div>
										</form>
								</div>
								<div class="tab-pane fade" id="tab2">
									<?php
										//TODO implementeer database.class.php
										//Create a query
										$query = "SELECT * FROM Openingstijden ";
										//submit the query and capture the result
										 $result = Database::fetch($query);
										$query=getenv("QUERY_STRING");
										parse_str($query);
									?>

									<div class="col-md-4">
										<h2> Openingstijden:</h2>
										<form class="form-horizontal" action="<?php echo ROOT_PATH;?>/manage/instellingen" method="Post">
											<?php
												while ($row = $result->fetch_assoc()) {?>
											<div class="form-group">
												<label class="col-xs-2 control-label" >Maandag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Maandag" type="text" name="Maandag" value="<?php echo $row['Maandag']; ?>"  />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" >Dinsdag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Dinsdag" type="text" name="Dinsdag" value="<?php echo $row['Dinsdag']; ?> "  />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label">Woensdag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Woensdag" type="text" name="Woensdag" value="<?php echo $row['Woensdag']; ?> "  />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label">Donderdag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Donderdag" type="text" name="Donderdag" value="<?php echo $row['Donderdag']; ?> "  />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label">Vrijdag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Vrijdag" type="text" name="Vrijdag" value="<?php echo $row['Vrijdag']; ?>" />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label">Zaterdag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Zaterdag" type="text" name="Zaterdag" value="<?php echo $row['Zaterdag']; ?>" />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label">Zondag</label>
												<div class="col-xs-10">
													<div calss ="timeCss">
														<input id="Zondag" type="text" name="Zondag" value="<?php echo $row['Zondag']; ?> " />
													</div>
												</div>
											</div>
											<td>
												<input name="add" type="submit" id="submit" value="Update Tijd">
											</td>
										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 