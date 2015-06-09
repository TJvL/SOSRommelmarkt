<?php Type::check("ArrayList:Project", $model) ?>

<div class="container">
    <div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/projectadd'?>" class="btn btn-success">Nieuw project</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Projecten</h1>
        </div>

        <div class="table-responsive padding-sm">
            <table id="projectTable" class="display">
                <thead>
                <tr>
                    <th>Titel</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($model as $project)
                {?>
                    <tr>
                        <td><?php echo $project->title ?></td>
                        <td>
                            <a href="<?php echo ROOT_PATH ?>/manage/projectview/<?php echo $project->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
                        </td>
                    </tr>
                <?php
                }?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
    </div>
</div>
