
<?php

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

                <img class="img-responsive" src="<?php echo ROOT_DIR;?>/img/headerdiv.png">


            </div>

            <div class="col-md-9">

                <p>Alles wat verkoopbaar is krijgt bij klanten een nieuw leven.</p>
                <p>Het restafval wordt gescheiden aangeleverd bij verwerkingsbedrijven.</p>

            </div>

        </div>
    </div>

    <!-- new carousel -->
    <div class="grey padding-sm">
    	<div class="row">
    		<div class="col-md-12">
	    		<div id="vitrine-carousel" class="carousel slide" data-ride="carousel">
			    	<ol class="carousel-indicators">
			    		<li data-target="#vitrine-carousel" data-slide-to="0" class="active"></li>
			    		<li data-target="#vitrine-carousel" data-slide-to="1"></li>
			    		<li data-target="#vitrini-carousel" data-slide-to="2"></li>
			    	</ol>
			    
				    <div class="carousel-inner" role="listbox">
				    	<div class="item active carousel-overlay">
				    		<img src="<?php echo ROOT_DIR;?>/img/tempslideshow/slideshow_1140x456_1.jpg" alt="Slide 1">
				    		<div class="carousel-caption">
				    			<h2>Title</h2>
				    			<p>Description</p>
				    		</div>
				    	</div>
				    	
				    	<div class="item">
				    		<img src="<?php echo ROOT_DIR;?>/img/tempslideshow/slideshow_1140x456_2.jpg" alt="Slide 2">
				    		<div class="carousel-caption">
				    			<h2>Title</h2>
				    			<p>Description</p>
				    		</div>
				    	</div>
				    	
				    	<div class="item">
				    		<img src="<?php echo ROOT_DIR;?>/img/tempslideshow/slideshow_1140x456_3.jpg" alt="Slide 3">
				    		<div class="carousel-caption">
				    			<h2>Title</h2>
				    			<p>Description</p>
				    		</div>
				    	</div>
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
    		</div>
    	</div>
    </div>

    <div class="padding-lg">

        <div class="row">

            <div class="col-md-5 padding-md">

                <div class="white">
                    <h2>Subsidie</h2>

                    <p>Kent u een project in een ontwikkelingsland dat steun kan gebruiken dan kunt u bij SOS Rommelmarkt een aanvraag voor subsidie indienen.</p>

                    <button type="button" class="btn btn-red btn-lg">Vraag subsidie aan <i class="fa fa-chevron-right"></i></button>
                </div>

            </div>

            <div class="col-md-4 padding-md">

                <div class="white">

                    <h2>Webshop</h2>

                    <p>In de kringloopwinkel van SOS Rommelmarkt in de Vughterstraat van ’s-Hertogenbosch worden al dertig jaar tweedehands spullen verkocht. Je vindt in onze opgeruimde en overzichtelijke winkel kringloopgoederen voor een kleine prijs. Een deel van de collectie wordt ook online aangeboden.</p>

                    <button type="button" class="btn btn-red btn-lg">Webshop <i class="fa fa-chevron-right"></i></button>



                </div>

            </div>

            <div class="col-md-3 padding-md">

                <div class="white">

                    <table class="table">

                        <?php
     $query =  mysqli_query($connection,"SELECT * FROM Openingstijden");
    while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <table>
                    <h2>Openingstijden</h2>
                        <tr><td>Maandag</td><td> <?php echo $row['Maandag']; ?></td></tr>
                        <tr><td>Dinsdag</td><td> <?php echo $row['Dinsdag']; ?></td></tr>
                        <tr><td>Woensdag</td><td> <?php echo $row['Woensdag']; ?></td></tr>
                        <tr><td>Donderdag</td><td> <?php echo $row['Donderdag']; ?></td></tr>
                        <tr><td>Vrijdag</td><td> <?php echo $row['Vrijdag']; ?></td></tr>
                        <tr><td>Zaterdag</td><td> <?php echo $row['Zaterdag']; ?></td></tr>
                        <tr><td>Zondag</td><td> <?php echo $row['Zondag']; ?></td></tr>
                    </table>
        </table>
        <?php } ?>

                </div>

            </div>


        </div>

    </div>

</div>

