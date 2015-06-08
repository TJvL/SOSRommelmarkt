<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/projectoverview" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Project toevoegen</h1>
            </div>

            <form class="idealforms" id="projectform" action="javascript:AddProject()">
                <div class="field">
                    <label class="main" for="titel">Titel</label>
                    <input form="projectform" name="title" id="title" type="text" placeholder="Titel van het project">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="description">Project omschrijving</label>
                    <textarea form="projectform" rows="5" name="description" id="description" placeholder="Omschrijving van het project"></textarea>
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="projectform" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
    </div>
</div>