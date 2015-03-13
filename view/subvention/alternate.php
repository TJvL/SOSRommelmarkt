<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->

<head>
    <link href=  "/SOSRommelmarkt/includes/css/contactformulier_normalize.css" rel="stylesheet">
    <link href=  "/SOSRommelmarkt/includes/css/contactformulier_jq_form.css" rel="stylesheet">
    <link href=  "/SOSRommelmarkt/includes/css/contactformulier.css" rel="stylesheet">
</head>

<div class="container">
    <div class="white">
        <div class="content">

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form method="POST" action="contact_action.php"  class="idealforms" name="aanvraag">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">


                            <div class="field">
                                <label class="main">voornaam</label>
                                <input name="name" type="text" placeholder="Uw voornaam">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Achternaam</label>
                                <input name="lname" type="text" placeholder="Uw achternaam">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Bedrijfsnaam</label>
                                <input name="bedrijfsnaam" type="text" placeholder="De naam van uw bedrijf">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">KVK nummer</label>
                                <input name="kvknr" type="text" placeholder="Uw KVK-nummer">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>


                        </section>

                        <!-- Step 2 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Straatnaam</label>
                                <input name="straatnaam" type="text" placeholder="Uw straatnaam met huisnummer">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Postcode</label>
                                <input name="zip" type="text" placeholder="0000AA">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Plaats</label>
                                <input name="plaats" type="text" placeholder="Uw woonplaats">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>


                        </section>

                        <!-- step 3 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Telefoon</label>
                                <input name="phone" type="text" placeholder="1234567890">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Mobiel</label>
                                <input name="gsm" type="text" placeholder="1234567890">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Fax</label>
                                <input name="fax" type="text" placeholder="1234567890">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">E-Mail</label>
                                <input name="email" type="email">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>


                        </section>

                        <!-- Step 4 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Toelichting</label>
                                <textarea name="comments" cols="30" rows="10" placeholder="Graag invullen waarom u een subsidie nodig heeft. Geef een beschijving van de beoogde activiteiten en een beschrijving van de beoogde resultaten."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="submit" class="submit">Versturenn</button>
                            </div>

                        </section>

                    </div>

                    <span id="invalid"></span>

                </form>

            </div>

        </div>
    </div>


</div>

<script src="/SOSRommelmarkt/includes/js/contactformulier.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/includes/js/contactformulier_submit.js" type="text/javascript"></script>
