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
    	<div class="row">
			<?php for ($i = 0; $i < $partnerArray->size(); $i++)
			{
				?>
				<div class="col-sm-2">
					<a href="<?php echo $partnerArray->get($i)->website ?>"><img class="footer-partner-logo-image" src="<?php echo $partnerArray->get($i)->getImagePath() ?>"></a>
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

