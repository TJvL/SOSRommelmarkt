<?php
Type::check("Module", $model);

switch ($model->category)
{
    case "home":
        $returnPath = "/manage/pagecontentoverview#tab_home-modules";
        break;
    case "aboutus":
        $returnPath = "/manage/pagecontentoverview#tab_aboutus-modules";
        break;
    default:
        $returnPath = "/manage";
}
?>

 <script type="text/javascript" src="<?php echo ROOT_PATH;?>/js/manage/tinymce/tinymce.min.js"> </script>


<script>
// tinymce.init({
//     selector: "textarea#elm1",
//     theme: "modern",
//     width: 600,
//     height: 300,
//     plugins: [
//          // "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
//          // "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//          // "save table contextmenu directionality emoticons template paste textcolor"
//    ],
//    // content_css: "css/content.css",
//    toolbar: " styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor emoticons", 
//    style_formats: [
//         {title: 'Bold text', inline: 'b'},
//         {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
//         {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
//         {title: 'Example 1', inline: 'span', classes: 'example1'},
//         {title: 'Example 2', inline: 'span', classes: 'example2'},
//         {title: 'Table styles'},
//         {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
//     ]
//  }); 

</script>


<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . $returnPath ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-sm-offset-9 col-sm-2">
                <button type="button" class="btn btn-danger btn-block" onClick="handleDeleteModule()">Verwijderen</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Module bewerken</h1>
            </div>

            <form class="idealforms" form="moduleForm" id="moduleForm" action="javascript:handleUpdateModule()">
                <!-- some hidden values -->
                <input type="hidden" id="module-category" name="category" value="<?php echo $model->category;?>">
                <input type="hidden" form="moduleForm" id="module-id" value="<?php echo $model->id ?>">

                <?php if ($model->category != "home") { ?>
                    <input type="hidden" form="moduleForm" id="module-reference" name="reference" value="<?php echo $model->reference; ?>">
                    <input type="hidden" form="moduleForm" id="module-reference-label" name="reference_label" value="<?php echo $model->reference_label; ?>">
                <?php } ?>
                <div class="field">
                    <label class="main" for="module-heading">Titel</label>
                    <input type="text" form="moduleForm" id="module-heading" name="heading" placeholder="Plaats hier uw titel..." value="<?php echo $model->heading; ?>">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="module-content">Tekst</label>
<<<<<<< Updated upstream
                    <textarea type="text" form="moduleForm" id="module-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5"><?php echo $model->content; ?></textarea>
=======
                    <textarea type="text" form="moduleForm" id="elm1" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5" class="nonresizeable"><?php echo $model->content; ?></textarea>
>>>>>>> Stashed changes
                    <span class="error"></span>
                </div>
                <?php if ($model->category == "home") { ?>
                    <div class="field">
                        <label class="main" for="module-reference-label">Referentie Tekst</label>
                        <input type="text" form="moduleForm" id="module-reference-label" name="reference_label" placeholder="Plaats hier de tekst voor de referentie..." value="<?php echo $model->reference_label; ?>">
                        <span class="error"></span>
                    </div>
                    <div class="field">
                        <label class="main" for="module-reference">Referentie</label>
                        <input type="text" form="moduleForm" id="module-reference" name="reference" placeholder="Bijvoorbeeld: /shop/index" value="<?php echo $model->reference; ?>" aria-describedby="module-reference-help">
                        <span id="module-reference-help" class="help-block"> Hier kunt u aangeven waar de module naar toe linkt.</span>
                        <span class="error"></span>
                    </div>
                <?php } ?>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="moduleForm" type="submit" class="submit">Opslaan</button>

                    <?php if ($model->category == "home") { ?>
                    <!-- Preview Modal -->
                    <div class="col-sm-2">
                        <a href="#" data-toggle="modal" data-target=".bs-preview-modal-lg"><button id="js-handler-preview" class="btn btn-default btn-block">Voorbeeld</button></a>
                        <div class="modal fade bs-preview-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Preview -->
                                    <h3 class="modal-title">Voorbeeld</h3>
                                    <p>Dit is hoe de pagina er straks uitziet:</p>
                                    <div id="preview-div">
                                        <!-- jquery executes here -->
                                    </div>
                                    <!-- Preview EOF -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Preview Modal EOF -->
                    <?php } ?>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
    </div>
</div>