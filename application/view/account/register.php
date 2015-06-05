<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/home/index"; ?>" class="btn btn-default">Home</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Registreren</h1>
            </div>
            <form action="javascript:addAccount()" class="idealforms" id="accountForm">
                <div class="field">
                    <label class="main">Gebruikersnaam:</label>
                    <input form="accountForm" id="username" name="username" type="text" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkusername"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">E-Mail:</label>
                    <input form="accountForm" id="email" name="email" type="text" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkemail"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">E-Mail bevestiging:</label>
                    <input form="accountForm" id="emailConfirm" name="emailConfirm" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Wachtwoord:</label>
                    <input form="accountForm" id="password" name="password" type="password">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Wachtwoord bevestiging:</label>
                    <input form="accountForm" id="passwordConfirm" name="passwordConfirm" type="password">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="accountForm" type="submit" class="submit">Registreer</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
    </div>
</div>