<?php Type::check("ArrayList:Partner", $model) ?>

<div class="container">
	<div class="white">
        <div class="row">
            <h1>Partner beheer</h1>
        </div>
		<div class="row">
			<div class="col-md-1">
				<a href="./addpartner" class="btn btn-default">Nieuwe Partner</a>
			</div>
		</div>
		<div class="table-responsive padding-sm">
			<table id="partnerTable" class="display">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Website</th>
						<th>Opties</th>
					</tr>
				</thead>
                <tbody>
                <?php
                foreach ($model as $m)
                {
                    ?>
                    <tr>
                        <td><?php echo $m->name ?></td>
                        <td><?php echo $m->website ?></td>
                        <td>
                       		<a href="partner/<?php echo $m->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
			</table>
		</div>
	</div>
</div>