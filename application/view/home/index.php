<div class="container">
	<div class="grey">
		<div class="row">
			<div class= "col-md-3">
				<img class="img-responsive" src="<?php echo ROOT_PATH;?>/img/content/headerdiv.png">
			</div>
			<div class="col-md-9">
				<div id="slogan-carousel" class="carousel text-carousel slide" data-ride="carousel">
            		<div class="carousel-inner" role="listbox">
            			<?php
                        $i = 0;
                        foreach ($model->slogans as $slogan)
                        {
                            ?>
            			<div class="item <?php if ($i == 0) echo 'active' ?>">
            				<div class="carousel-content">
            					<p><?php echo $slogan->slogan ?></p>
            				</div>
            			</div>
            			<?php
                            $i++;
                        }
                        ?>
            		</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row padding-lg">
        <?php
        //if there's 2 or less products, just give all of them
        if($model->auctionProducts->size() <= 2)
        {
            foreach($model->auctionProducts as $auctionProduct)
            {
                ?>
                <div class="col-md-3 padding-hor-md equal-height">
                    <div class="white margin-ver-lg">
                        <p><b>In de vitrine:</b></p>
                        <a href="<?php echo ROOT_PATH; ?>/auction/index">
                            <img class="img-responsive" src="<?php echo $auctionProduct->imagePath ?>">
                        </a>
                        <h2><?php echo $auctionProduct->name ?></h2>
                        <p><?php echo $auctionProduct->description ?></p>
                    </div>
                </div>
                <?php
            }
            for($i = 2; $i > $model->auctionProducts->size(); $i--) //fill up until 2 spaces are filled.
            {
                ?>
                <div class="col-md-3 padding-hor-md equal-height"></div>
                <?php
            }
        }
        else
        {
            //mt_rand is inclusive
            $rands = array();
            $rands[] = mt_rand(1, $model->auctionProducts->size()-1); //anything except lowest number
            $rands[] = mt_rand(0, $rands[0] - 1); //atleast one below first random

            foreach($rands as $val)
            {
                $auctionProduct = $model->auctionProducts->get($val);
                ?>
                <div class="col-md-3 padding-hor-md equal-height">
                    <div class="white margin-ver-lg">
                        <p><b>In de vitrine:</b></p>
                        <a href="<?php echo ROOT_PATH; ?>/auction/index">
                            <img class="img-responsive" src="<?php echo $auctionProduct->imagePath ?>">
                        </a>
                        <h2><?php echo $auctionProduct->name ?></h2>
                        <p><?php echo $auctionProduct->description ?></p>
                    </div>
                </div>
                <?php
            }
        }

        ?>

        <div class="col-md-3 padding-hor-md equal-height">
        	<div class="white margin-ver-lg">
        		<h2>Nieuws</h2>
        		<div class="list-group">
        		<?php foreach ($model->newsItems as $news) { ?>
        			<a href="<?php echo ROOT_PATH; ?>/home/news" class="list-group-item">
        			<?php echo $news->heading; ?>
        			<i class="pull-right fa fa-arrow-right"></i>
        			</a>
        		<?php } ?>
        		</div>
        	</div>
        </div>
        
		<div class="col-md-3 padding-hor-md equal-height">
			<div class="white margin-ver-lg">
			
			<?php 
				// contactinfo ophalen
				$visitingHours = $model->visitingHours;
			?>
			
				<h2>Openingstijden</h2>
				<table class="table table-condensed table-responsive">
					<tr><td>Maandag</td><td> <?php echo $visitingHours->monday; ?></td></tr>
					<tr><td>Dinsdag</td><td> <?php echo $visitingHours->tuesday; ?></td></tr>
					<tr><td>Woensdag</td><td> <?php echo $visitingHours->wednesday; ?></td></tr>
					<tr><td>Donderdag</td><td> <?php echo $visitingHours->thursday; ?></td></tr>
					<tr><td>Vrijdag</td><td> <?php echo $visitingHours->friday; ?></td></tr>
					<tr><td>Zaterdag</td><td> <?php echo $visitingHours->saturday; ?></td></tr>
					<tr><td>Zondag</td><td> <?php echo $visitingHours->sunday; ?></td></tr>
				</table>
			</div>
		</div>
	</div>

	<!-- Start modules -->
	<?php
		// Get all modules that belong to the homepage
		$modules = $model->modules;
		
		// Display all of them
		for ($i = 0; $i < count($modules); $i++)
		{
			// The modules are put in rows of 2, so every even index is the start of a new row.
			if ($i % 2 == 0)
			{
	?>
	<div class="row padding-ver-lg <?php if ($i == count($modules) - 1 || $i == count($modules) - 2) echo "margin-btm-lg"; ?>">
	<?php if ($i == count($modules) - 1) { ?>
		<div class="col-md-12">
		<?php }	else { ?>
		<div class="col-md-6">
		<?php }} else { ?>
		<div class="col-md-6">
		<?php }	?>
			<div class="white margin-ver-lg ">
				<h2><?php echo $modules[$i]->heading; ?></h2>
				<p class="equal-height"><?php echo $modules[$i]->content; ?></p>
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-red btn-lg btn-block" href="<?php echo ROOT_PATH . '/' . $modules[$i]->reference; ?>"><?php echo $modules[$i]->reference_label; ?> <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<?php if ($i % 2 != 0 || $i == count($modules) - 1)	{ ?>
	</div>
	<?php }} ?>
	<!-- End modules -->
</div>
