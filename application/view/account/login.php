<div class="container">
    <div style="margin-bottom:5%" class="white">
        <div class="content">
            <form action="<?php echo ROOT_PATH . "/account/login"?>" class="idealforms" method="post" id="loginForm">
                <?php
                if(isset($viewBag['message']))
                {
                    echo "<p>" . $viewBag['message'] . "</p>";
                }
                ?>
                <h2>Inloggen op account</h2>
                <div class="field">
                    <label class="main">Gebruikersnaam</label>
                    <input form="loginForm" name="username" type="text" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkUsername" ?>">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Wachtwoord</label>
                    <input form="loginForm" name="password" type="password">
                    <span class="error"></span>
                </div>

                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="loginForm" type="submit" class="submit">Inloggen</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
    </div>
</div>