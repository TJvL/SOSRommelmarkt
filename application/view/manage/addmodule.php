<?php 
	switch ($_GET["id"])
	{
		case "home":
			$returnPath = "/manage/settings#tab_home-modules";
			break;
		case "aboutus":
			$returnPath = "/manage/settings#tab_aboutus-modules";
			break;
		case "news":
			$returnPath ="/manage/settings#tab_news-modules";
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
			<form class="form-horizontal" id="moduleForm" method="POST" action="<?php echo ROOT_PATH . "/manage/addmodule" ?>">
				<!-- some hidden values -->
				<input type="hidden" form="moduleForm" name="category" value="<?php echo $_GET["id"];?>">
				<input type="hidden" form="moduleForm" name="returnPath" value="<?php echo $returnPath; ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-heading">Titel</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" form="moduleForm" id="module-heading" name="heading" placeholder="Plaats hier uw titel..." required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-content">Tekst</label>
					<div class="col-sm-8">
						<textarea type="text" class="form-control" form="moduleForm" id="module-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5" style="resize: vertical" required></textarea>
					</div>
				</div>

				<?php //if ($_GET["id"] == "home") { ?>

				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-reference-label">Referentie Tekst</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" form="moduleForm" id="module-reference-label" name="reference_label" placeholder="Plaats hier de tekst voor de referentie..." required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-reference">Referentie</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" form="moduleForm" id="module-reference" name="reference" placeholder="Bijvoorbeeld: /home/index" aria-describedby="module-reference-help" required>
						<span id="module-reference-help" class="help-block">Hier kunt u aangeven waar de module naar toe linkt. Bijvoorbeeld <code>/home/index</code> of <code>/subvention/landing</code>.</span>
					</div>
				</div>

                <?php //} ?>

                <div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-default btn-block" id="submit" name="add">Opslaan</button>
					</div>
                    <!-- Preview Modal -->
                    <div class="col-sm-2 col-sm-2">
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
				</div>
			</form>
		</div>
	</div>
</div>