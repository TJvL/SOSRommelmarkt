<?php Type::check("Project", $model) ?>

<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/projects" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Projectinformatie</h1>
            </div>

            <form class="form-horizontal" action="<?php echo ROOT_PATH . '/manage/editproject'?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="id">ID</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="id" type="number" value="<?php echo $model->id ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Titel</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="title" type="text" value="<?php echo $model->title ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="website">Project omschrijving</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="20" name="description" ><?php echo htmlspecialchars($model->body, ENT_QUOTES)?></textarea>
                    </div>
                </div>

                <div class="col-sm-offset-2 col-sm-2">
                    <input type='hidden' name='id' value='<?php echo $model->id ?>'>
                    <button class="btn btn-default btn-block" type="submit">Opslaan</button>
                </div>

            </form>

                <div class="col-sm-2">
                    <form action="<?php echo ROOT_PATH . '/manage/deleteproject'?>" method='post'>
                        <input type='hidden' name='id' value='<?php echo $model->id ?>'>
                        <button type='submit' class='btn btn-danger'>Verwijderen</button>
                    </form>
                </div>

        </div>
    </div>
</div>