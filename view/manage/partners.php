<?php Type::check("ArrayList:Partner", $model) ?>

<div class="container" ng-app="partnerApp" ng-controller="partnerController">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="./addpartner" class="btn btn-default">Nieuwe partner</a>
            </div>
        </div>
        <div class="table-responsive padding-sm">
            <table id="partnerTable" class="display">
                <thead>
                <tr>
                    <th>Partner ID</th>
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
                        <td><?php echo $m->id ?></td>
                        <td><?php echo $m->name ?></td>
                        <td><?php echo $m->website ?></td>
                        <td><?php echo $m->price ?></td>
                        <td>
                            <a href="shopproduct/<?php echo $product->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
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

<script>
    $(document).ready( function () {
        $('#partnerTable').DataTable();
    } );
</script>