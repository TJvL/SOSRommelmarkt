<?php include("includes/markup/manageHeader.php"); ?>

<div class="container">
    <div class="white">
        <div class="content">

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form action="createproduct.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="product_add">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Product naam:</label>
                                <input form="product_add" name="name" type="text">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Product omschrijving:</label>
                                <textarea form="product_add" name="description" cols="10" rows="5"></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>

                        </section>

                        <!-- Step 2 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Prijs:</label>
                                <input form="product_add" name="price" type="text" placeholder="00,00">
                                <span class="error"></span>
                            </div>


                            <div class="field">
                                <label class="main">Kleur code:</label>
                                <select form="product_add" name="colorCode" id="">
                                    <option value="Blauw">Blauw</option>
                                    <option value="Groen">Groen</option>
                                    <option value="Geel">Geel</option>
                                    <option value="Rood">Rood</option>
                                </select>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>

                        </section>

                        <!-- Step 3 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <div id="cropSection">
                                    <img class="img-responsive" id="cropArea" alt="Crop area" />
                                </div>
                            </div>

                            <div class="field">
                                <label class="main">Picture:</label>
                                <input form="product_add" id="picture" name="picture" type="file" onchange="loadImage(this)">
                                <span class="error"></span>
                            </div>

                            <input form="product_add" id="xCoord" name="xCoord" type="hidden">
                            <input form="product_add" id="yCoord" name="yCoord" type="hidden">
                            <input form="product_add" id="width" name="width" type="hidden">
                            <input form="product_add" id="height" name="height" type="hidden">
                            <input form="product_add" id="clientWidth" name="clientWidth" type="hidden">
                            <input form="product_add" id="clientHeight" name="clientHeight" type="hidden">
                            <input form="product_add" id="originalWidth" name="originalWidth" type="hidden">
                            <input form="product_add" id="originalHeight" name="originalHeight" type="hidden">

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button form="product_add"  type="submit" class="submit">Opslaan</button>
                            </div>

                        </section>

                    </div>

                    <span id="invalid"></span>

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

<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.js" type="text/javascript"></script>

<script type="text/javascript">

    $('#product_add').idealforms({

        silentLoad: true,

        rules: {
            'name': 'required name',
            'description': 'required max:500',
            'price': 'required digits',
            'colorCode': 'select:Blauw',
            'picture': 'extension:jpg'
        },


        onSubmit: function(invalid,event) {
            if (invalid > 0) {
                event.preventDefault();
                $('#invalid').show().text(invalid +' ongeldige velden!');
            } else {
                $('#invalid').hide();
            }
        }
    });

    $('#product_add').find('input, select, textarea').on('change keyup', function() {
        $('#invalid').hide();
    });

    $('#product_add').idealforms('addRules', {
        'comments': 'required minmax:50:200'
    });

    $('.prev').click(function(){
        $('.prev').show();
        $('form.idealforms').idealforms('prevStep');
    });
    $('.next').click(function(){
        $('.next').show();
        $('form.idealforms').idealforms('nextStep');
    });

    var cropper;

    function loadImage(file){

        var reader = new FileReader();

        reader.onload = function(event) {
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

                    var clientWidth = document.getElementById("cropArea").clientWidth;
                    var clientHeight = document.getElementById("cropArea").clientHeight;

                    document.getElementById("clientWidth").setAttribute("value", clientWidth.toString());
                    document.getElementById("clientHeight").setAttribute("value", clientHeight.toString());

                    var originalWidth = document.getElementById("cropArea").naturalWidth;
                    var originalHeight = document.getElementById("cropArea").naturalHeight;

                    document.getElementById("originalWidth").setAttribute("value", originalWidth.toString());
                    document.getElementById("originalHeight").setAttribute("value", originalHeight.toString());

                    console.log("x: " + data.x, "y: " + data.y, "width: " + data.width, "height: " + data.height)
                }
            });

        };

        reader.readAsDataURL(file.files[0]);
    }

</script>