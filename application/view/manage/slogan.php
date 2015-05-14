<?php Type::check("Slogan", $model) ?>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/settings#tab_slogans" ?>" class="btn btn-default">Terug</a>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Slogan</h1>
			</div>
			
			<form class="form-horizontal" action="javascript:handleUpdateSlogan()">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="slogan-id">ID</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" id="slogan-id" value="<?php echo $model->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="slogan-text">Slogan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="slogan-text" placeholder="Schrijf hier uw pakkende slogan..." value="<?php echo $model->slogan ?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-default btn-block" >Opslaan</button>
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-danger btn-block" onClick="handleDeleteSlogan()">Verwijderen</button>
					</div>
					<div class="col-sm-4">
						<div class="alert" id="status" role="alert"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
