<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_DIR . "/manage/partners" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-1"></div>
            <h1>Partner toevoegen</h1>
            <form class="form-horizontal" id="partnerForm" method="POST" action="<?php echo ROOT_DIR . "/manage/addpartner" ?>">
                <div class="form-group">
                    <label class="control-label col-sm-2">Naam</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control" form="partnerForm" name="name" type="text" placeholder="Naam van de partner" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Website</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <textarea class="form-control" form="partnerForm" name="website" style="resize: none" rows="3" placeholder="Website van de partner" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="btn-toolbar">
                                <button class="btn btn-default" form="partnerForm" type="submit">Opslaan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>