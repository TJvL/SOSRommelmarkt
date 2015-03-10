<?php include("includes/markup/manage_header.php"); ?>

<div class="container">
    <div class="grey">
        <form action="insertproduct.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h2>Product Aanmaken:</h2>

                <div class="row">
                	<div class="col-sm-12 padding-sm">
               		 <input type="text" class="form-control" required="required" name="productName" placeholder="Product naam...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 padding-sm">
                     <textarea class="form-control" required="required" name="productDescription" placeholder="Omschrijving..." rows="5"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 padding-sm">
                     <input type="file" class="form-control" required="required" name="productImage" onchange="readURL(this);">
                    </div>
                    <div class="col-sm-3 padding-sm">
                        <select name="productColorCode" class="form-control" required="required">
                            <option value="" default selected>Kies...</option>
                            <option value="rood">Rood</option>
                            <option value="paars">Paars</option>
                            <option value="geel">Geel</option>
                        </select>
                    </div>
                    <div class="col-sm-3 padding-sm">
                     <input type="submit" name="submit" value="Opslaan" class="form-control">
                    </div>
                    <div class="col-sm-12 padding-sm">
                        <img class="img-responsive" id="productImagePreview" src="img\products\2.png" alt="Product Afbeelding"></div>
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

<script>
    document.getElementById('productImagePreview').onload = function () {
        new Cropper(this, {
            min_width: 220,
            min_height: 220
            //max_width: 50,
            //max_height: 50
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#productImagePreview').attr('src', e.target.result); // TODO: width/height shit aanpassen...
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>