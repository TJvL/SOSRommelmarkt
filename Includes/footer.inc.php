<?php 
	$partnerArray = new ArrayList("Partner");
	$partnerArray->addAll(Partner::selectAll());
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
	        <div class="col-sm-4 col-md-6">
	            <ul class="style1">
	            	<?php for ($i = 0; $i < ceil($partnerArray->size()/2); $i++) { ?>
	            	<li><a href="<?php echo $partnerArray->get($i)->website ?>"><?php echo $partnerArray->get($i)->name ?></a></li>
					<?php } ?>
	            </ul>
	        </div>
	        <div class="col-sm-4 col-md-6">
	            <ul class="style1">
	                <?php for ($i = ceil($partnerArray->size()/2); $i < $partnerArray->size(); $i++) { ?>
	            	<li><a href="<?php echo $partnerArray->get($i)->website ?>"><?php echo $partnerArray->get($i)->name ?></a></li>
	            	<?php } ?>
	                
	            </ul>
	        </div>
    	</div>
    </div>
</div>

<div id="copyright">
	<p>&copy; SOSrommelmarkt. All rights reserved. | Design by 42IN07SOe.</p>
</div>

</div>

</body>
</html>

