<?php
	Type::check("Module", $model);
	
	switch ($model->category)
	{
		case "home":
			$returnPath = "/manage/settings#tab_home-modules";
			break;
		case "aboutus":
			$returnPath = "/manage/settings#tab_aboutus-modules";
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
				<h1>Module bewerken</h1>
			</div>
			
			<form class="form-horizontal" action="javascript:handleUpdateModule()">
				<!-- some hidden values -->
				<input type="hidden" id="module-category" name="category" value="<?php echo $_GET["id"];?>">
				<input type="hidden" id="return-path" name="returnPath" value="<?php echo $returnPath; ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-id">ID</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" id="module-id" value="<?php echo $model->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-heading">Titel</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="module-heading" name="heading" placeholder="Plaats hier uw titel..." value="<?php echo $model->heading; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-content">Tekst</label>
					<div class="col-sm-8">
						<textarea type="text" class="form-control" id="module-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5" style="resize: vertical" required><?php echo $model->content; ?></textarea>
					</div>
				</div>
				<?php if ($model->category == "home") { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-reference-label">Referentie Tekst</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="module-reference-label" name="reference_label" placeholder="Plaats hier de tekst voor de referentie..." value="<?php echo $model->reference_label; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="module-reference">Referentie</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="module-reference" name="reference" placeholder="Bijvoorbeeld: /home/index" value="<?php echo $model->reference; ?>" aria-describedby="module-reference-help" required>
						<span id="module-reference-help" class="help-block">Hier kunt u aangeven waar de module naar toe linkt. Bijvoorbeeld <code>/home/index</code> of <code>/subvention/landing</code>.</span>
					</div>
				</div>
				<?php } ?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-default btn-block" >Opslaan</button>
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-danger btn-block" onClick="handleDeleteModule()">Verwijderen</button>
					</div>
					<div class="col-sm-4">
						<div class="alert" id="status" role="alert"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
