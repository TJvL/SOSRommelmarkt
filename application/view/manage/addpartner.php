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
            <form class="idealforms" id="createPartnerForm" enctype="multipart/form-data" action="javascript:CreatePartner()">
                <div class="field">
                    <label class="main" for="name">Naam</label>
                    <input form="createPartnerForm" id="name" type="text" placeholder="Naam van de partner">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="website">Website</label>
                    <input form="createPartnerForm" id="website" type="text" placeholder="Website van de partner">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="categorie">Categorie</label>
                    <select form="createPartnerForm" name="category" id="category">
                        <option value="disabled" disabled selected>Kies een partner categorie</option>
                        <option value="sos">SOS</option>
                        <option value="dienstverleners">Dienstverleners</option>
                        <option value="projecten">Projecten</option>
                    </select>
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main" for="image">Plaatje</label>
                    <input form="createPartnerForm" id="image" type="file">
                    <span class="error"></span>
                </div>
                <div class="form-group hidden field" id="imagePreviewDiv">
                	<label class="main" for="imagePreview">Plaatje preview</label>
	                <div class="col-sm-8">
	                	<img class="image-preview" id="imagePreview">
	                </div>
				</div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="createPartnerForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
    </div>
</div>