<?php $companyInformation = $model; ?>

<div class="container">
    <div style="margin-bottom:5%" class="white">
        <div class="row">
            <div class="col-md-">
                <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
                <script type="text/javascript" src="<?php echo ROOT_PATH;?>/js/home/contact/googlemaps.js"> </script>
                <body onload="initialize()">
                    <div id="map_canvas" style="width: 100%; height: 280px;"></div>
                </body>
            </div>
        <div class="row">
           <div class="col-md-8">
               <div class="content">

                <form action="<?php echo ROOT_PATH . "/home/contact"?>" class="idealforms" method="post" id="contactform">
                    <?php
                    if(isset($viewbag['message']))
                    {
                        echo "<p>" . $viewbag['message'] . "</p>";
                    }
                    ?>

                    <h2>Contact</h2>
                    <div class="field">
                        <label for="inputEmail3" class="main">Naam</label>
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
                    <span id="invalid"></span>
                </form>
           </div>
        </div>

        <div class="col-md-4">
           <h2 class="title">Adres</h2>
           <p>
            <div id="adres"> <?php echo $model->address;?><br /> </div>
            <div id="plaats"><?php echo $model->city; ?> </div>
            <div id-"postcode"><?php echo $model->postalcode; ?><br /></div>
            <?php echo $model->phone; ?><br />
            <a href="mailto:<?php echo $model->email; ?>" target="_top"><?php $model->email; ?></a>
          </p> 
        </div>
      </div>
    </div>
  </div>
</div>
