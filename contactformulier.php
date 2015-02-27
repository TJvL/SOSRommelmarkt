<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->
<?php include("includes/markup/header.php"); ?>
<!--i'm not sure if this belongs here or in the shared header.-->
<div class= "container">
    <div class="grey">
        <h1><b>Contactformulier subsidieaanvraag</b></h1>
        <p>Ken jij een project in een ontwikkelingsland dat steun kan gebruiken dan kun je bij SOS Rommelmarkt een aanvraag voor subsidie indienen.</p><br>
        <p>Om in aanmerking te komen voor subsidie, toetst onze Beleidsgroep Subsidies de aanvragen. Er wordt gekeken of de aanvraag voldoet aan onderstaande criteria:</p><br>
        <p>• De aanvrager moet rechtspersoon zijn.<br>
            • De aanvraag moet passen binnen een vooraf bepaald budget op jaarbasis.<br>
            • Het aanvraagformulier (incl. begroting) moet volledig en leesbaar zijn ingevuld.<br>
            • Bij toekenning geven we in principe voorkeur aan kleinschalige projecten (vanwege ons beperkt budget en onze wens meerdere projecten te steunen).<br>
            • De subsidies dienen in principe eenmalig te zijn.<br>
            • Het te subsidiëren project moet bijdragen aan verbetering van kwaliteit en duurzaamheid van de betreffende organisatie.<br>
            • Het te subsidiëren project moet voldoen aan één van de volgende millenniumdoelen:</p>
        <p>    Doel 1: Extreme armoede en honger zijn uitgebannen.<br>
            Doel 2: Alle jongens en meisjes gaan naar school.<br>
            Doel 7: Er leven meer mensen in een duurzaam leefmilieu.<br>
            Doel 8: Er is meer eerlijke handel, schuldverlichting en hulp.</p>
        <p>• De aanvrager moet bereid zijn een verantwoordingsrapportage te maken.<br>
            • De aanvragen van buitenlandse organisaties laten toetsen door een nader te bepalen Nederlandse hulpinstelling.</p>
        <h2><b>Online subsidieaanvraag</b></h2>

        <!--		   all data is labeled with a name, a reference will be  in the action page like this : $_POST["onderneming"];-->
        <form role="form" action="contact_action.php" id="contactForm" method="post">
            <div class="form-group">

                Algemene gegevens onderneming
                <div class="row">
                    <div class="col-md-3"><input type="text" name="contactpersoon" placeholder="Naam contactpersoon.." class="form-control" required></div>
                    <div class="col-md-3"><input type="text" name="onderneming" placeholder="Naam bedrijf.." class="form-control" required></div>
                    <div class="col-md-3"><input type="text" name="kvk" placeholder="KVK nummer.." class="form-control" required></div>
                    <br><br>
                </div>

                Adresgegevens
                <div class="row">
                    <div class="col-md-3"><input type="text" name="adres" placeholder="Adres.." class="form-control" required></div>
                    <div class="col-md-3"><input type="text" name="postcode" placeholder="Postcode.." class="form-control"></div>
                    <div class="col-md-3"><input type="text" name="plaats" placeholder="Plaats.." class="form-control" required></div>
                    <br><br>
                </div>

                Contactinformatie
                <div class="row">
                    <div class="col-md-3"><input type="text" name="telefoonnummer1" placeholder="Telefoonnummer.." class="form-control" required></div>
                    <div class="col-md-3"><input type="text" name="telefoonnummer2" placeholder="Telefoonnummer.." class="form-control"></div>
                    <div class="col-md-3"><input type="text" name="fax" placeholder="Fax.." class="form-control"></div>
                    <div class="col-md-3"><input type="text" name="email" placeholder="E-mail adres.." class="form-control" required></div>
                    <br><br>
                </div>

                Toelichting
                <div class="row">
                    <div class="col-md-3"> <textarea name="toelichting" class="form-control" placeholder="Gevraagde subsidie, met toelichting" required></textarea> </div>
                    <div class="col-md-3"> <textarea name="activiteiten" class="form-control"  placeholder="Beschrijving van de beoogde activiteiten" required></textarea></div>
                    <div class="col-md-3"> <textarea name="resultaten" class="form-control"  placeholder="Beschrijven van de beoogde resultaten" required></textarea></div>
                </div>
                <br>
                <input  type="submit" value="Submit" style="width: 30%" class="form-control">
            </div>
        </form>
    </div>
</div>








<?php
include("includes/markup/footer.php");
?>

