<?php include("includes/markup/manage_header.php"); ?>

<link href="/SOSRommelmarkt/includes/css/contactformulier_normalize.css" rel="stylesheet">
<link href="/SOSRommelmarkt/includes/css/contactformulier_jq_form.css" rel="stylesheet">
<link href="/SOSRommelmarkt/includes/css/contactformulier.css" rel="stylesheet">

<div class="container">
    <div class="white">
        <div class="content">
            <div class="idealsteps-container">
                <nav class="idealssteps-nav"></nav>

                <form class="idealforms" action="insertproduct.php" method="post" enctype="multipart/form-data">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Product naam</label>
                                <input name="productName" type="text" placeholder="Product naam">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Product omschrijving</label>
                                <input name="" type="text" placeholder="Product omschrijving">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Kleur code:</label>
                                <p class="group">
                                    <label><input name="productColorCode" type="radio" value="rood">Rood</label>
                                    <label><input name="productColorCode" type="radio" value="groen">Groen</label>
                                    <label><input name="productColorCode" type="radio" value="geel">Geel</label>
                                </p>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>

                        </section>

                        <!-- Step 2 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Foto:</label>
                                <input id="imageInput" name="productImage" type="file" onchange="loadImage(this)">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <div id="cropSection">
                                    <img class="img-responsive" id="cropArea" alt="Crop area" />
                                </div>
                            </div>
                            <input id="xCoord" type="hidden">
                            <input id="yCoord" type="hidden">
                            <input id="width" type="hidden">
                            <input id="height" type="hidden">

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="submit" class="submit">Opslaan</button>
                            </div>

                        </section>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    #cropArea{
        width:50%;
        height:50%;
    }
    .cropper #cropArea{
        width:100%;
        height:100%;
    }
</style>
<script type="text/javascript">
    var cropper;

    function loadImage(file){

        var reader = new FileReader();

        reader.onload = function(event) {
            cropper = null;
            the_url = event.target.result;
            document.getElementById("cropSection").innerHTML = "<img class='img-responsive' id='cropArea' alt='Crop area' />";
            document.getElementById("cropArea").setAttribute("src", the_url);

            cropper = new Cropper(document.getElementById("cropArea"),{
                ratio:{
                    width:1,
                    height:1
                },
                update:function(data){
                    document.getElementById("xCoord").setAttribute("value", data.x);
                    document.getElementById("yCoord").setAttribute("value", data.y);
                    document.getElementById("width").setAttribute("value", data.width);
                    document.getElementById("height").setAttribute("value", data.height);

                    console.log(document.getElementById("xCoord"),document.getElementById("yCoord"));

                }
            });

        };

        reader.readAsDataURL(file.files[0]);
    }
</script>

<script src="/SOSRommelmarkt/includes/js/contactformulier.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/includes/js/contactformulier_submit.js" type="text/javascript"></script>