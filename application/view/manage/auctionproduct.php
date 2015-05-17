<?php 
// Check if a correct model has been given to the view.
Type::check("AuctionProduct", $model);
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

	    var formData = new FormData(document.getElementById("updateForm"));
		
	    $.ajax(
		{
			url: "update",
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
			id: <?php echo $model->id ?>,
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
	        }
		});
	}
}

function handleNewImage()
{
	var formData = new FormData(document.getElementById("imageForm"));

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
			id: <?php echo $model->id ?>,
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
                <a href="<?php echo ROOT_PATH . "/manage/editauction/" . $_SESSION["auctionId"] ?>" class="btn btn-default">Back</a>
            </div>
        </div>
		<div class="row">
			<hr>
			<div class="col-sm-1"></div>
			<h1>Productinformatie</h1>
			<form class="form-horizontal" id="updateForm" action="javascript:handleUpdateProduct()">
				<input name="id" type="hidden" value="<?php echo $model->id ?>">
				<div class="form-group">
					<label class="control-label col-sm-2">ID</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" type="number" value="<?php echo $model->id ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Naam</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" name="name" type="text" placeholder="Naam van het product" value="<?php echo $model->name ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Omschrijving</label>
					<div class="col-sm-10">
						<div class="input-group">
							<textarea class="form-control" name="description" style="resize: none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->description ?></textarea>
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
							<select name="colorCode" class="form-control">
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
					<input name="id" type="hidden" value="<?php echo $model->id ?>">
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