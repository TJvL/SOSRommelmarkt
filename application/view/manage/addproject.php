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
                <h1>Project toevoegen</h1>
            </div>
            <form class="form-horizontal" id="projectForm" method="POST" action="<?php echo ROOT_PATH . "/manage/addproject" ?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Titel</label>
                    <div class="col-sm-8">
                        <input class="form-control" form="projectForm" id="title" name="title" type="text" placeholder="Titel van het project" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="website">Project omschrijving</label>
                    <div class="col-sm-8">
                        <textarea form="projectForm" class="form-control" rows="5" id="description" name="description" placeholder="Omschrijving van het project" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button class="btn btn-red btn-block" form="projectForm" type="submit">Toevoegen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>