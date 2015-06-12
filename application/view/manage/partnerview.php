<?php Type::check("Partner", $model) ?>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/partneroverview" ?>" class="btn btn-default">Terug</a>
			</div>
            <div class="col-sm-offset-9 col-sm-2">
                <button class="btn btn-danger btn-block" type="button" onClick="DeletePartner()">Verwijderen</button>
            </div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Partnerinformatie</h1>
			</div>
			<form class="idealforms" form="partnerform" id="partnerform" action="javascript:UpdatePartner()">
                <input form="partnerform" id="id" type="hidden" value="<?php echo $model->id ?>">
				<div class="field">
					<label class="main" for="name">Naam</label>
					<input form="partnerform" name="name" id="name" type="text" placeholder="Naam van de partner" value="<?php echo $model->name ?>">
                    <span class="error"></span>
				</div>
				<div class="field">
                    <label class="main" for="website">Website</label>
                    <input form="partnerform" name="website" id="website" type="text" placeholder="Website van partner" value="<?php echo $model->website ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="category">Categorie</label>
                    <select form="partnerform" name="category" id="category">
                        <option value="Spoor073" <?php if ($model->category === "Spoor073") echo "selected"; ?>>Spoor073</option>
                        <option value="WOSA-Partners" <?php if ($model->category === "WOSA-Partners") echo "selected"; ?>>WOSA-Partners</option>
                        <option value="Samenwerking" <?php if ($model->category === "Samenwerking") echo "selected"; ?>>Samenwerking</option>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="image">Plaatje</label>
                    <input id="image" type="file" form="partnerform">
                    <span class="error"></span>
                </div>
                <div class="field" id="imagePreviewDiv">
                	<label class="main" for="imagePreview">Plaatje preview</label>
	                <img class="image-preview" id="imagePreview" src="<?php echo $model->getImagePath() ?>">
                    <span class="error"></span>
				</div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="partnerform" type="submit" class="submit">Opslaan</button>
                    <button type="button" onClick="SetPartnerImage()">Opslaan plaatje</button>
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
