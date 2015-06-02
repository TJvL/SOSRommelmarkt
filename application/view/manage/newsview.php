<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/newsoverview" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" onclick="deleteNews()">Verwijder news</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Nieuws bewerken</h1>
            </div>
            <form action="javascript:updateNews()" autocomplete="off" class="idealforms" id="newsForm">
                <div class="field">
                    <label class="main">Titel:</label>
                    <input form="newsForm" id="heading" name="heading" type="text" value="<?php echo $model->heading; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Tekst:</label>
                    <textarea form="newsForm" id="content" name="content" cols="10" rows="5" style="resize: vertical"><?php echo $model->content; ?></textarea>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Verloopdatum:</label>
                    <input form="newsForm" id="expiration-date" name="expiration_date" type="text" class="datepicker" value="<?php echo date("m/d/Y", strtotime($model->expiration_date)); ?>">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <input form="newsForm" id="id" name="id" type="hidden" value="<?php echo $model->id; ?>">
                    <label class="main">&nbsp;</label>
                    <button form="newsForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
	</div>
</div>
