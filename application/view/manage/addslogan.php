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
				<h1>Slogan toevoegen</h1>
			</div>
			<form class="form-horizontal" id="sloganForm" method="POST" action="<?php echo ROOT_PATH . "/manage/addslogan" ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="slogan-text">Slogan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" form="sloganForm" id="slogan-text" name="slogan" placeholder="Schrijf hier uw pakkende slogan..." required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-danger btn-block" id="submit" name="add">Opslaan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>