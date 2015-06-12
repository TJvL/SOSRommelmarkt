<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/accountoverview"; ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Account toevoegen</h1>
            </div>
            <form action="javascript:addAccount()" autocomplete="off" class="idealforms" id="accountForm">
                <div class="field">
                    <label class="main">Gebruikersnaam:</label>
                    <input form="accountForm" id="username" name="username" type="text" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkusernameadd"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Email:</label>
                    <input form="accountForm" id="email" name="email" type="text" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkemailadd"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Wachtwoord:</label>
                    <input form="accountForm" id="password" name="password" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Rol:</label>
                    <select form="accountForm" name="roleName" id="colorCode">
                        <option value="default">&ndash; Selecteer een rol &ndash;</option>
                        <?php
                        foreach($model as $role)
                        {
                            echo "<option value='$role->name'>$role->name</option>";
                        }
                        ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="accountForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
    </div>
</div>
