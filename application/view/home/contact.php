<div class="container">
    <div style="margin-bottom:5%" class="white">
    	<div class="row">
           <div class="col-md-9">
               <div class="content">
                <form action="<?php echo ROOT_PATH . "/home/contact"?>" class="idealforms" method="post" id="contactform">
                    <h2>Contact</h2>

                    <div class="field">
                        <label class="main">Naam</label>
                        <input form="contactform" name="name" type="text" placeholder="Uw naam">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">E-Mail</label>
                        <input form="contactform" name="email" type="email" placeholder="Uw E-mail">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Telefoon</label>
                        <input form="contactform" name="phone" type="text" placeholder="Uw telefoonnummer">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Kies een onderwerp</label>
                        <select form="contactform" name="options" id="">
                            <option value="Kies een onderwerp..." disabled selected>Kies een onderwerp...</option>
                            <option value="subsidieaanvraag">Subsidieaanvraag</option>
                            <option value="goederen">Goederen ophalen/brengen</option>
                            <option value="overig">Overig</option>
                        </select>
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Toelichting</label>
                        <textarea form="contactform" name="explanation" cols="30" rows="7" style="resize: none" placeholder="Toelichting"></textarea>
                        <span class="error"></span>
                    </div>

                    <div class="field buttons">
                        <label class="main">&nbsp;</label>
                        <button form="contactform" type="submit" class="submit">Versturen</button>
                    </div>
                    <?php
                    if(isset($viewbag['message']))
                    {
                        echo $viewbag['message'];
                    }
                    ?>
                    <span id="invalid"></span>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-md-3-adjust">
           <h2 class="title">Adres</h2>
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


           <title>GMaps.js Geocode</title>
           <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
           <script type="text/javascript" src="<?php echo ROOT_PATH; ?>/js/gmaps.js"></script>
           <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
           <script type="text/javascript">
           var geocoder;
           var map;
           function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(34.052234,-118.243685);
            var address = '<?php echo $companyInformation->address.', '.$companyInformation->city; ?>';

            var myOptions = {
              zoom: 15,
              center: latlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
          geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map, 
                    position: results[0].geometry.location
                });
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
      }
      </script>



      <body onload="initialize()">
        <div>
            <?php echo $companyInformation->address.' , '.$companyInformation->city; ?>

        </div>
        <div id="map_canvas" style="width: 200px; height: 200px;"></div>
    </body>

</div>
</div>
</div>
</div>
