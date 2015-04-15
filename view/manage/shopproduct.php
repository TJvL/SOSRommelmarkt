<?php 
// Check if a correct model has been given to the view.
Type::check("ShopProduct", $model);
?>

<head>
<script>
function handleUpdate()
{
	// Reset status message.
	$("#status").text("");
	$("#status").removeClass("alert-success alert-danger");

    var data =
	{
    	productId:			$("#productId").val(),
    	productName:		$("#productName").val(),
    	productDescription:	$("#productDescription").text(),
    	productColorCode:	$("#productColorCode option:selected").text(),
    	productPrice:		$("#productPrice").val(),
    	productIsReserved:	($("#productIsReserved").is(":checked") == false ? 0: 1)
	};

    $.ajax(
	{
		url: "update",
        type: "POST",
        data: data,
        async: true,
        success: function(result)
        {
	        // Check if it went alright.
	        if (result == 0)
	        {
	        	$("#status").text("  Succes!");
	        	$("#status").addClass("alert-success");
	        }
	        else
	        {
	        	$("#status").text("  Er is iets verkeerd gegaan");
	        	$("#status").addClass("alert-danger");
	        }
        }
	});
}

function handleNewImage()
{
	var formData = new FormData(document.getElementById("imageDataForm"));
	console.log(formData);

    $.ajax(
	{
		url: "addImage",
        type: "POST",
        data: formData,
        async: true,
        contentType: false,
        processData: false,
        success: function(result)
        {
	        // Check if it went alright.
	        if (result == 0)
	        {
	        	alert("success");
	        }
	        else
	        {
	        	alert("fail");
	        }
        }
	});

	// Reset the image and hide the image cropper div.
	$("#image").html("<img id='image'>");
    $("#cropperDiv").addClass("hidden");
}

$(document).ready(function()
{
	$("#addImageButton").click(function()
	{
		$("#fileInput").trigger("click");
	});

	$("#fileInput").change(function()
	{
		$("#cropperDiv").removeClass("hidden");
		showImage(this);

		$("#image").load(function()
		{
			// Init a new cropper object for this image.
			var cropper;
			cropper = new Cropper(document.getElementById("image"),
			{
				//Define aspect ratio for the crop box
                ratio:
				{
					width:1,
					height:1
				},
				update: function(data)
				{
					$("#xCoord").val(data.x);
					$("#yCoord").val(data.y);
					$("#width").val(data.width);
					$("#height").val(data.height);

					var clientWidth = document.getElementById("image").clientWidth;
                    var clientHeight = document.getElementById("image").clientHeight;
                    $("#clientWidth").val(clientWidth.toString());
                    $("#clientHeight").val(clientHeight.toString());

					var originalWidth = document.getElementById("image").naturalWidth;
                    var originalHeight = document.getElementById("image").naturalHeight;
                    $("#originalWidth").val(originalWidth.toString());
                    $("#originalHeight").val(originalHeight.toString());
                }
			});
		});
	});

	function showImage(input)
	{
        if (input.files && input.files[0])
		{
			var reader = new FileReader();
			
			reader.onload = function(e)
			{
				// Reset the image.
				$("#image").html("<img id='image'>");
				$("#image").attr("src", e.target.result);
				$("#image").css("width", "100%");
				$("#image").css("height", "100%");
            }
			reader.readAsDataURL(input.files[0]);
		}
	}
});
</script>
</head>

<div class="container">
	<div class="white">
		<div class="row">
			<hr>
			<div class="col-sm-1"></div>
			<h1>Productinformatie</h1>
			<form class="form-horizontal" action="javascript:handleUpdate()">
				<div class="form-group">
					<label class="control-label col-sm-2">ID</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" id="productId" type="number" value="<?php echo $model->id ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Naam</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" id="productName" type="text" placeholder="Naam van het product" value="<?php echo $model->name ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Omschrijving</label>
					<div class="col-sm-10">
						<div class="input-group">
							<textarea class="form-control" id="productDescription" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->description ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Toegevoegd door</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" type="text" value="<?php echo $model->addedBy ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Kleurcode</label>
					<div class="col-sm-10">
						<div class="input-group">
							<select id="productColorCode" class="form-control">
				                <?php 
								foreach (ColorCode::selectAll() as $colorCode)
								{
									if ($colorCode == $model->colorCode)
									{
										?>
										<option selected="selected"><?php echo $colorCode ?></option>
										<?php
									}
									else
									{
										?>
										<option><?php echo $colorCode ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Prijs</label>
					<div class="col-sm-10">
						<div class="input-group">
							<span class="input-group-addon">&euro;</span>
							<input class="form-control" id="productPrice" type="number" step="any" value="<?php echo $model->price ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Is gereserveerd</label>
					<div class="col-sm-10">
						<div class="input-group">
							<div class="checkbox">
								<label>
									<?php 
									if ($model->isReserved)
									{
										?>
										<input id="productIsReserved" type="checkbox" checked>
										<?php
									}
									else
									{
										?>
										<input id="productIsReserved" type="checkbox">
										<?php
									}
									?>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2"></label>
					<div class="col-sm-10">
						<div class="input-group">
							<button class="btn btn-default" type="submit">Update</button>
							<div class="alert" id="status" role="alert"></div>
						</div>
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
				<button class="btn btn-default" onClick="handleNewImage()">Maak afbeelding</button>
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
			foreach ($model->getImagePaths() as &$imagePath)
			{
				?>
				<div class="col-sm-2">
					<div class="thumbnail">
						<img src="<?php echo $imagePath ?>" alt="">
						<div class="caption text-center">
							<a href="#" class="btn btn-danger" role="button">Verwijder</a>
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

<form id="imageDataForm" enctype="multipart/form-data">
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