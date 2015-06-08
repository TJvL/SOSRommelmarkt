<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/auctionproductoverview/" . $_SESSION["auctionId"] ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" type="button" onClick="handleDeleteProduct()">Verwijderen</button>
            </div>
        </div>
		<div class="row">
			<hr>
			<div class="col-sm-1"></div>
			<h1>Productinformatie</h1>
			<form class="idealforms" form="updateForm" id="updateForm" action="javascript:handleUpdateProduct()">

                <input type="hidden" form="updateForm" name="id" id="id" value="<?php echo $model->auctionProduct->id ?>"/>

				<div class="field">
					<label class="main">Naam</label>
                    <input form="updateForm" name="name" id="name" type="text" placeholder="Naam van het product" value="<?php echo $model->auctionProduct->name ?>">
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main">Omschrijving</label>
                    <textarea form="updateForm" name="description" id="description" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->auctionProduct->description ?></textarea>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main">Toegevoegd door</label>
                    <input form="updateForm" type="text" value="<?php echo $model->auctionProduct->addedBy ?>" disabled>
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main">Kleurcode</label>
                    <select name="colorCode" id="colorCode" form="updateForm">
                        <?php
                        foreach ($model->colorCodes as $colorCode)
                        {
                            if ($colorCode->name == $model->auctionProduct->colorCode)
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
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="updateForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>

			</form>
		</div>

		<div class="hidden col-md-offset-2 col-md-8" id="cropperDiv">
			<div class="row">
				<hr>
				<div id="cropperContainer">
                    <h2>Preview afbeelding</h2>
					<img id="image">
				</div>
			</div>
			<div class="row">
                <div class="col-md-3 margin-ver-lg">
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
                <div class="col-md-9 margin-ver-lg">
                    <p><b>Voordat u de afbeelding maakt, moet deze geschaald zijn.</b></p>
                </div>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
        <div class="row">
            <hr>

            <h1 class="padding-hor-lg">Afbeeldingen</h1>

            <div class="col-sm-2">
                <div class="btn btn-default" id="addImageButton">
                    <span class="fa fa-plus"></span>
                </div>
            </div>
            <?php
            foreach ($model->auctionProduct->getImagePaths() as $imagePath)
            {
                ?>
                <div class="col-sm-2">
                    <div class="thumbnail">
                        <img class="auctionproduct-manage-image" src="<?php echo $imagePath; ?>">
                        <div class="caption text-center">
                            <a class="btn btn-danger" onClick="handleDeleteImage('<?php echo $imagePath; ?>')">Verwijder</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
	</div>
</div>