<?php Type::check("Project", $model) ?>

<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/projectoverview" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" onclick="DeleteProject()">Verwijder project</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Projectinformatie</h1>
            </div>

            <form class="idealforms" id="projectform" action="javascript:UpdateProject()">
                <input form="projectform" id="id" name="id" type="hidden" value="<?php echo $model->id ?>">

                <div class="field">
                    <label class="main" for="name">Titel</label>
                    <input form="projectform" id="title" name="title" type="text" value="<?php echo $model->title ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="description">Project omschrijving</label>
                    <textarea form="projectform" rows="20" id="description" name="description" ><?php echo htmlspecialchars($model->body, ENT_QUOTES)?></textarea>
                </div>

                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="projectform" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>

            </form>
        </div>
            <!--Image handling -->
            <div class="hidden col-md-12 margin-ver-md padding-sm" id="previewImageDiv">
                <div class="row">

                    <div class="col-md-offset-3 col-md-6">
                        <hr>
                        <h2>Preview afbeelding</h2>
                        <img id="image">
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-6 margin-ver-lg">
                    <form id="imageDataForm" enctype="multipart/form-data" action="javascript:handleNewImage()">
                        <button class="btn btn-default" type="submit">Voeg afbeelding toe</button>
                        <input class="hidden" id="fileInput" name="file" type="file">
                        <input name="projectId" type="hidden" value="<?php echo $model->id ?>">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 padding-lg">
                    <p id="status" class="padding-lg"></p>
                </div>
            </div>
            <div class="row">
                <hr>

                <h1 class="padding-hor-lg">Afbeeldingen</h1>

                <div class="col-sm-2">
                    <div class="btn btn-default" id="addImageButton">
                        <span class="fa fa-plus"></span>
                    </div>
                </div>
                <?php
                foreach ($model->getImagePaths() as $imagePath)
                {
                    ?>
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <img class="project-manage-image" src="<?php echo $imagePath; ?>">
                            <div class="caption text-center">
                                <a class="btn btn-danger" onClick="handleDeleteImage('<?php echo $imagePath; ?>')">Verwijder</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

    </div>
</div>
