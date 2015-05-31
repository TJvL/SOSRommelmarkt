<div class="container">
	<div class="white">
		<div class="content">
			<div class="row">
				<div class="col-md-1">
					<a href="<?php echo ROOT_PATH . "/manage/settings#tab_news-items"; ?>" class="btn btn-default">Terug</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="idealsteps-container">
						<!-- <nav class="idealsteps-nav"></nav> -->
						<div class="col-sm-offset-2 col-sm-10">
							<h1>Nieuws toevoegen</h1>
						</div>
						<form action="<?php echo ROOT_PATH . '/manage/addnews'; ?>" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="news_add">
							<div class="idealsteps-wrap">
								<!-- step 1 -->
								<section class="idealsteps-step">
									<div class="field">
										<label class="main">Titel:</label>
										<input form="news_add" name="heading" type="text" placeholder="Plaats hier uw titel...">
										<span class="error"></span>
									</div>
									<div class="field">
										<label class="main">Tekst:</label>
										<textarea form="news_add" name="content" cols="10" rows="5" style="resize: vertical" placeholder="Schrijf hier uw paragraaf..."></textarea>
										<span class="error"></span>
									</div>
									<div class="field">
										<label class="main">Verloopdatum:</label>
										<input form="news_add" name="expiration_date" type="text" class="datepicker" placeholder="dd-mm-yyyy">
										<span class="error"></span>
									</div>
									<div class="field buttons">
										<label class="main">&nbsp;</label>
										<button form="news_add" type="submit" class="submit">Opslaan</button>
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
