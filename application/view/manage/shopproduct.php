<?php 
// Check if a correct model has been given to the view.
Type::check("ShopProduct", $model);
?>

<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/shopproducts'?>" class="btn btn-default">Back</a>
            </div>
        </div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Productinformatie</h1>
			</div>
			<form class="form-horizontal" action="javascript:UpdateShopProduct()">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id">ID</label>
					<div class="col-sm-8">
						<input class="form-control" id="id" type="number" value="<?php echo $model->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Naam</label>
					<div class="col-sm-8">
						<input class="form-control" id="name" type="text" placeholder="Naam van het product" value="<?php echo $model->name ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="description">Omschrijving</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="description" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->description ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="addedBy">Toegevoegd door</label>
					<div class="col-sm-8">
						<input class="form-control" id="addedBy" type="text" value="<?php echo $model->addedBy ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="colorCode">Kleurcode</label>
					<div class="col-sm-8">
						<select id="colorCode" class="form-control">
			                <?php 
							foreach (ColorCodeRepository::selectAll() as $colorCode)
							{
								if ($colorCode->name == $model->colorCode)
								{
									?>
									<option value="<?php echo $colorCode->name ?>" selected="selected"><?php echo $colorCode->name ?> - <?php echo $colorCode->description ?></option>
									<?php
								}
								else
								{
									?>
									<option value="<?php echo $colorCode->name ?>"><?php echo $colorCode->name ?> - <?php echo $colorCode->description ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="price">Prijs</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">&euro;</span>
							<input class="form-control" id="price" type="number" step="any" value="<?php echo $model->price ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="isReserved">Is gereserveerd</label>
					<div class="col-sm-8">
						<div class="checkbox">
							<label>
								<?php 
								if ($model->isReserved)
								{
									?>
									<input id="isReserved" type="checkbox" checked>
									<?php
								}
								else
								{
									?>
									<input id="isReserved" type="checkbox">
									<?php
								}
								?>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button class="btn btn-default btn-block" type="submit">Opslaan</button>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-danger btn-block" type="button" onClick="DeleteShopProduct(<?php echo $model->id ?>)">Verwijderen</button>
					</div>
					<div class="col-sm-4">
						<div class="alert" id="status" role="alert"></div>
					</div>
				</div>
			</form>
		</div>
		<div class="hidden" id="cropperDiv">
			<div class="row">
				<hr>
				<div id="cropperContainer">
					<img id="image">
				</div>
			</div>
			<div class="row">
				<form id="imageDataForm" enctype="multipart/form-data" action="javascript:handleNewImage()">
					<button class="btn btn-default" type="submit">Maak afbeelding</button>
					<input class="hidden" id="fileInput" name="file" type="file">
					<input name="productId" type="hidden" value="<?php echo $model->id ?>">
					<input id="xCoord" name="xCoord" type="hidden">
					<input id="yCoord" name="yCoord" type="hidden">
					<input id="width" name="width" type="hidden">
					<input id="height" name="height" type="hidden">
					<input id="clientWidth" name="clientWidth" type="hidden">
					<input id="clientHeight" name="clientHeight" type="hidden">
					<input id="originalWidth" name="originalWidth" type="hidden">
					<input id="originalHeight" name="originalHeight" type="hidden">
				</form>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-1"></div>
			<h1>Afbeeldingen</h1>
			<div class="col-sm-1"></div>
			<div class="col-sm-2">
				<div class="thumbnail text-center" id="addImageButton">
					<span class="glyphicon glyphicon-plus"></span>
				</div>
			</div>
			<?php
			foreach ($model->getImagePaths() as $imagePath)
			{
				?>
				<div class="col-sm-2">
					<div class="thumbnail">
						<img src="<?php echo $imagePath; ?>">
						<div class="caption text-center">
							<a class="btn btn-danger" onClick="handleDeleteImage('<?php echo $imagePath; ?>')">Verwijder</a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<div class="col-sm-1"></div>
		</div>
	</div>
</div>