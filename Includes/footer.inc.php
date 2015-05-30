<?php 
	$partnerArray = new ArrayList("Partner");
	$partnerArray->addAll(PartnerRepository::selectAll());
?>

<div id ="footerContainer">

<div id="footer-wrapper">
    <div id="footer" class="container">
    	<div class="row footer-partners col-sm-offset-1">
            <div class="col-md-4">
                <h2>Partners</h2>
                <?php for ($i = 0; $i < $partnerArray->size(); $i++)
                {
                    ?>

                        <a href="<?php echo $partnerArray->get($i)->website ?>" target="_blank"><img class="footer-partner-logo-image img-responsive" src="<?php echo $partnerArray->get($i)->getImagePath() ?>"></a>

                <?php
                }
                ?>
            </div>
			<div class="col-md-4">
				<h2>Partners</h2>
                partner 1
                partner 2
                partner 3
                partner 4
                partner 5
			</div>
            <div class="col-md-4">
                <h2>Partners</h2>
                partner 1
                partner 2
                partner 3
                partner 4
                partner 5
            </div>
    	</div>
    </div>
</div>

<div id="copyright">
	<p>&copy; SOSrommelmarkt. Alle rechten voorbehouden. | Ontwerp en ontwikkeling door 42IN07SOe.</p>
</div>

</div>

</body>
</html>

