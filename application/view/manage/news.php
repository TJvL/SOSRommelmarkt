<?php Type::check("News", $model); ?>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/settings#tab_news-items" ?>" class="btn btn-default">Terug</a>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Nieuws bewerken</h1>
			</div>
			
			<form class="form-horizontal" action="javascript:handleUpdateNews()">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-id">ID</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" id="news-id" name="id" value="<?php echo $model->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-heading">Titel</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="news-heading" name="heading" placeholder="Plaats hier uw titel..." value="<?php echo $model->heading; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-content">Tekst</label>
					<div class="col-sm-8">
						<textarea type="text" class="form-control" id="news-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5" style="resize: vertical" required><?php echo $model->content; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-create-date">Aanmaakdatum</label>
					<div class="col-sm-8">
						<input type="datetime-local" class="form-control" id="news-create-date" name="create_date" placeholder="" value="<?php echo date("Y-m-d\TH:i", strtotime($model->create_date)); ?>" required readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-expiration-date">Verloopdatum</label>
					<div class="col-sm-8">
						<input type="datetime-local" class="form-control" id="news-expiration-date" name="expiration_date" placeholder="" value="<?php echo date("Y-m-d\TH:i", strtotime($model->expiration_date)); ?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-default btn-block" >Opslaan</button>
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-danger btn-block" onClick="handleDeleteNews()">Verwijderen</button>
					</div>
					<div class="col-sm-4">
						<div class="alert" id="status" role="alert"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
