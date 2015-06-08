<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/newsadd"; ?>" class="btn btn-success">Nieuws Toevoegen</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="table-responsive padding-sm margin-lg">
                <table id="newsTable" class="display">
                    <thead>
                    <tr>
                        <th>Heading</th>
                        <th>Aanmaakdatum</th>
                        <th>Verloopdatum</th>
                        <th>Geplaatst door</th>
                        <th>Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $news) { ?>
                        <tr>
                            <td><?php echo $news->heading; ?></td>
                            <td><?php echo $news->create_date; ?></td>
                            <td><?php echo $news->expiration_date; ?></td>
                            <td><?php echo $news->publisher; ?></td>
                            <td>
                                <a href="<?php echo ROOT_PATH . "/manage/newsview/" . $news->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
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
