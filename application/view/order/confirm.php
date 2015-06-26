<?php
	$products = $model->newOrder->orderProducts;
	$shipAd = $model->newOrder->shippingAddress;
	$billAd = $model->newOrder->billingAddress;
?>

<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-lg-12">
                <h1>Controleer uw bestelling</h1>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<p><strong>Totaalbedrag: </strong>$totalValue</p>
				<p><strong>Afleveradres: </strong></p>
				<?php if ($shipAd) { ?>
				<p><?php echo $shipAd['firstName'] . " " . $shipAd['lastName']; ?><br />
				<?php echo $shipAd['streetName'] . " " . $shipAd['streetNumber']; ?><br />
				<?php echo $shipAd['postCode'] . ", " . $shipAd['city']; ?><br />
				<?php echo "tel. " . $shipAd['phoneNumber']; ?></p>
				<?php } else { ?>
				<p>U komt uw bestelling afhalen.
				<?php } ?>
				
				<p><strong>Factuuradres: </strong></p>
				<p><?php echo $billAd['firstName'] . " " . $billAd['lastName']; ?><br />
				<?php echo $billAd['streetName'] . " " . $billAd['streetNumber']; ?><br />
				<?php echo $billAd['postCode'] . ", " . $billAd['city']; ?><br />
				<?php echo "tel. " . $billAd['phoneNumber']; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 padding-lg">
				<p id="status" class="padding-lg"></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-offset-10 col-lg-2">
				<a class="btn btn-red btn-lg btn-block" onclick='#'>Betalen <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
</div>
