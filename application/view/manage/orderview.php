<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/orderoverview" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" onclick="deleteOrder()">Verwijder bestelling</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Bestelling overzicht</h1>
            </div>
            <form action="javascript:updateOrder()" autocomplete="off" class="idealforms" id="orderForm">
                <div class="field">
                    <label class="main">Bestellings nummer:</label>
                    <input form="orderForm" id="id" name="id" type="text" value="<?php echo $model->id; ?>" disabled>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Geplaatst op:</label>
                    <input form="orderForm" id="placedOn" name="placedOn" type="text" value="<?php echo $model->placedOn; ?>" disabled>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Status veranderd op:</label>
                    <input form="orderForm" id="statusChangedOn" name="statusChangedOn" type="text" value="<?php echo $model->statusChangedOn; ?>" disabled>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Totaal prijs:</label>
                    <input form="orderForm" id="totalPrice" name="totalPrice" type="text" value="<?php echo $model->totalPrice; ?>" disabled>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main" for="isSold">Is betaald:</label>
                    <?php
                    if ($model->isPayed)
                    {
                        ?>
                        <p class="group">
                            <input form="orderForm" id="isPayed" type="checkbox" checked>
                        </p>
                    <?php
                    }
                    else
                    {
                        ?>
                        <p class="group">
                            <input form="orderForm" id="isPayed" type="checkbox">
                        </p>
                    <?php
                    }
                    ?>
                </div>
                <div class="field">
                    <label class="main">Status:</label>
                    <select form="orderForm" name="status" id="status">
                        <?php
                        foreach($model->possibleOrderStatuses as $orderStatus)
                        {
                            if($model->order->status === $orderStatus->name)
                            {
                                echo "<option value='$orderStatus->name' selected>$orderStatus->name</option>";
                            }
                            else
                            {
                                echo "<option value='$orderStatus->name'>$orderStatus->name</option>";
                            }
                        }
                        ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Verzend methode:</label>
                    <select form="orderForm" name="deliveryMethod" id="deliveryMethod">
                        <?php
                        foreach($model->possibleDeliveryMethods as $deliveryMethod)
                        {
                            if($model->order->deliveryMethod === $deliveryMethod->name)
                            {
                                echo "<option value='$deliveryMethod->name' selected>$deliveryMethod->name</option>";
                            }
                            else
                            {
                                echo "<option value='$deliveryMethod->name'>$deliveryMethod->name</option>";
                            }
                        }
                        ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Betaal Methode:</label>
                    <select form="orderForm" name="payMethod" id="payMethod">
                        <?php
                        foreach($model->possiblePayMethods as $payMethod)
                        {
                            if($model->order->payMethod === $payMethod->name)
                            {
                                echo "<option value='$payMethod->name' selected>$payMethod->name</option>";
                            }
                            else
                            {
                                echo "<option value='$payMethod->name'>$payMethod->name</option>";
                            }
                        }
                        ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="orderForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Addressen</h1>
            </div>
            <table class="table-responsive table">
                <thead>
                <tr>
                    <th>Soort</th>
                    <th>Naam</th>
                    <th>Adres</th>
                    <th>Telefoon</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Factuur adres</td>
                    <td><?php echo $model->billingAddress->firstName . " " . $model->billingAddress->lastName ?></td>
                    <td><?php echo $model->billingAddress->streetName . " " . $model->billingAddress->streetNumber . ", " . $model->billingAddress->postCode . " " . $model->billingAddress->city; ?></td>
                    <td><?php echo $model->billingAddress->phoneNumber; ?></td>
                </tr>
                <?php if((isset($model->shippingAddress))&&(!empty($model->shippingAddress)))
                {?>
                    <tr>
                        <td>Verzend adres</td>
                        <td><?php echo $model->shippingAddress->firstName . " " . $model->shippingAddress->lastName ?></td>
                        <td><?php echo $model->shippingAddress->streetName . " " . $model->shippingAddress->streetNumber . ", " . $model->shippingAddress->postCode . " " . $model->shippingAddress->city; ?></td>
                        <td><?php echo $model->shippingAddress->phoneNumber; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Producten</h1>
            </div>
            <table class="table-responsive table">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Kleurcode</th>
                    <th>Prijs</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($model->orderProducts as $product)
                { ?>
                    <tr>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->colorCode ?></td>
                        <td><?php echo $product->price ?></td>
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
