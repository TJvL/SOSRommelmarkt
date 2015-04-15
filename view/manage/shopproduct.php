<?php 
// Check if a correct model has been given to the view.
Type::check("ShopProduct", $model);
?>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo ROOT_DIR; ?>/includes/js/bootstrap.js"></script>
<link href="<?php echo ROOT_DIR ?>/includes/css/cropper.css" rel="stylesheet">
<script src="<?php echo ROOT_DIR ?>/includes/js/cropper.js"></script>
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

$(document).ready(function()
{
	$("#addImageButton").click(function()
	{
		$("#fileInput").trigger("click");
	});

	$("#fileInput").change(function()
	{
		showImage(this);

		$("#image").load(function()
		{
			jQuery("#cropperModal").modal("show");

			$("#cropperContainer > img").cropper(
			{
				aspectRatio: 16 / 9,
				autoCropArea: 0.65,
				guides: false,
				strict: false,
				crop: function(data)
				{
					$("#dataX").text(Math.round(data.x));
					$("#dataY").text(Math.round(data.y));
					
				},
				dragmove: function(e)
				{
					var $this = $(this);
					var canvasData = $this.cropper("getCanvasData");
					var cropBoxData = $this.cropper("getCropBoxData");
					
					if (canvasData.top > cropBoxData.top)
					{
						canvasData.top = cropBoxData.top;
						setCanvasData(canvasData);
					}
					else if (canvasData.left > cropBoxData.left)
					{
						canvasData.left = cropBoxData.left;
						setCanvasData(canvasData);
					}
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
				$("#image").attr("src", e.target.result);
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

<input class="hidden" id="fileInput" type="file">

<div class="modal fade" id="cropperModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h4 id="dataX"></h4>
				<h4 id="dataY"></h4>
				<div id="cropperContainer">
					<img id="image">
				</div>
			</div>
		</div>
	</div>
</div>