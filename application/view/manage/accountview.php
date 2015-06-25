<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/accountoverview" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" onclick="deleteAccount()">Verwijder account</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Account bewerken</h1>
            </div>
            <form action="javascript:updateAccount()" autocomplete="off" class="idealforms" id="accountForm">
                <div class="field">
                    <label class="main">Gebruikersnaam:</label>
                    <input form="accountForm" id="username" name="username" type="text" value="<?php echo $model->account->username; ?>" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkusername"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Email:</label>
                    <input form="accountForm" id="email" name="email" type="text" value="<?php echo $model->account->email; ?>" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkemail"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Nieuw Wachtwoord:</label>
                    <input form="accountForm" id="newPassword" name="newPassword" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Rol:</label>
                    <select form="accountForm" name="roleName" id="roleName">
                        <?php
                        foreach($model->possibleRoles as $role)
                        {
                            if($model->account->role === $role->name)
                            {
                                echo "<option value='$role->name' selected>$role->name</option>";
                            }
                            else
                            {
                                echo "<option value='$role->name'>$role->name</option>";
                            }
                        }
                        ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Laatst ingelogd:</label>
                    <input form="accountForm" id="lastLogin" name="lastLogin" type="text" value="<?php echo $model->account->lastLogin; ?>" disabled>
                </div>
                <div class="field buttons">
                    <input form="accountForm" id="id" name="id" type="hidden" value="<?php echo $model->account->id; ?>">
                    <label class="main">&nbsp;</label>
                    <button form="accountForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
    </div>
</div>
