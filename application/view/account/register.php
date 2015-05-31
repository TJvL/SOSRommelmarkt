<div class="container">
    <div style="margin-bottom:5%" class="white">
        <div class="content">
            <form action="<?php echo ROOT_PATH . "/account/register"?>" class="idealforms" method="post" id="registerForm">
                <?php
                if(isset($viewBag['message']))
                {
                    echo "<p>" . $viewBag['message'] . "</p>";
                }
                ?>
                <h2>Nieuwe account aanmaken</h2>
                <div class="field">
                    <label class="main">Gebruikersnaam</label>
                    <input form="registerForm" name="username" type="text" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkUsername" ?>">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">E-Mail</label>
                    <input form="registerForm" name="email" type="email" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkEmail" ?>">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">E-Mail bevestiging</label>
                    <input form="registerForm" name="emailConfirm" type="email">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Wachtwoord</label>
                    <input form="registerForm" name="password" type="password">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Wachtwoord bevestiging</label>
                    <input form="registerForm" name="passwordConfirm" type="password">
                    <span class="error"></span>
                </div>

                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="registerForm" type="submit" class="submit">Registreren</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
    </div>
</div>