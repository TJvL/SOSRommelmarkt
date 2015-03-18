<?php 
if(isset($_POST['submit'])){
    $to	= "ihendrik1@avans.nl"; // Should be info@sosrommelmarkt.nl
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = "Contactformulier: " . $_POST['subject'];
    $subject2 = "Kopie van uw contactformulier: " . $_POST['subject'];
    $message = $name . "\n" . "Tel: " . $phone . "\n\n" . $_POST['message'];
    $message2 = "Dit is een kopie van uw contactformulier." . "\n\n" . $message;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    //header('Location: thank_you.php'); // Use this to redirect to a thankyou page or something
    }
?>

<div class="container">
	<div class="row white margin-hor-0">
		<!-- Contact form -->
		<div class="col-sm-9">
			<form role="form" action="" method="post">

				<div class="form-group">

					<h2>Contact:</h2>
					
					<div class="row">
						<div class="col-sm-4 padding-sm"><input type="text" class="form-control" name="name" placeholder="Naam..."><span class="error"></span></div>
						<div class="col-sm-4 padding-sm"><input type="text" class="form-control" required="required" name="email" placeholder="E-mail adres.."></div>
						<div class="col-sm-4 padding-sm"><input type="text" class="form-control" name="phone" placeholder="Telefoonnummer..."></div>
					</div>
									
					<div class="row">
						<div class="col-sm-12 padding-sm"><input type="text" class="form-control" required="required" name="subject" placeholder="Onderwerp..."></div>
					</div>
						
					<div class="row">
						<div class="col-sm-12 padding-sm"><textarea class="form-control" required="required" name="comments" rows="10"></textarea></div>
					</div>
									
					<div class="row">
						<div class="col-sm-10 padding-sm"></div>
						<div class="col-sm-2 padding-sm"><input type="submit" name="submit" value="Verstuur" class="form-control"></div>
					</div>

				</div>

                <span id="invalid"></span>

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
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1236.8377129717414!2d5.295767490592149!3d51.68408392860844!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6ee8cb8421907%3A0x5361570b663c1abd!2sStg.+Ontwikkelingssamenwerking+Rommelmarkt!5e0!3m2!1sen!2snl!4v1426184880380" frameborder="0" style="border:0"></iframe>
		</div>
	</div>
</div>

<script src="/SOSRommelmarkt/includes/js/contactformulier.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/includes/js/contactformulier_submit.js" type="text/javascript"></script>
