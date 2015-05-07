<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/partners" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
	            <h1>Partner toevoegen</h1>
            </div>
            <form class="form-horizontal" id="partnerForm" method="POST" action="<?php echo ROOT_PATH . "/manage/addpartner" ?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Naam</label>
                    <div class="col-sm-8">
                        <input class="form-control" form="partnerForm" id="name" name="name" type="text" placeholder="Naam van de partner" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="website">Website</label>
                    <div class="col-sm-8">
                        <input class="form-control" form="partnerForm" id="website" name="website" type="text" placeholder="Website van de partner" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button class="btn btn-default btn-block" form="partnerForm" type="submit">Opslaan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>