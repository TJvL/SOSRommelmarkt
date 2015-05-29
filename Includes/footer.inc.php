<div id ="footerContainer">

<div id="footer-wrapper">
    <div id="footer" class="container">
    	<div class="row">
            <div class="title">
                <h2>Partners</h2>
            </div>
    	</div>
    	<div class="row footer-partners col-sm-offset-1">
			<?php foreach($footerVM->partners as $partner)
			{
				?>
				<div class=" col-sm-1 padding-md">
					<a href="<?php echo $partner->website ?>" target="_blank"><img class="footer-partner-logo-image img-responsive" src="<?php echo $partner->getImagePath() ?>"></a>
				</div>
				<?php
			}
			?>
    	</div>
    </div>
</div>

<div id="copyright">
	<p>&copy; SOSrommelmarkt. Alle rechten voorbehouden. | Ontwerp en ontwikkeling door Avans(42IN07SOe 2015).</p>
</div>

</div>

</body>
</html>

