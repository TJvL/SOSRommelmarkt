<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/accountadd"; ?>" class="btn btn-success">Account Toevoegen</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Accounts</h1>
            <hr>
        </div>
        <div class="row">
            <div class="table-responsive padding-sm margin-lg">
                <table id="accountTable" class="display">
                    <thead>
                    <tr>
                        <th>Gebruikersnaam</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Laatst ingelogd</th>
                        <th>Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $account) { ?>
                        <tr>
                            <td><?php echo $account->username; ?></td>
                            <td><?php echo $account->email; ?></td>
                            <td><?php echo $account->role; ?></td>
                            <td><?php echo $account->lastLogin; ?></td>
                            <td>
                                <a href="<?php echo ROOT_PATH . "/manage/accountview/" . $account->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
    </div>
</div>
