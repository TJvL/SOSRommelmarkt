<?php include("includes/markup/manage_header.php"); ?>

<div class="container">
    <div class="white">
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
                        <input id="imageInput" type="file" class="form-control" required="required" name="productImage" onchange="renderImage(this)">
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
                </div>
                <div class="row">
                    <div class="col-sm-12 padding-sm">
                        <canvas id="imagePreview"></canvas>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function renderImage(file){

        console.log(file.files);

        var reader = new FileReader();

        reader.onload = function(event) {
            the_url = event.target.result;
            var canvas = document.getElementById("imagePreview");
            var context = canvas.getContext("2d");
            var image = new Image();
            image.src = the_url;

            context.drawImage(image, 0, 0);
        };

        reader.readAsDataURL(file.files[0]);
    }
</script>