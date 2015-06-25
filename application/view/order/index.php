<?php $useCart = isset($cart); ?>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-lg-12">
				<h1>Uw Winkelwagen</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php if ($useCart) { ?>
				<table class="table table-responsive">
					<tr>
						<th>Artikel</th>
						<th>Prijs</th>
						<th><!-- buttons --></th>
					</tr>
					<?php foreach ($cart->cartContent as $p) { ?>
					<tr>
						<td>$ARTIKELNAAM</td>
						<td>$ARTIKELPRIJS</td>
						<td><a href="#"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a></td><!-- add delete item onclick or whatever -->
					<?php } ?>
				</table>
				<?php } else { ?>
				<p>U heeft geen artikelen in uw winkelwagen.</p>
				<a href="<?php echo ROOT_PATH . '/home/shop'; ?>">Bezoek de winkel</a>
				<?php } ?>
			</div>
		</div>
		<?php if ($useCart) { ?>
		<div class="row">
			<div class="col-lg-offset-9 col-lg-3">
				<a class="btn btn-red btn-lg btn-block" href="<?php echo ROOT_PATH . '/order/address'; ?>">Bestellen <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>