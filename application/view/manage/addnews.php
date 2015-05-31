<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/settings#tab_news-items"; ?>" class="btn btn-default">Terug</a>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-offset-2 col-sm-10">
				<h1>Nieuws toevoegen</h1>
			</div>
			<form class="form-horizontal" id="newsForm" method="POST" action="<?php echo ROOT_PATH . "/manage/addnews" ?>">
				<!-- some hidden values -->
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-heading">Titel</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" form="newsForm" id="news-heading" name="heading" placeholder="Plaats hier uw titel..." required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-content">Tekst</label>
					<div class="col-sm-8">
						<textarea type="text" class="form-control" form="newsForm" id="news-content" name="content" placeholder="Schrijf hier uw paragraaf..." cols="10" rows="5" style="resize: vertical" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="news-expiration-date">Verloopdatum</label>
					<div class="col-sm-8">
						<input type="datetime-local" class="form-control" form="newsForm" id="news-expiration-date" name="expiration_date" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-2">
						<button type="submit" class="btn btn-default btn-block" id="submit" name="add">Opslaan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>