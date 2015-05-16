<?php Type::check("ArrayList:Project", $model) ?>

<div class="container">
    <div class="white">

        <div class="row">
            <h1>Projecten</h1>
        </div>

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/addproject'?>" class="btn btn-default">Project toevoegen...</a>
            </div>
        </div>
        <div class="table-responsive padding-sm">
            <table id="projectTable" class="display">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Titel</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($model as $project)
                {
                    ?>
                    <tr>
                        <td><?php echo $project->id ?></td>
                        <td><?php echo $project->title ?></td>
                        <td>
                            <a href="projectdetails/<?php echo $project->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#projectTable').DataTable();
    } );
</script>