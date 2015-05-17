<div class="container">
	<?php
	// Get all modules that belong to about us
	$modules = Module::SelectByCategory("aboutus");

	for ($i = 0; $i < count($modules); $i++) {

	?>
	<div class="row">
		<div class="col-md-12">
			<div class="white">
				<h2><?php echo $modules[$i]->heading; ?></h2>
				<p class="equal-height"><?php echo $modules[$i]->content; ?></p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>