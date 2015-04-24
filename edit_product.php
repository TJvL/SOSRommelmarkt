<!--For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..-->
<?php include("includes/markup/header.inc.php"); ?>

<div class="container">
	<div class="grey">
		<form role="form" action="" method="post">
			<div class="form-group">
				<h2>Product Aanpassen:</h2>
				
				<div class="row">
					<div class="col-sm-12 padding-sm"><input type="text" class="form-control" required="required" name="name" placeholder="Artikelnaam..."></div>
				</div>
				
				<div class="row">
					<div class="col-sm-12 padding-sm"><textarea class="form-control" required="required" name="description" placeholder="Omschrijving..." rows="5"></textarea></div>
				</div>
				
				<div class="row">
					<!-- Afbeelding verplaatsen & alt tekst veranderen & src veranderen -->
					<div class="col-sm-2 padding-sm"><img class="form-control" id="productImagePreview" src="#" alt="Product Afbeelding"></div>
					<div class="col-sm-6 padding-sm"><input type="file" class="form-control" required="required" name="productImage" onchange="readURL(this);"></div>
					<div class="col-sm-2 padding-sm">
						<select name="color_code" class="form-control" required="required">
							<option value="" default selected>Kies...</option>
							<option value="rood">Rood</option>
							<option value="paars">Paars</option>
							<option value="geel">Geel</option>
						</select>
					</div>
					<div class="col-sm-2 padding-sm"><input type="submit" name="submit" value="Opslaan" class="form-control"></div>
					<!-- formulier aanpassen zodat het goed wordt verstuurd naar Simon's backend -->
				</div>
			</div>
		</form>
		
		
		<!-- 
		<form action="productimageupload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="productImage">
		<input type="hidden" name="productId" value="1">
		<input type="submit" name="submit" value="Upload Image">
		</form>
		 -->
	</div>
</div>

<?php
include("includes/markup/footer.inc.php");
?> 