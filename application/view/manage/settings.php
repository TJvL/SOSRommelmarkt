<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
		<h3>Instellingen</h3>
		<div class="tabpanel">
			<!-- start nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Adres</a></li>
				<li role="presentation"><a href="#visitinghours" aria-controls="visitinghours" role="tab" data-toggle="tab">Openingstijden</a></li>
				<li role="presentation"><a href="#slogans" aria-controls="slogans" role="Tab" data-toggle="tab">Slogans</a></li>
				<li role="presentation"><a href="#home-modules" aria-controls="home-modules" role="tab" data-toggle="tab">Home Modules</a></li>
				<li role="presentation"><a href="#aboutus-modules" aria-controls="aboutus-modules" role="tab" data-toggle="tab">Over Ons Modules</a>
			</ul>
			<!-- end nav tabs -->
			
			<!-- start tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="address">
					<?php 
						// contactinfo ophalen
						$companyInformation = $model->companyInformation;
					?>
					<br /> <!-- empty line -->
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
								<button type="submit" class="btn btn-danger btn-block" id="submit" name="add">Opslaan</button>
							</div>
						</div>
					</form>
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="visitinghours">
					<?php 
						$visitingHours = $model->visitingHours;
					?>
					<br /><!-- empty line -->
					<form class="form-horizontal" action="<?php echo ROOT_PATH;?>/manage/settings" method="Post">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-monday">Maandag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-monday" name="monday" value="<?php echo $visitingHours->monday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-tuesday">Dinsdag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-tuesday" name="tuesday" value="<?php echo $visitingHours->tuesday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-wednesday">Woensdag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-wednesday" name="wednesday" value="<?php echo $visitingHours->wednesday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-thursday">Donderdag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-thursday" name="thursday" value="<?php echo $visitingHours->thursday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-friday">Vrijdag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-friday" name="friday" value="<?php echo $visitingHours->friday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-saturday">Zaterdag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-saturday" name="saturday" value="<?php echo $visitingHours->saturday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="hours-sunday">Zondag</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hours-sunday" name="sunday" value="<?php echo $visitingHours->sunday; ?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-8">
								<button type="submit" class="btn btn-danger btn-block" id="submit" name="add">Opslaan</button>
							</div>
						</div>
					</form>
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="slogans">				
					<?php $slogans = $model->slogans;?>
					<br /><!-- empty line -->
					<div class="row">
						<div class="col-md-1">
							<a href="./addslogan" class="btn btn-default">Nieuwe Slogan</a>
						</div>
					</div>
					<div class="table-responsive padding-sm margin-lg">
						<table id="sloganTable" class="display">
							<thead>
								<tr>
									<th>Slogan</th>
									<th>Opties</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($slogans as $slogan) { ?>
								<tr>
									<td><?php echo $slogan->slogan ?></td>
									<td><a href="slogan/<?php echo $slogan->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="home-modules">
					<?php $modules = $model->homeModules; ?>
					<br /><!-- empty line -->
					<div class="row">
						<div class="col-md-1">
							<a href="./addmodule/home" class="btn btn-default">Nieuwe module</a>
						</div>
					</div>
					<div class="table-responsive padding-sm margin-lg">
						<table id="homeTable" class="display">
							<thead>
								<tr>
									<th>Heading</th>
									<th>Opties</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i = 0; $i < count($modules); $i++) { ?>
								<tr>
									<td><?php echo $modules[$i]->heading ?></td>
									<td>
										<a href="module/<?php echo $modules[$i]->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
										<!-- Tijdelijk verwijderd -- werken nog niet
										<button class="btn btn-default <?php if ($i == 0) echo "disabled"; ?>" title="Omhoog" onClick="moveModuleUp()"><i class="fa fa-caret-up"></i></button>
										<button class="btn btn-default <?php if ($i == count($modules) - 1) echo "disabled"; ?>" title="Omlaag" onClick="moveModuleDown()"><i class="fa fa-caret-down"></i></button>
										 -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="aboutus-modules">
					<?php $modules = $model->aboutUsModules ?>
					<br /><!-- empty line -->
					<div class="row">
						<div class="col-md-1">
							<a href="./addmodule/aboutus" class="btn btn-default">Nieuwe module</a>
						</div>
					</div>
					<div class="table-responsive padding-sm margin-lg">
						<table id="aboutusTable" class="display">
							<thead>
								<tr>
									<th>Heading</th>
									<th>Opties</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i = 0; $i < count($modules); $i++) { ?>
								<tr>
									<td><?php echo $modules[$i]->heading ?></td>
									<td>
										<a href="module/<?php echo $modules[$i]->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
										<!-- Tijdelijk verwijderd -- werken nog niet
										<button class="btn btn-default <?php if ($i == 0) echo "disabled"; ?>" title="Omhoog" onClick="moveModuleUp()"><i class="fa fa-caret-up"></i></button>
										<button class="btn btn-default <?php if ($i == count($modules) - 1) echo "disabled"; ?>" title="Omlaag" onClick="moveModuleDown()"><i class="fa fa-caret-down"></i></button>
										 -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end tab panes -->
			</div>
		</div>
	</div>
</div>
 