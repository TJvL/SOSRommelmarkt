<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/account/index"; ?>" class="btn btn-default">Account</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Eigen adressen beheer</h1>
            </div>
            <form action="javascript:AddressManager.addAddress()" id="addressForm" class="idealforms">
                <input form="addressForm" id="id" name="id" type="hidden">

                <div class="field">
                    <label class="main">Voornaam:</label>
                    <input form="addressForm" id="firstName" name="firstName" type="text" placeholder="Voornaam">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Achternaam:</label>
                    <input form="addressForm" id="lastName" name="lastName" type="text" placeholder="Achternaam">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Straat naam:</label>
                    <input form="addressForm" id="streetName" name="streetName" type="text" placeholder="Straat">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Straat nummer:</label>
                    <input form="addressForm" id="streetNumber" name="streetNumber" type="text" placeholder="Nummer">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Postcode:</label>
                    <input form="addressForm" id="postCode" name="postCode" type="text" placeholder="Postcode">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Stad:</label>
                    <input form="addressForm" id="city" name="city" type="text" placeholder="Stad">
                    <span class="error"></span>
                </div>

                <div class="field">
                    <label class="main">Telefoon nr.:</label>
                    <input form="addressForm" id="phoneNumber" name="phoneNumber" type="text" placeholder="Telefoon">
                    <span class="error"></span>
                </div>

                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="addressForm"  type="submit" class="submit">Opslaan</button>
                </div>

                <span id="invalid"></span>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
        <div class="row">
            <hr>
            <table id="addressTable" class="display">
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
                        <td><?php echo $address->firstName . " " . $address->lastName ?></td>
                        <td><?php echo $address->streetName . " " . $address->streetNumber . ", " . $address->postCode . " " . $address->city; ?></td>
                        <td><?php echo $address->phoneNumber; ?></td>
                        <td><button class="btn btn-default deleteAddressButton" title="Verwijderen" value="<?php echo $address->id; ?>"><i class="fa fa-trash-o"></i></button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>