<div class="container">
    <div class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_DIR . '/manage/productList'?>" class="btn btn-default">Back</a>
                </div>
            </div>

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form action="../../createproduct.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="product_add">

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
                                <textarea form="product_add" name="description" cols="10" rows="5" style="resize: none"></textarea>
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
                                    <option value="default">&ndash; Selecteer een optie &ndash;</option>
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

<script type="text/javascript">
    //Initialize ideal forms
    $('#product_add').idealforms({

        // Do not select the first input field and show error message.
        silentLoad: true,

        //Add rules for the input fields
        rules: {
            'name': 'required name',
            'description': 'required minmax:20:500',
            'price': 'required price',
            'colorCode': 'select:default',
            'picture': 'extension:jpg'
        },


        //When submit is pressed catch the event.
        onSubmit: function(invalid,event) {

            // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
            if (invalid > 0) {
                event.preventDefault();
                $('#invalid').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
            } else {
                $('#invalid').hide();
            }
        }
    });

    //Checks input fields and show message on bottom after every user input.
    $('#product_add').find('input, select, textarea').on('change keyup', function() {
        $('#invalid').hide();
    });

    //Prompts idealforms to show the next step in the form.
    $('.prev').click(function(){
        $('.prev').show();
        $('form.idealforms').idealforms('prevStep');
    });
    //Prompts idealforms to show the previous step in the form.
    $('.next').click(function(){
        $('.next').show();
        $('form.idealforms').idealforms('nextStep');
    });

    //Create something to hold the cropper object.
    var cropper;


    //When the file input field is loaded with a file call this function.
    function loadImage(file){

        //Init a filereader.
        var reader = new FileReader();

        //When the file reader loads the file from the file input element.
        reader.onload = function(event) {
            //Get the path to the file.
            the_url = event.target.result;

            //Change the crop area div so the picture in the created file path can be loaded for viewing.
            document.getElementById("cropSection").innerHTML = "<img class='img-responsive' id='cropArea' alt='Crop area' />";
            document.getElementById("cropArea").setAttribute("src", the_url);

            //Init a new cropper object for this image.
            cropper = new Cropper(document.getElementById("cropArea"),{

                //Define aspect ratio for the crop box
                ratio:{
                    width:1,
                    height:1
                },

                //When the crop box is moved/resized the update event is called inside the cropper.
                //An extra function is attached to the update function that adds crop box coordinates and img resolution info to a form hidden field.
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

                    //Debug console log.
                    //console.log("x: " + data.x, "y: " + data.y, "width: " + data.width, "height: " + data.height)
                }
            });

        };

        //This causes the filereader to be load and it reads the currently selected file from the html input element.
        reader.readAsDataURL(file.files[0]);
    }
</script>