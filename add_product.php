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
                        <input id="imageInput" type="file" class="form-control" required="required" name="productImage" onchange="loadImage(this)">
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
                    <div class="col-sm-9 padding-sm">
                        <img src="" class="img-responsive" id="target" alt="Crop area" />
                    </div>
                    <div class="col-sm-3 padding-sm">
                        <img src="" class="img-responsive" class="jcrop-preview" alt="Preview" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    jQuery(function($){

        // Create variables (in this scope) to hold the API and image size
        var jcrop_api,
            boundx,
            boundy,

        // Grab some information about the preview pane
            $preview = $('#preview-pane'),
            $pcnt = $('#preview-pane .preview-container'),
            $pimg = $('#preview-pane .preview-container img'),

            xsize = $pcnt.width(),
            ysize = $pcnt.height();

        console.log('init',[xsize,ysize]);
        $('#target').Jcrop({
            onChange: updatePreview,
            onSelect: updatePreview,
            aspectRatio: xsize / ysize
        },function(){
            // Use the API to get the real image size
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
            // Store the API in the jcrop_api variable
            jcrop_api = this;

            // Move the preview into the jcrop container for css positioning
            $preview.appendTo(jcrop_api.ui.holder);
        });

        function updatePreview(c)
        {
            if (parseInt(c.w) > 0)
            {
                var rx = xsize / c.w;
                var ry = ysize / c.h;

                $pimg.css({
                    width: Math.round(rx * boundx) + 'px',
                    height: Math.round(ry * boundy) + 'px',
                    marginLeft: '-' + Math.round(rx * c.x) + 'px',
                    marginTop: '-' + Math.round(ry * c.y) + 'px'
                });
            }
        };

    });

    function loadImage(file){

        console.log(file.files);

        var reader = new FileReader();

        reader.onload = function(event) {
            the_url = event.target.result;
            document.getElementById("target").setAttribute("src", the_url);
        };

        reader.readAsDataURL(file.files[0]);
    }
</script>