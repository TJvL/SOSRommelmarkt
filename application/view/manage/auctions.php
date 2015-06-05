<?php Type::check("ArrayList:Auction", $model) ?>

<div class="container">
	<div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/addauction"; ?>" class="btn btn-success">Nieuwe Vitrine</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Vitrines</h1>
        </div>

		<div class="table-responsive padding-sm">
			<table id="auctionTable" class="display">
				<thead>
					<tr>
						<th>Startdatum</th>
						<th>Einddatum</th>
						<th>Opties</th>
					</tr>
				</thead>
				<tbody>
                <?php
                foreach ($model as $auction)
                {?>
					<tr>
						<td><?php echo $auction->startDate?></td>
						<td><?php echo $auction->endDate?></td>
						<td>
							<a href="<?php echo ROOT_PATH ?>/manage/editauction/<?php echo $auction->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
						</td>
					</tr>
                <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>