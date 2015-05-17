<?php Type::check("Partner", $model) ?>

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
				<h1>Partnerinformatie</h1>
			</div>
			<form class="form-horizontal" id="updatePartnerForm" action="javascript:UpdatePartner()">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id">ID</label>
					<div class="col-sm-8">
						<input class="form-control" id="id" name="id" type="number" value="<?php echo $model->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Naam</label>
					<div class="col-sm-8">
						<input class="form-control" id="name" name="name" type="text" placeholder="Naam van de partner" value="<?php echo $model->name ?>" required>
					</div>
				</div>
				<div class="form-group">
                    <label class="control-label col-sm-2" for="website">Website</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="website" name="website" type="text"placeholder="Website van partner" value="<?php echo $model->website ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">Plaatje</label>
                    <div class="col-sm-8">
                    	<input class="form-control" id="image" name="image" type="file" form="">
                    </div>
                </div>
                <div class="form-group" id="imagePreviewDiv">
                	<label class="control-label col-sm-2" for="imagePreview">Plaatje preview</label>
	                <div class="col-sm-8">
	                	<img class="image-preview" id="imagePreview" src="<?php echo $model->getImagePath() ?>">
	                </div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button class="btn btn-default btn-block" type="submit">Opslaan</button>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-danger btn-block" type="button" onClick="DeletePartner()">Verwijderen</button>
					</div>
					<div class="col-sm-4">
						<div class="alert" id="status" role="alert"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
