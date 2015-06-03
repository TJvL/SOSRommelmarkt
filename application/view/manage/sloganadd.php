<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/sloganoverview"; ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Slogan toevoegen</h1>
            </div>
            <form action="javascript:addSlogan()" autocomplete="off" class="idealforms" id="sloganForm">
                <div class="field">
                    <label class="main">Slogan:</label>
                    <input form="sloganForm" id="slogan" name="slogan" type="text" placeholder="Plaats hier uw slogan...">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="sloganForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
    </div>
</div>