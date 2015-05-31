<div id ="footerContainer">
    <div id="footer-wrapper">
    <div id="footer" class="container">

         <?php
             //If logged in
             $placeholder = false; //!!!!Momenteel staat de header standaard op normaal. Zet deze boolean op true als je de manageheader nodig hebt. (later wordt dit met login afgehandeld)
             if(!$placeholder)
                 {
                  ?>
                   <div class="row">
            <div class="col-xs-6 col-sm-4">
                <h2>SOS</h2>
                <?php
                    for ($i = 0; $i < $footerVM->partners->size(); $i++) {
                        if ($footerVM->partners->get($i)->category === "SOS") { ?>
                            <a href="<?php echo $footerVM->partners->get($i)->website ?>" target="_blank"><img class="footer-partner-logo-image partner-image-fix padding-ver-sm" src="<?php echo $footerVM->partners->get($i)->getImagePath() ?>"></a>
                        <?php
                        }
                    }
                ?>
            </div>
            <div class="col-xs-6 col-sm-4">
                <h2>Dienstverleners</h2>
                <?php
                for ($i = 0; $i < $footerVM->partners->size(); $i++) {
                    if ($footerVM->partners->get($i)->category === "Dienstverleners") { ?>
                        <a href="<?php echo $footerVM->partners->get($i)->website ?>" target="_blank"><img class="footer-partner-logo-image partner-image-fix padding-ver-sm" src="<?php echo $footerVM->partners->get($i)->getImagePath() ?>"></a>
                    <?php
                    }
                }
                ?>
            </div>
            <div class="col-xs-6 col-sm-4">
                <h2>Projecten</h2>
                <?php
                for ($i = 0; $i < $footerVM->partners->size(); $i++) {
                    if ($footerVM->partners->get($i)->category === "Projecten") { ?>
                        <a href="<?php echo $footerVM->partners->get($i)->website ?>" target="_blank"><img class="footer-partner-logo-image partner-image-fix padding-ver-sm" src="<?php echo $footerVM->partners->get($i)->getImagePath() ?>"></a>
                    <?php
                    }
                }
                ?>
            </div>
                   </div>
                 <?php
                 }
            else
                 {?>
                    <div class="row">

                    </div>    
                  <?php
                }?>
            </div>
        </div>

<div id="copyright">
	<p>&copy; SOSrommelmarkt. Alle rechten voorbehouden. | Ontwerp en ontwikkeling door Avans(42IN07SOe 2015).</p>
</div>

</div>

</body>
</html>

