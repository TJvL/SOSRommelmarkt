<?php
	$user = AccountHelper::getUserInfo();
	$isLoggedIn = isset($user);
	$isLoggedIn =true;
?>

<!-- 
	user logged in > show existing addresses
	user not logged in > offer log in
	
	either way > offer new address option
	
	show addresses as $streetname $streenumber, $city (in dropdown)
 -->
						<div class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-labelledby="address-modal-title">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="address-modal-title">Adres Toevoegen</h4>
									</div>
									<div class="modal-body">
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
								</div>
							</div>
						</div>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-lg-12">
				<h1>Bestelling Plaatsen</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php if ($isLoggedIn) { ?>
				<p>Wilt u uw bestelling laten bezorgen of deze afhalen?</p>
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="radio-inline">
							<label>
								<input type="radio" name="deliveryMethodRadios" class="deliver-method" id="deliveryMethodRadios-pickup" value="pickup" checked>
								Afhalen
							</label>
						</div>
						<div class="radio-inline">
							<label>
								<input type="radio" name="deliveryMethodRadios" class="deliver-method" id="deliveryMethodRadios-deliver" value="deliver">
								Bezorgen
							</label>
						</div>
					</div>
					<div class="panel-body" id="pickup-panel">
						<p>Na het afronden van uw bestelling kunt u het komen afhalen in onze winkel.</p>
					</div>
					<div class="panel-body" id="deliver-panel">
						<?php if (count($model)) { ?>
						<p>Kies een afleveradres, of maak een nieuwe aan.</p>
						<div class="dropdown disabled">
							<button class="btn btn-red dropdown-toggle" type="button" id="addressMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Kies een adres...
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="addressMenu" >
								<?php foreach ($model as $a) { ?>
								<li><a><?php echo $a->streetName . $a->streetNumber . ", " . $a->city; ?></a></li>
								<?php } ?>
							</ul>
						</div>
						<?php } else { ?>
						<p>U heeft geen bestaande adressen, u kunt een nieuwe aanmaken.</p>
						<?php } ?>
						<button class="btn btn-red" type="button" data-toggle="modal" data-target="#address-modal" onclick="javascript:ResizeForm()">Nieuw Adres</button>
					</div>
				</div>
				<?php } ?>
			
			
			</div>
		</div>
	</div>
</div>
