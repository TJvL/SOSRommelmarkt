<?php Type::check("ArrayList:News", $model); ?>

<div class="container" >
	<div class="white">
		<h1>Nieuws</h1>
		<div class="list-group collapse-group">
		<?php foreach ($model as $news) { ?>
			<a class="list-group-item collapse-group-item">
				<div class="row">
					<div class="collapse-button">
						<div class="col-sm-8"><h3 class="list-group-item-heading"><?php echo $news->heading ?></h3></div>
						<div class="col-sm-4"><i class="fa fa-expand fa-2x pull-right"></i></div>
					</div>
				</div>
				<div class="collapse">
					<table class="table-responsive">
						<tbody>
						<tr>
							<td>
								<?php echo $news->content ?>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</a>
		<?php } ?>
		</div>
	</div>
</div>
