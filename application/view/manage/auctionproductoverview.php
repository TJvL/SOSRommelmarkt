<?php Type::check("ArrayList:AuctionProduct", $model) ?>

<div class="container">
	<div class="white">

		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/auctionoverview" ?>" class="btn btn-default">Terug</a>
			</div>
			<div class="col-md-offset-9 col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/auctionproductadd/" . $_GET['id']; ?>" class="btn btn-success">Product Toevoegen</a>
			</div>
		</div>
        <div class="row margin-hor-sm">
            <h1>Vitrine producten</h1>
        </div>

		<div class="table-responsive padding-sm">
			<table id=auctionProductTable class="display">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Kleur Code</th>
						<th>Toegevoegd Door</th>
						<th>Bewerken?</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    foreach ($model as $auctionproduct)
                    {?>
					<tr>
						<td><?php echo $auctionproduct ->name?></td>
						<td><?php echo $auctionproduct ->colorCode?></td>
						<td><?php echo $auctionproduct ->addedBy?></td>
						<td>
							<a href="<?php echo ROOT_PATH . "/manage/auctionproductview/" . $auctionproduct->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
						</td>
					</tr>
                <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
