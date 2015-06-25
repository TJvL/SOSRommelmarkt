<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/newsoverview"; ?>" class="btn btn-default">Annuleren</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Nieuws toevoegen</h1>
            </div>
            <form action="javascript:addNews()" autocomplete="off" class="idealforms" id="newsForm">
                <div class="field">
                    <label class="main">Titel:</label>
                    <input form="newsForm" id="heading" name="heading" type="text" placeholder="Plaats hier uw titel...">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Tekst:</label>
                    <textarea form="newsForm" id="content" name="content" cols="10" rows="5" class="nonresizeable" placeholder="Schrijf hier uw paragraaf..."></textarea>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Verloopdatum:</label>
                    <input form="newsForm" id="expiration-date" name="expiration_date" type="text" class="datepicker" placeholder="dd-mm-yyyy">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
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
