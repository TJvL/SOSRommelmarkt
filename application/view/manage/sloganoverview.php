<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/sloganadd"; ?>" class="btn btn-success">Slogan Toevoegen</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Slogans</h1>
            <hr>
        </div>
        <div class="row">
            <div class="table-responsive padding-sm margin-lg">
                <table id="sloganTable" class="display">
                    <thead>
                    <tr>
                        <th>Slogan</th>
                        <th>Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $slogan) { ?>
                        <tr>
                            <td><?php echo $slogan->slogan ?></td>
                            <td>
                                <a href="<?php echo ROOT_PATH . "/manage/sloganview/" . $slogan->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
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