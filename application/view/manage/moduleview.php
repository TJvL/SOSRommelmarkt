<?php
Type::check("Module", $model);

switch ($model->category)
{
    case "home":
        $returnPath = "/manage/pagecontentmanage#tab_home-modules";
        break;
    case "aboutus":
        $returnPath = "/manage/pagecontentmanage#tab_aboutus-modules";
        break;
    case "project-info":
    	$returnPath = "/manage/pagecontentmanage#tab_project-description";
    	break;
    default:
        $returnPath = "/manage";
}
?>


<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . $returnPath ?>" class="btn btn-default">Terug</a>
            </div>
            <?php if ($model->category != "project-info") { ?>
            <div class="col-sm-offset-9 col-sm-2">
                <button type="button" class="btn btn-danger btn-block" onClick="handleDeleteModule()">Verwijderen</button>
            </div>
            <?php } ?>
        </div>
        <div class="row">

            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Module bewerken</h1>
            </div>
        </div>

<div id="sample">



            <form class="idealforms" form="moduleForm" id="moduleForm" action="javascript:handleUpdateModule()">
                <!-- some hidden values -->
                <input type="hidden" id="module-category" name="category" value="<?php echo $model->category;?>">
                <input type="hidden" form="moduleForm" id="module-id" value="<?php echo $model->id ?>">
                
                <?php if ($model->category == "project-info") { ?>
                	<input type="hidden" form="moduleForm" id="module-reference" name="heading" value="<?php echo $model->heading; ?>">
                <?php } ?>

                <?php if ($model->category != "home") { ?>
                    <input type="hidden" form="moduleForm" id="module-reference" name="reference" value="<?php echo $model->reference; ?>">
                    <input type="hidden" form="moduleForm" id="module-reference-label" name="reference_label" value="<?php echo $model->reference_label; ?>">
                <?php } ?>
                
                <?php if ($model->category != "project-info") { ?>
                <div class="field">
                    <label class="main" for="module-heading">Titel</label>
                    <input type="text" form="moduleForm" id="module-heading" name="heading" placeholder="Plaats hier uw titel..." value="<?php echo $model->heading; ?>">
                    <span class="error"></span>
                </div>
                <?php } ?>
                
                <div class="field">
                    <label class="main" for="module-content">Tekst</label>

                    <textarea type="text" form="moduleForm" id="module-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="20" rows="5"><?php echo $model->content; ?></textarea>

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