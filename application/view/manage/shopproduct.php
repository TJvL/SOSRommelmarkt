<?php 
// Check if a correct model has been given to the view.
Type::check("ShopProduct", $model);
?>

<head>
<script>
function handleUpdateProduct()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		// Reset status message.
		$("#status").text("");
		$("#status").removeClass("alert-success alert-danger");
	
	    var data =
		{
	    	productId:			<?php echo $model->id ?>,
	    	productName:		$("#productName").val(),
	    	productDescription:	$("#productDescription").val(),
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
}

function handleDeleteProduct()
{
	if (confirm("Weet u zeker dat u dit product wilt verwijderen?"))
	{
		var data =
		{
			productId: <?php echo $model->id ?>,
		};
	
		$.ajax(
		{
			url: "delete",
	        type: "POST",
	        data: data,
	        async: true,
	        success: function(result)
	        {
	        	// Check if it went alright.
		        if (result == 0)
		        {
		        	alert("Success");
		        }
		        else
		        {
		        	alert("fail");
		        }
	
		     	// Go to the product management page.
		        document.location.href = "../shopproducts";
	        }
		});
	}
}

function handleNewImage()
{
	var formData = new FormData(document.getElementById("imageDataForm"));

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
	        	alert("Success");
	        }
	        else
	        {
	        	alert("fail");
	        }

	     	// Reload the page.
        	location.reload();
        }
	});
}

function handleDeleteImage(imagePath)
{
	if (confirm("Weet u zeker dat u deze afbeelding wilt verwijderen?"))
	{
		imageName = imagePath.substring(imagePath.lastIndexOf("/") + 1);
	
		var data =
		{
			productId: <?php echo $model->id ?>,
	    	imageName: imageName
		};
	
		$.ajax(
		{
			url: "deleteImage",
	        type: "POST",
	        data: data,
	        async: true,
	        success: function(result)
	        {
	        	// Check if it went alright.
		        if (result == 0)
		        {
		        	alert("Success");
		        }
		        else
		        {
		        	alert("fail");
		        }
	
		     	// Reload the page.
	        	location.reload();
	        }
		});
	}
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

		// Once the image is loaded start up the cropper.
		$("#image").load(function()
		{
			// Get the original width and height.
			var originalWidth = document.getElementById("image").naturalWidth;
            var originalHeight = document.getElementById("image").naturalHeight;
            $("#originalWidth").val(originalWidth.toString());
            $("#originalHeight").val(originalHeight.toString());
			
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
				$("#image").css("width", "auto");
				$("#image").css("max-width", "100%");
				$("#image").css("max-height", "500px");
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
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/shopproducts'?>" class="btn btn-default">Back</a>
            </div>
        </div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Productinformatie</h1>
			</div>
			<form class="form-horizontal" action="javascript:handleUpdateProduct()">
				<div class="form-group">
					<label class="control-label col-sm-2" for="productId">ID</label>
					<div class="col-sm-8">
						<input class="form-control" id="productId" type="number" value="<?php echo $model->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="productName">Naam</label>
					<div class="col-sm-8">
						<input class="form-control" id="productName" type="text" placeholder="Naam van het product" value="<?php echo $model->name ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="productDescription">Omschrijving</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="productDescription" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->description ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="productAddedBy">Toegevoegd door</label>
					<div class="col-sm-8">
						<input class="form-control" id="productAddedBy" type="text" value="<?php echo $model->addedBy ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="productColorCode">Kleurcode</label>
					<div class="col-sm-8">
						<select id="productColorCode" class="form-control">
			                <?php 
							foreach (ColorCodeRepository::selectAll() as $colorCode)
							{
								if ($colorCode->name == $model->colorCode)
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
				<div class="form-group">
					<label class="control-label col-sm-2" for="productPrice">Prijs</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">&euro;</span>
							<input class="form-control" id="productPrice" type="number" step="any" value="<?php echo $model->price ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="productIsReserved">Is gereserveerd</label>
					<div class="col-sm-8">
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
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button class="btn btn-default btn-block" type="submit">Opslaan</button>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-danger btn-block" type="button" onClick="handleDeleteProduct()">Verwijderen</button>
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