<div class="container">
	<div class="white">
		<h1> Pagina's Bewerken </h1>
		<div class="row">
			<div class="col-md-4">

				<p>Page list</p>

				   <?php 
	// contactinfo ophalen
	$pages = Pages::selectCurrent();
	 ?>


			</div>
			<div class="col-md-8">
				<p> Page Form </p>	

			</div>
		</div>
	</div>
</div>
