<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->

<head>
    <link href=  "/SOSRommelmarkt/IdealForms/css/jquery.idealforms.css" rel="stylesheet">
</head>

<div class="container">
    <div class="white">
        <div class="content">

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form method="POST" action="" role="form" class="idealforms" id="aanvraag">

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
                                <input name="lastname" type="text" placeholder="Uw achternaam">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Bedrijfsnaam</label>
                                <input name="companyname" type="text" placeholder="De naam van uw bedrijf">
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
                                <input name="street" type="text" placeholder="Uw straatnaam met huisnummer">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Postcode</label>
                                <input name="zip" type="text" placeholder="0000AA">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Plaats</label>
                                <input name="place" type="text" placeholder="Uw woonplaats">
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
                                <input name="email" type="email" placeholder="iemand@email.com">
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
                                <textarea name="explanation" cols="30" rows="7" style="resize: none" placeholder="Graag invullen waarom u een subsidie nodig heeft."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Geplande activiteiten</label>
                                <textarea name="planned_activities" cols="30" rows="7" style="resize: none" placeholder="Geef een beschijving van beoogde activiteiten."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Beoogde resultaten</label>
                                <textarea name="intended_results" cols="30" rows="7" style="resize: none" placeholder="Geef een beschijving van de beoogde resultaten."></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button form="aanvraag" type="submit" class="submit">Versturen</button>
                            </div>

                        </section>

                    </div>

                    <span id="invalid"></span>
                </form>

            </div>

        </div>
    </div>


</div>

<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.submit.js" type="text/javascript"></script>
