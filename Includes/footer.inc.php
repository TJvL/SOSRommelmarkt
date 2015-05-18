<?php 
	$partnerArray = new ArrayList("Partner");
	$partnerArray->addAll(PartnerRepository::selectAll());
?>

<div id ="footerContainer">

<div id="footer-wrapper">
    <div id="footer" class="container">
    	<div class="row">
            <div class="title">
                <h2>Partners</h2>
            </div>
    	</div>
    	<div class="row footer-partners">
			<?php for ($i = 0; $i < $partnerArray->size(); $i++)
			{
				?>
				<div class=" col-sm-1 padding-md">
					<a href="<?php echo $partnerArray->get($i)->website ?>" target="_blank"><img class="footer-partner-logo-image img-responsive" src="<?php echo $partnerArray->get($i)->getImagePath() ?>"></a>
				</div>
				<?php
			}
			?>
    	</div>
    </div>
</div>

<div id="copyright">
	<p>&copy; SOSrommelmarkt. Alle rechten voorbehouden. | Ontwerp en ontwikkeling door 42IN07SOe.</p>
</div>

</div>

</body>
</html>

