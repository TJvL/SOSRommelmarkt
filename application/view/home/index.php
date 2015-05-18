<?php Type::check("ArrayList:AuctionProduct", $model) ?>

<div class="container">
	<div class="grey">
		<div class="row">
			<div class= "col-md-3">
				<img class="img-responsive" src="<?php echo ROOT_PATH;?>/img/content/headerdiv.png">
			</div>
			<div class="col-md-9">
				<?php 
					// slogans ophalen
					$slogans = Slogan::selectAll();
				?>
				
				<div id="slogan-carousel" class="carousel text-carousel slide" data-ride="carousel">
            		<div class="carousel-inner" role="listbox">
            			<?php for ($i = 0; $i < count($slogans); $i++) { ?>
            			<div class="item <?php if ($i == 0) echo 'active' ?>">
            				<div class="carousel-content">
            					<p><?php echo $slogans[$i]->slogan ?></p>
            				</div>
            			</div>
            			<?php } ?>
            		</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- carousel -->
	<div class="row padding-lg">
		<div class="col-md-8 padding-hor-md equal-height">
			<div class="grey padding-sm margin-ver-lg full-height">
				<?php 
				// If there is no auction. Print some text saying there is no auction.. that makes sense right??
				if ($model->size() == 0)
				{
					?>
					<h2>Veiling</h2>
					<p>Er is op dit moment geen veiling gaande. Zodra er een nieuwe veiling is gestart kunt u hier de producten bekijken.</p>
					<?php 
				}
				else
				{
					?>
					<div id="vitrine-carousel" class="carousel slide full-height" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php for ($i = 0; $i < $model->size(); $i++) { ?>
							<li data-target="#vitrine-carousel" data-slide-to="<?php echo $i ?>" <?php if ($i == 0) echo 'class="active"' ?>></li>
							<?php } ?>
						</ol>
					
						<div class="carousel-inner full-height" role="listbox">
							<?php for ($i = 0; $i < $model->size(); $i++) { ?>
							<div class="item <?php if ($i == 0) echo 'active' ?> carousel-overlay full-height">
								<a href="<?php echo ROOT_PATH; ?>/auction/index"><img class="center-block full-height" src="<?php echo $model->get($i)->imagePath ?>" alt="Slide"></a>
								<div class="carousel-caption">
									<br>
									<h2><?php echo $model->get($i)->name ?></h2>
									<p><?php echo $model->get($i)->description ?></p>
								</div>
							</div>
							<?php } ?>
						</div>
						
						<a class="left carousel-control" href="#vitrine-carousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Vorige</span>
						</a>
						<a class="right carousel-control" href="#vitrine-carousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Volgende</span>
						</a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		
		<div class="col-md-4 padding-hor-md equal-height">
			<div class="white margin-ver-lg">
			
			<?php 
				// contactinfo ophalen
				$visitingHours = VisitingHours::selectCurrent();
			?>
			
				<h2>Openingstijden</h2>
				<table class="table table-condensed table-responsive">
					<tr><td>Maandag</td><td> <?php echo $visitingHours->monday; ?></td></tr>
					<tr><td>Dinsdag</td><td> <?php echo $visitingHours->tuesday; ?></td></tr>
					<tr><td>Woensdag</td><td> <?php echo $visitingHours->wednesday; ?></td></tr>
					<tr><td>Donderdag</td><td> <?php echo $visitingHours->thursday; ?></td></tr>
					<tr><td>Vrijdag</td><td> <?php echo $visitingHours->friday; ?></td></tr>
					<tr><td>Zaterdag</td><td> <?php echo $visitingHours->saturday; ?></td></tr>
					<tr><td>Zondag</td><td> <?php echo $visitingHours->sunday; ?></td></tr>
				</table>
			</div>
		</div>
	</div>

	<!-- Start modules -->
	<?php
		// Get all modules that belong to the homepage
		$modules = Module::SelectByCategory("home");
		
		// Display all of them
		for ($i = 0; $i < count($modules); $i++)
		{
			// The modules are put in rows of 2, so every even index is the start of a new row.
			if ($i % 2 == 0)
			{
	?>
	<div class="row padding-ver-lg <?php if ($i == count($modules) - 1 || $i == count($modules) - 2) echo "margin-btm-lg"; ?>">
	<?php if ($i == count($modules) - 1) { ?>
		<div class="col-md-12">
		<?php }	else { ?>
		<div class="col-md-6">
		<?php }} else { ?>
		<div class="col-md-6">
		<?php }	?>
			<div class="white margin-ver-lg ">
				<h2><?php echo $modules[$i]->heading; ?></h2>
				<p class="equal-height"><?php echo $modules[$i]->content; ?></p>
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-red btn-lg btn-block" href="<?php echo ROOT_PATH . '/' . $modules[$i]->reference; ?>"><?php echo $modules[$i]->reference_label; ?> <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<?php if ($i % 2 != 0 || $i == count($modules) - 1)	{ ?>
	</div>
	<?php }} ?>
	<!-- End modules -->
</div>
