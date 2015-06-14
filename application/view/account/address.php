<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/home/index" ?>" class="btn btn-default">Home</a>
            </div>
            <?php if($model->user->role !== "Standaard")
            { ?>
                <div class="col-md-offset-9 col-md-1">
                    <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Management</a>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Nieuw adres</h1>
            </div>
            <form action="javascript:addAddress()" class="idealforms" id="addressForm">
                <div class="field">
                    <label class="main">Voornaam:</label>
                    <input form="addressForm" id="firstName" name="firstName" type="text"">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Achternaam:</label>
                    <input form="addressForm" id="lastName" name="lastName" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Straatnaam:</label>
                    <input form="addressForm" id="streetName" name="streetName" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Huisnummer:</label>
                    <input form="addressForm" id="streetNumber" name="streetNumber" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Postcode:</label>
                    <input form="addressForm" id="postCode" name="postCode" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Stad:</label>
                    <input form="addressForm" id="city" name="city" type="text">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Telefoon nummer:</label>
                    <input form="addressForm" id="phoneNumber" name="phoneNumber" type="text">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="addressForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div id="status"></div>
        </div>
        <div class="row">
            <hr>
            <div class="col-md-12">
                <a onclick="" class="btn btn-success">Adres Toevoegen</a>
            </div>
        </div>
        <?php if(!empty($model))
        { ?>
            <div class="row">
                <table class="table-responsive table">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Adres</th>
                        <th>Telefoon</th>
                        <th>Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($model as $address)
                    { ?>
                        <tr>
                            <td><?php echo $address->firstName . " " . $address->firstName; ?></td>
                            <td><?php echo $address->streetName . " " . $address->streetNumber . ", " . $address->postCode . " " . $address->city; ?></td>
                            <td><?php echo $address->phoneNumber; ?></td>
                            <td>placeholder</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php }
        else
        {?>
            <div class="row">
                <div class="col-sm-offset-5 col-sm-7">
                    <p>Geen adressen beschikbaar.</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>