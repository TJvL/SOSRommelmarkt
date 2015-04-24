<?php 
	$partnerArray = new ArrayList("Partner");
	$partnerArray->addAll(Partner::selectAll());
?>

<div id ="footerContainer">

<div id="footer-wrapper">
    <div id="footer" class="container">
        <div class="col-sm-3 col-md-4">
            <div class="title">
				<h2>Contact</h2>
			</div>
        </div>
        <div class="col-sm-3 col-md-8">
            <div class="title">
                <h2>Partners</h2>
            </div>
        </div>
        <div class="col-sm-3 col-md-4">
            <ul class="style1">
                <li>
                    Ridderspoorstraat 2</br>
                    5212 XP 's-Hertogenbosch </br>
                    tel: 073 613 3774 </br>
                    email: info@sosrommelmarkt.nl
                </li>
            </ul>
        </div>
        <div class="col-sm-3 col-md-4">
            <ul class="style1">
            	<?php for ($i = 0; $i < ceil($partnerArray->size()/2); $i++) { ?>
            	<li><a href="<?php echo $partnerArray->get($i)->website ?>"><?php echo $partnerArray->get($i)->name ?></a></li>
				<?php } ?>
            </ul>
        </div>
        <div class="col-sm-3 col-md-4">
            <ul class="style1">
                <?php for ($i = ceil($partnerArray->size()/2); $i < $partnerArray->size(); $i++) { ?>
            	<li><a href="<?php echo $partnerArray->get($i)->website ?>"><?php echo $partnerArray->get($i)->name ?></a></li>
            	<?php } ?>
                
            </ul>
        </div>
    </div>
</div>

<div id="copyright">
	<p>&copy; SOSrommelmarkt. All rights reserved. | Design by 42IN07SOe</a>.</p>
</div>

</div>

</body>
</html>

