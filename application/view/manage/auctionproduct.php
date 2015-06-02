<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/editauction/" . $_SESSION["auctionId"] ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
		<div class="row">
			<hr>
			<div class="col-sm-1"></div>
			<h1>Productinformatie</h1>
			<form class="form-horizontal" id="updateForm" action="javascript:handleUpdateProduct()">
				<input name="id" type="hidden" id="productId" value="<?php echo $model->auctionProduct->id ?>">
				<div class="form-group">
					<label class="control-label col-sm-2">ID</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" type="number" value="<?php echo $model->auctionProduct->id ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Naam</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" name="name" type="text" placeholder="Naam van het product" value="<?php echo $model->auctionProduct->name ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Omschrijving</label>
					<div class="col-sm-10">
						<div class="input-group">
							<textarea class="form-control" name="description" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->auctionProduct->description ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Toegevoegd door</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" type="text" value="<?php echo $model->auctionProduct->addedBy ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Kleurcode</label>
					<div class="col-sm-10">
						<div class="input-group">
							<select name="colorCode" class="form-control">
				                <?php 
								foreach ($model->colorCodes as $colorCode)
								{
									if ($colorCode->name == $model->auctionProduct->colorCode)
									{
										?>
										<option selected="selected"><?php echo $colorCode->name ?> - <?php echo $colorCode->description ?></option>
										<?php
									}
									else
									{
										?>
										<option><?php echo $colorCode->name ?> - <?php echo $colorCode->description ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2"></label>
					<div class="col-sm-10">
						<div class="input-group">
							<div class="btn-toolbar">
								<button class="btn btn-default" type="submit">Update</button>
								<button class="btn btn-danger" type="button" onClick="handleDeleteProduct()">Delete</button>
							</div>
						</div>
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
				<form id="imageForm" enctype="multipart/form-data" action="javascript:handleNewImage()">
					<button class="btn btn-default" type="submit">Maak afbeelding</button>
					<input class="hidden" id="fileInput" name="file" type="file">
					<input name="id" type="hidden" value="<?php echo $model->auctionProduct->id ?>">
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
			foreach ($model->auctionProduct->getImagePaths() as $imagePath)
			{
				?>
				<div class="col-sm-2">
					<div class="thumbnail">
						<img src="<?php echo $imagePath ?>">
						<div class="caption text-center">
							<a class="btn btn-danger" onClick="handleDeleteImage('<?php echo $imagePath ?>')">Verwijder</a>
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