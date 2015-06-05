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
                <h1>Inloggen</h1>
            </div>
            <form action="javascript:login()" class="idealforms" id="loginForm">
                <div class="field">
                    <label class="main">Gebruikersnaam:</label>
                    <input form="loginForm" id="username" name="username" type="text">
                </div>
                <div class="field">
                    <label class="main">Wachtwoord:</label>
                    <input form="loginForm" id="password" name="password" type="password">
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="loginForm" type="submit" class="submit">Inloggen</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
    </div>
</div>