<?php Type::check("News", $model); ?>

<div class="container">
	<div class="white">
		<div class="content">
			<div class="row">
				<div class="col-md-1">
					<a href="<?php echo ROOT_PATH . "/manage/settings#tab_news-items" ?>" class="btn btn-default">Terug</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="idealsteps-container">
						<!-- <nav class="idealsteps-nav"></nav> -->
						<div class="col-sm-offset-2 col-sm-10">
							<h1>Nieuws bewerken</h1>
						</div>
						<form action="javascript:handleUpdateNews()" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="news_update">
							<div class="idealsteps-wrap">
								<!-- step 1 -->
								<section class="idealsteps-step">
									<div class="field">
										<label class="main">ID:</label>
										<input form="news_update" id="news-id" name="id" type="text" value="<?php echo $model->id; ?>" disabled>
										<span class="error"></span>
									</div>
									<div class="field">
										<label class="main">Titel:</label>
										<input form="news_update" id="news-heading" name="heading" type="text" placeholder="Plaats hier uw titel..." value="<?php echo $model->heading; ?>">
										<span class="error"></span>
									</div>
									<div class="field">
										<label class="main">Tekst:</label>
										<textarea form="news_update" id="news-content" name="content" cols="10" rows="5" style="resize: vertical" placeholder="Schrijf hier uw paragraaf..."><?php echo $model->content; ?></textarea>
										<span class="error"></span>
									</div>
									<div class="field">
										<label class="main">Aanmaakdatum:</label>
										<input form="news_update" id="news-create-date" name="create_date" type="text" class="datepicker" placeholder="dd-mm-yyyy" value="<?php echo date("m/d/Y", strtotime($model->create_date)); ?>" disabled>
										<span class="error"></span>
									</div>
									<div class="field">
										<label class="main">Verloopdatum:</label>
										<input form="news_update" id="news-expiration-date" name="expiration_date" type="text" class="datepicker" placeholder="dd-mm-yyyy" value="<?php echo date("m/d/Y", strtotime($model->expiration_date)); ?>">
										<span class="error"></span>
									</div>
									<div class="field buttons">
										<label class="main">&nbsp;</label>
										<button form="news_update" type="submit" class="submit">Opslaan</button>
										<button form="news_update" type="button" class="submit" onClick="handleDeleteNews()">Verwijderen</button>
									</div>
								</section>
							</div>
							
							<span id="invalid"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
