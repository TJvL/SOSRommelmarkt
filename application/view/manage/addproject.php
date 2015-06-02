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

            <form class="idealforms" id="projectform" method="POST" action="<?php echo ROOT_PATH . "/manage/addproject" ?>">
                <div class="field">
                    <label class="main" for="titel">Titel</label>
                    <input form="projectform" name="title" type="text" placeholder="Titel van het project" required>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="description">Project omschrijving</label>
                    <textarea form="projectform" rows="5" name="description" placeholder="Omschrijving van het project" required></textarea>
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="projectform" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
<!--                <div class="form-group">-->
<!--                    <div class="col-sm-offset-2 col-sm-2">-->
<!--                        <button class="btn btn-red btn-block" type="submit">Toevoegen</button>-->
<!--                    </div>-->
<!--                </div>-->
            </form>
        </div>
    </div>
</div>