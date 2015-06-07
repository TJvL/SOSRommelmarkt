<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/shopproductoverview'?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-sm-offset-9 col-sm-2">
                <button class="btn btn-danger btn-block" type="button" onClick="DeleteShopProduct(<?php echo $model->shopProduct->id ?>)">Verwijderen</button>
            </div>
        </div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Productinformatie</h1>
			</div>
			<form class="idealforms" form="shopproductform" id="shopproductform" action="javascript:UpdateShopProduct()">
				<div class="field">
					<label class="main" for="id">ID</label>
					<input form="shopproductform" id="id" type="number" value="<?php echo $model->shopProduct->id ?>" disabled>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="name">Naam</label>
					<input form="shopproductform" id="name" type="text" placeholder="Naam van het product" value="<?php echo $model->shopProduct->name ?>" required>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="description">Omschrijving</label>
					<textarea form="shopproductform" id="description" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->shopProduct->description ?></textarea>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="addedBy">Toegevoegd door</label>
					<input form="shopproductform" id="addedBy" type="text" value="<?php echo $model->shopProduct->addedBy ?>" disabled>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="colorCode">Kleurcode</label>
                    <select id="colorCode" form="shopproductform">
                        <?php
                        foreach ($model->colorCodes as $colorCode)
                        {
                            if ($colorCode->name == $model->shopProduct->colorCode)
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
                    <span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="price">Prijs</label>
                    <input form="shopproductform" id="price" type="number" step="any" value="<?php echo $model->shopProduct->price ?>" required>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="isReserved">Is gereserveerd</label>
                    <?php
                    if ($model->shopProduct->isReserved)
                    {
                        ?>
                    <p class="group">
                        <input form="shopproductform" id="isReserved" type="checkbox" checked>
                    </p>
                        <?php
                    }
                    else
                    {
                        ?>
                    <p class="group">
                        <input form="shopproductform" id="isReserved" type="checkbox">
                        </p>
                        <?php
                    }
                    ?>
				</div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="shopproductform" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
<!--				<div class="form-group">-->
<!--					<div class="col-sm-offset-2 col-sm-2">-->
<!--						<button class="btn btn-default btn-block" type="submit">Opslaan</button>-->
<!--					</div>-->
<!--					-->
<!--					<div class="col-sm-4">-->
<!--						<div class="alert" id="status" role="alert"></div>-->
<!--					</div>-->
<!--				</div>-->
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
					<input name="productId" type="hidden" value="<?php echo $model->shopProduct->id ?>">
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
			foreach ($model->shopProduct->getImagePaths() as $imagePath)
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