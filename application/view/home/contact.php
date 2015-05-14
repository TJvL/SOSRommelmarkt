
<div class="container">
    <div style="margin-bottom:5%" class="white">
    	<div class="row">
	        <div class="col-md-8">
	            <div class="content">
	
	                <div class="idealsteps-container">
	
	                    <!-- <nav class="idealsteps-nav"></nav> -->
	
	                    <form role="form" action="" class="idealforms" method="post">
	
	                        <div class="idealsteps-wrap">
	
	                            <section class="idealsteps-step">
	                                <h2>Contact</h2>
	
	                                <div class="field">
	                                    <label class="main">Naam</label>
	                                    <input name="name" type="text" placeholder="Uw naam">
	                                    <span class="error"></span>
	                                </div>
	
	                                <div class="field">
	                                    <label class="main">E-Mail</label>
	                                    <input name="email" type="email" placeholder="Uw E-mail">
	                                    <span class="error"></span>
	                                </div>
	
	                                <div class="field">
	                                    <label class="main">Telefoon</label>
	                                    <input name="phone" type="text" placeholder="Uw telefoonnummer">
	                                    <span class="error"></span>
	                                </div>
	
	                                <div class="field">
	                                    <label class="main">Kies een onderwerp</label>
	                                    <select name="options" id="">
	                                        <option value="Kies een onderwerp..." disabled selected>Kies een onderwerp...</option>
	                                        <option value="subsidieaanvraag">Subsidieaanvraag</option>
	                                        <option value="goederen">Goederen ophalen/brengen</option>
	                                        <option value="overig">Overig</option>
	                                    </select>
	                                    <span class="error"></span>
	                                </div>
	
	                                <div class="field">
	                                    <label class="main">Toelichting</label>
	                                    <textarea name="explanation" cols="30" rows="7" style="resize: none" placeholder="Toelichting"></textarea>
	                                    <span class="error"></span>
	                                </div>
	
	                                <div class="field buttons">
	                                    <label class="main">&nbsp;</label>
	                                    <button form="aanvraag" type="submit" class="submit">Versturen</button>
	                                </div>
	                                <?php
	                                if(isset($viewbag['message']))
	                                {
	                                    echo $viewbag['message'];
	                                }
	                                ?>
	
	                            </section>
	
	                        </div>
	
	                        <span id="invalid"></span>
	                    </form>
	
	                </div>
	
	            </div>
	        </div>
	        <div class="col-md-4">
	            <h2 class="title">Adres:</h2>
	            <p>
	                <?php $companyInformation = CompanyInformation::selectCurrent(); ?>
	
	                <?php echo $companyInformation->address;?><br />
	                <?php echo $companyInformation->postalcode . ", " . $companyInformation->city; ?><br />
	                <!-- <a href="tel:0736133774">0736133774</a><br> Doesn't seem to work very well... -->
	                <?php echo $companyInformation->phone; ?><br />
	                <a href="mailto:<?php echo $companyInformation->email; ?>" target="_top"><?php $companyInformation->email; ?></a>
	            </p>
	
	            <!-- google map -->
	            <!-- nb. embed veranderd uiteraard niet automatisch mee met adreswijzigingen, om het dynamisch te maken lijkt er een API key nodig te zijn. -->
	            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4945.754735084947!2d5.30305697168822!3d51.69868920698085!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6ee5d3cbe3817%3A0xc2bc3b36e7e3416f!2sRidderspoorstraat+2%2C+De+Orthenpoort%2C+5212+XP+&#39;s-Hertogenbosch!5e0!3m2!1sen!2snl!4v1426840575196" frameborder="0" style="border:0"></iframe>  -->
	            <!--
	            <iframe
	            	frameborder="0" style="border:0"
	            	src="https://www.google.com/maps/embed/v1/place&key="..."&q=Ridderspoor+2,den+bosch"
	            ></iframe>
	            -->
	        </div>
    	</div>
    </div>
</div>

<script src="/SOSRommelmarkt/frameworks/idealforms/js/out/jquery.idealforms.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/frameworks/idealforms/js/out/jquery.idealforms.submit.js" type="text/javascript"></script>
