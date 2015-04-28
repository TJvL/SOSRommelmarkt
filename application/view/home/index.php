<?php Type::check("ArrayList:AuctionProduct", $model) ?>
<?php

    //TODO Please, handel de openingstijden queries en deze include anders af..- Erik
    // Declaration.
    $servername = "samwise.technotive.nl";
    $username = "sosAdmin";
    $password = "shadowrend";
    $database = "sosRommel";
    $port = 3306;

    $connection = new mysqli($servername, $username, $password, $database, $port);

    // Check connection.
    if ($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_error);
    }

?>

<!--echo $viewbag['voorbeeld'];-->
<div class="container">
    <div class="grey">
        <div class="row">
            <div class= "col-md-3">
                <img class="img-responsive" src="<?php echo ROOT_PATH;?>/img/content/headerdiv.png">
            </div>
            <div class="col-md-9">
                <p>Alles wat verkoopbaar is krijgt bij klanten een nieuw leven.</p>
                <p>Het restafval wordt gescheiden aangeleverd bij verwerkingsbedrijven.</p>
            </div>
        </div>
    </div>

    <!-- carousel -->
    <div class="row padding-lg">
    	<div class="col-md-8 padding-hor-md">
		    <div class="grey padding-sm margin-ver-lg height-fix">
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
		
		<div class="col-md-4 padding-hor-md">
			<div class="white margin-ver-lg height-fix">
				<?php
					$query =  mysqli_query($connection,"SELECT * FROM Openingstijden");
					while ($row = mysqli_fetch_assoc($query)) {
				?>
				<table class="table table-condensed table-responsive">
					<h2>Openingstijden</h2>
					<tr><td>Maandag</td><td> <?php echo $row['Maandag']; ?></td></tr>
					<tr><td>Dinsdag</td><td> <?php echo $row['Dinsdag']; ?></td></tr>
					<tr><td>Woensdag</td><td> <?php echo $row['Woensdag']; ?></td></tr>
					<tr><td>Donderdag</td><td> <?php echo $row['Donderdag']; ?></td></tr>
					<tr><td>Vrijdag</td><td> <?php echo $row['Vrijdag']; ?></td></tr>
					<tr><td>Zaterdag</td><td> <?php echo $row['Zaterdag']; ?></td></tr>
					<tr><td>Zondag</td><td> <?php echo $row['Zondag']; ?></td></tr>
				</table>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<div class="row padding-lg">
		<div class="col-md-6-custom padding-hor-md">
			<div class="white margin-ver-lg">
				<h2>Subsidie</h2>
				<p>Kent u een project in een ontwikkelingsland dat steun kan gebruiken dan kunt u bij SOS Rommelmarkt een aanvraag voor subsidie indienen.</p>
				<a href="<?php echo ROOT_PATH; ?>/subvention/index"><button type="button" class="btn btn-red btn-lg">Vraag subsidie aan <i class="fa fa-chevron-right"></i></button></a> <!--Style used -> Hacky I know..-->
			</div>
		</div>
		<div class="col-md-6-custom padding-hor-md">
			<div class="white margin-ver-lg">
				<h2>Webshop</h2>
				<p>In de kringloopwinkel van SOS Rommelmarkt in de Vughterstraat van ’s-Hertogenbosch worden al dertig jaar tweedehands spullen verkocht. Je vindt in onze opgeruimde en overzichtelijke winkel kringloopgoederen voor een kleine prijs. Een deel van de collectie wordt ook online aangeboden.</p>
				<a href="<?php echo ROOT_PATH; ?>/shop/index"><button type="button" class="btn btn-red btn-lg">Webshop <i class="fa fa-chevron-right"></i></button></a>
			</div>
		</div>
	</div>
</div>
