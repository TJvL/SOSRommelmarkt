<?php 
// Check if a correct model has been given to the view.
Type::check("ShopProduct", $model);
?>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function()
{
	$("#updateButton").click(function()
	{
		// Reset status message.
		$("#status").text("");
        $("#status").css("color", "none");
		
	    var data =
		{
	    	productId:			$("#productId").val(),
	    	productName:		$("#productName").val(),
	    	productDescription:	$("#productDescription").text(),
	    	productColorCode:	$("#productColorCode option:selected").text(),
	    	productPrice:		$("#productPrice").val(),
	    	productIsReserved:	$("#productIsReserved").is(":checked")
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
		        	$("#status").text("  Succes");
		        	$("#status").css("color", "green");
		        }
		        else
		        {
		        	$("#status").text("  Er is iets verkeerd gegaan");
		        	$("#status").css("color", "red");
		        }
	        }
		});
	});
});
</script>
</head>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-2">ID</label>
					<div class="col-xs-10">
						<div class="input-group">
							<input class="form-control" id="productId" type="number" value="<?php echo $model->id ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Naam</label>
					<div class="col-xs-10">
						<div class="input-group">
							<input class="form-control" id="productName" type="text" placeholder="Naam van het product" value="<?php echo $model->name ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Omschrijving</label>
					<div class="col-xs-10">
						<div class="input-group">
							<textarea class="form-control" id="productDescription" style="resize:none" rows="3" placeholder="Omschrijving van het product" required><?php echo $model->description ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Toegevoegd door</label>
					<div class="col-xs-10">
						<div class="input-group">
							<input class="form-control" type="text" value="<?php echo $model->addedBy ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Kleurcode</label>
					<div class="col-xs-10">
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
					<label class="control-label col-xs-2">Prijs</label>
					<div class="col-xs-10">
						<div class="input-group">
							<span class="input-group-addon">€</span>
							<input class="form-control" id="productPrice" type="number" step="any" value="<?php echo $model->price ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Is gereserveerd</label>
					<div class="col-xs-10">
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
					<label class="control-label col-xs-2"></label>
					<div class="col-xs-10">
						<div class="input-group">
							<button class="btn btn-default" id="updateButton" type="button">Update</button>
							<span id="status"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
