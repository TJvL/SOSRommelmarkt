<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/home/index" ?>" class="btn btn-default">Home</a>
            </div>
            <div class="col-md-offset-4 col-md-1">
                <a href="<?php echo ROOT_PATH . "/account/address" ?>" class="btn btn-default">Adressen</a>
            </div>
            <?php if($model->role !== "Standaard")
            { ?>
            <div class="col-md-offset-4 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Management</a>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Account informatie</h1>
            </div>
            <form action="javascript:updateAccount()" class="idealforms" id="accountForm">
                <div class="field">
                    <label class="main">Gebruikersnaam:</label>
                    <input form="accountForm" id="username" name="username" type="text" value="<?php echo $model->username; ?>" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkusername"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">E-Mail:</label>
                    <input form="accountForm" id="email" name="email" type="text" value="<?php echo $model->email; ?>" data-idealforms-ajax="<?php echo ROOT_PATH . "/accountapi/checkemail"; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">E-Mail bevestiging:</label>
                    <input form="accountForm" id="emailConfirm" name="emailConfirm" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Nieuw wachtwoord:</label>
                    <input form="accountForm" id="newPassword" name="newPassword" type="password">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Wachtwoord bevestiging:</label>
                    <input form="accountForm" id="passwordConfirm" name="passwordConfirm" type="password">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Oud wachtwoord:</label>
                    <input form="accountForm" id="password" name="password" type="password">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <input form="accountForm" id="id" name="id" type="hidden" value="<?php echo $model->id; ?>">
                    <label class="main">&nbsp;</label>
                    <button form="accountForm" type="submit" class="submit">Wijzigen</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
        <?php if(!empty($model->permissions))
            { ?>
                <div class="row">
                    <hr>
                    <div class="col-sm-offset-2 col-sm-10">
                        <h1>Account permissies voor rol: <?php echo $model->role; ?></h1>
                    </div>
                    <table class="table-responsive table">
                        <thead>
                        <tr>
                            <th>Permissie naam</th>
                            <th>Beschrijving</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($model->permissions as $permission)
                        { ?>
                            <tr>
                                <td><?php echo $permission->name; ?></td>
                                <td><?php echo $permission->description; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
        <?php } ?>
    </div>
</div>