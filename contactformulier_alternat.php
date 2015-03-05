<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->

<head>
    <?php
    include("includes/markup/header.php");
    ?>

    <link href=  "/SOSRommelmarkt/includes/css/contactformulier_normalize.css" rel="stylesheet">
    <link href=  "/SOSRommelmarkt/includes/css/contactformulier_jq_form.css" rel="stylesheet">
<!--    <link href=  "/SOSRommelmarkt/includes/css/contactformulier.css" rel="stylesheet"> -->

</head>

<body>
<div class="content">

    <div class="idealsteps-container">

        <nav class="idealsteps-nav"></nav>

        <form method="POST" action="email.php"  class="idealforms" name="reserveren">

            <div class="idealsteps-wrap">

                <!-- Step 1 -->

                <section class="idealsteps-step">


                    <div class="field">
                        <label class="main">Van</label>
                        <input name="van" type="text" placeholder="Van... bv. Oranje Nassaulaan 2, Den Bosch">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Postcode</label>
                        <input name="zip" type="text" placeholder="0000AA">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Naar</label>
                        <input name="naar" type="text" placeholder="Naar... bv. Danrak 3, Amsterdam">
                        <i class="fa fa-map-marker"></i>
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Postcode</label>
                        <input name="zip" type="text" placeholder="0000AA">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Datum</label>
                        <input name="date" type="text" placeholder="dd/mm/yyyy">
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
                        <label class="main">Voornaam</label>
                        <input name="name" type="text">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Achternaam</label>
                        <input name="lname" type="text">
                        <span class="error"></span>
                    </div>

                    <div class="field">
                        <label class="main">Telefoon</label>
                        <input name="phone" type="text" placeholder="000-000-0000">
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

                <!-- Step 3 -->

                <section class="idealsteps-step">

                    <div class="field">
                        <label class="main">Opmerkingen</label>
                        <textarea name="comments" cols="30" rows="10"></textarea>
                        <span class="error"></span>
                    </div>

                    <div class="field buttons">
                        <label class="main">&nbsp;</label>
                        <button type="button" class="prev">&laquo; Vorige</button>
                        <button type="submit" class="submit">Versturen</button>
                    </div>

                </section>

            </div>

            <span id="invalid"></span>

        </form>

    </div>

</div>

</body>




<script src="/SOSRommelmarkt/includes/js/contactformulier.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/includes/js/contactformulier_submit.js" type="text/javascript"></script>


<?php
include("includes/markup/footer.php");
?>