<?php Type::check("ArrayList:Partner", $model) ?>

<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/partneradd" ?>" class="btn btn-success">Nieuwe Partner</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Partners</h1>
            <hr>
        </div>
		<div class="table-responsive padding-sm">
			<table id="partnerTable" class="display">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Website</th>
                        <th>Categorie</th>
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
                        <td><?php echo $m->category ?></td>
                        <td>
                       		<a href="<?php echo ROOT_PATH . '/manage/partnerview/' .  $m->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
			</table>
		</div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
	</div>
</div>