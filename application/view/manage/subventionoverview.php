<?php Type::check("ArrayList:SubventionRequest", $model) ?>
<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Subsidieaanvragen</h1>
            <hr>
        </div>
        <div class="row">
            <div class="table-responsive padding-sm margin-lg">
                <table id="subventionTable" class="display">
                    <thead>
                    <tr>
                        <th>Onderneming</th>
                        <th>Contactpersoon</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $subvention) { ?>
                        <tr>
                            <td><?php echo $subvention->firm; ?></td>
                            <td><?php echo $subvention->contactperson; ?></td>
                            <td><?php echo $subvention->email; ?></td>
                            <td><?php echo $subvention->status; ?></td>
                            <td>
                                <a href="<?php echo ROOT_PATH . "/manage/subventionview/" . $subvention->id ?>"><button class="btn btn-default" title="Aanvraag info"><i class="fa fa-info"></i></button></a>
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
