<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/sloganoverview" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" onclick="deleteSlogan()">Verwijder slogan</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Slogan bewerken</h1>
            </div>
            <form action="javascript:updateSlogan()" autocomplete="off" class="idealforms" id="sloganForm">
                <div class="field">
                    <label class="main">Slogan:</label>
                    <textarea form="sloganForm" id="slogan" name="slogan" type="text"><?php echo $model->slogan; ?></textarea>
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <input form="sloganForm" id="id" name="id" type="hidden" value="<?php echo $model->id; ?>">
                    <label class="main">&nbsp;</label>
                    <button form="sloganForm" type="submit" class="submit">Opslaan</button>
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
