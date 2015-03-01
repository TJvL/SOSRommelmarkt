<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->
<?php include("includes/markup/header.php"); ?> 

<div class="container">
	<div class="row white margin-hor-0">
		<!-- Contact form -->
		<div class="col-sm-9">
			<form role="form" action="contactform-action.php" id="contactForm" method="post">
				<div class="form-group">
					<h2>Contact:</h2>
					
					<div class="row">
						<div class="col-sm-4 padding-sm"><input type="text" class="form-control" required="required" name="name" placeholder="Naam..."></div>
						<div class="col-sm-4 padding-sm"><input type="text" class="form-control" required="required" name="email" placeholder="E-mail adres.."></div>
						<div class="col-sm-4 padding-sm"><input type="text" class="form-control" name="phone" placeholder="Telefoonnummer..."></div>
					</div>
					
					<div class="row">
						<div class="col-sm-12 padding-sm"><input type="text" class="form-control" required="required" name="subject" placeholder="Onderwerp..."></div>
					</div>
					
					<div class="row">
						<div class="col-sm-12 padding-sm"><textarea class="form-control" required="required" name="contents" rows="10"></textarea></div>
					</div>
					
					<div class="row">
						<div class="col-sm-10 padding-sm"></div>
						<div class="col-sm-2 padding-sm"><input type="submit" value="Verstuur" class="form-control"></div>
					</div>
				</div>
			</form>
		</div>
		
		<!-- Adres & Google Maps -->
		<div class="col-sm-3">
			<h2 class="title">Adres:</h2>
			<p>
				Vughterstraat 264-A<br>
				5211 GR 's Hertogenbosch<br>
				<!-- <a href="tel:0736133774">0736133774</a><br> Doesn't seem to work very well... -->
				073 613 3774<br>
				<a href="mailto:info@sosrommelmarkt.nl" target="_top">info@sosrommelmarkt.nl</a>
			</p>
			
			<!-- google map -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2472.8001013803073!2d5.3017696999999995!3d51.7001031!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6ee5d3cbe3817%3A0xc2bc3b36e7e3416f!2sRidderspoorstraat+2%2C+De+Orthenpoort%2C+5212+XP+&#39;s-Hertogenbosch!5e0!3m2!1snl!2snl!4v1424622205501" frameborder="0" style="border:0"></iframe>
		</div>
	</div>
</div>

<?php
include("includes/markup/footer.php"); 
?> 