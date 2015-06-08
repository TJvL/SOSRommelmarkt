<?php 
	switch ($_GET["id"])
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

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . $returnPath ?>" class="btn btn-default">Terug</a>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Module toevoegen</h1>
			</div>
			<form class="idealforms" form="moduleForm" id="moduleForm" action="javascript:addModule()">
				<!-- some hidden values -->
				<input type="hidden" form="moduleForm" name="category" id="module-category" value="<?php echo $_GET["id"];?>">
                <?php if ($_GET["id"] != "home") { ?>
                    <input type="hidden" form="moduleForm" id="module-reference" name="reference" value="">
                    <input type="hidden" form="moduleForm" id="module-reference-label" name="reference_label" value="">
                <?php } ?>

				<div class="field">
					<label class="main" for="module-heading">Titel</label>
					<input type="text" form="moduleForm" id="module-heading" name="heading" placeholder="Plaats hier uw titel...">
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="module-content">Tekst</label>
					<textarea type="text" form="moduleForm" id="module-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5" class="nonresizeable"></textarea>
                    <span class="error"></span>
				</div>
                <?php if ($_GET["id"] == "home") { ?>
				<div class="field">
					<label class="main" for="module-reference-label">Referentie Tekst</label>
					<input type="text" form="moduleForm" id="module-reference-label" name="reference_label" placeholder="Plaats hier de tekst voor de referentie...">
					<span class="error"></span>
				</div>
				<div class="field">
					<label class="main" for="module-reference">Referentie</label>
					<input type="text" form="moduleForm" id="module-reference" name="reference" placeholder="Bijvoorbeeld: /home/index" aria-describedby="module-reference-help">
					<label id="module-reference-help" class="help-block"> Hier kunt u aangeven waar de module naar toe linkt.</label>
					<span class="error"></span>
				</div>
                <?php } ?>

                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                        <button form="moduleForm" type="submit" class="submit">Opslaan</button>

                    <?php if ($_GET["id"] == "home") { ?>
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