<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/home/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <?php
            if(!($model->role === "Standaard"))
            {
            ?>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Management</a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <hr>
            <?php
            if(isset($viewBag['message']))
            {
                echo "<p>" . $viewBag['message'] . "</p>";
            }
            ?>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Account informatie</h1>
            </div>
            <form class="idealforms" id="accountForm" method="post" action="<?php echo ROOT_PATH . "/account/index"?>">

                <div class="field">
                    <label class="main" for="name">Gebruikersnaam</label>
                    <input form="accountForm" id="username" name="username" type="text" value="<?php echo $model->username ?>">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main" for="name">Email</label>
                    <input form="accountForm" id="email" name="email" type="text" value="<?php echo $model->email ?>" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkEmail" ?>">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main" for="name">Nieuw wachtwoord</label>
                    <input form="accountForm" id="newPassword" name="newPassword" type="password">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main" for="name">Wachtwoord bevestiging</label>
                    <input form="accountForm" id="confirmPassword" name="confirmPassword" type="password">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main" for="name">Oud wachtwoord</label>
                    <input form="accountForm" id="oldPassword" name="oldPassword" type="password">
                    <span class="error"></span>
                </div>

                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <input form="accountForm" id="id" name="id" type="hidden" value="<?php echo $model->id ?>">
                    <button form="accountForm" type="submit" class="submit">Wijzigen</button>
                </div>
                <span id="invalid"></span>

            </form>
        </div>
    </div>
</div>