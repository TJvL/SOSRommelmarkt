<div class="container">
    <div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/orderadd"; ?>" class="btn btn-success">Nieuwe Order</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Bestellingen</h1>
            <hr>
        </div>
        <div class="table-responsive padding-sm">
            <table id="orderTable" class="display">
                <thead>
                <tr>
                    <th>Nummer</th>
                    <th>Geplaatst op</th>
                    <th>Status</th>
                    <th>Totaal prijs</th>
                    <th>Aantal items</th>
                    <th>Bewerken?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($model as $order)
                {?>
                    <tr>
                        <td><?php echo $order->id ?></td>
                        <td><?php echo $order->placedOn ?></td>
                        <td><?php echo $order->status ?></td>
                        <td><?php echo $order->totalPrice ?></td>
                        <td><?php echo count($order->orderProducts) ?></td>
                        <td>
                            <a href="<?php echo ROOT_PATH . "/manage/orderview/" . $order->id ?>"><button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
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