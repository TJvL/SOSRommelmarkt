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

            <form class="form-horizontal" action="javascript:handleUpdatePartner()">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="id">ID</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="id" type="number" value="<?php echo $model->id ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Titel</label>
                    <div class="col-sm-8">
                        <input class="form-control" form="projectForm" id="title" name="title" type="text" value="<?php echo $model->title ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="website">Project omschrijving</label>
                    <div class="col-sm-8">
                        <textarea form="projectForm" class="form-control" rows="20" id="description" name="description" ><?php echo htmlspecialchars($model->body, ENT_QUOTES)?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button class="btn btn-default btn-block" type="submit">Opslaan</button>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger btn-block" type="button" onClick="handleDeletePartner()">Verwijderen</button>
                    </div>
                    <div class="col-sm-4">
                        <div class="alert" id="status" role="alert"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>