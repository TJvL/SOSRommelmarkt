<?php
	$user = AccountHelper::getUserInfo();
	$isLoggedIn = isset($user);
?>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-lg-12">
				<h1>Bestelling Plaatsen</h1>
			</div>
		</div>
		<?php if (!$isLoggedIn) {?>
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-danger" role="alert">U bent niet ingelogd.</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-lg-12">
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
					<?php if ($isLoggedIn) { ?>
					<div class="panel-body" id="deliver-panel">
						<!-- delivery address -->
						<div class="row">
							<div class="col-lg-12">
								<p><strong>Afleveradres:</strong></p>
							</div>
							<div class="col-lg-11">
								<select class="form-control" id="deliver-address" <?php if (empty($model)) echo "disabled"; ?>>
									<?php foreach($model as $a) { ?>
										<option value="<?php $a->id; ?>"><?php echo $a->streetName . $a->streetNumber . ", " . $a->city; ?></option>
									<?php } ?>
									<?php if (empty($model)) { ?>
										<option>Geen adressen bekend...</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-1">
								<button class="btn btn-red" type="button" data-toggle="modal" data-target="#address-modal" title="Adres Toevoegen"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<!-- end delivery address -->
						<br>
						<!-- billing address -->
						<div class="row">
							<div class="col-lg-12">
								<p><strong>Factuuradres:</strong></p>
							</div>
							<div class="col-lg-11">
								<select class="form-control" id="billing-address" <?php if (empty($model)) echo "disabled"; ?>>
									<?php foreach($model as $a) { ?>
										<option value="<?php $a->id; ?>"><?php echo $a->streetName . $a->streetNumber . ", " . $a->city; ?></option>
									<?php } ?>
									<?php if (empty($model)) { ?>
										<option>Geen adressen bekend...</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-1">
								<button class="btn btn-red" type="button" data-toggle="modal" data-target="#address-modal" title="Adres Toevoegen"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<!-- end billing address -->
					</div>
					<?php } else { ?>
					<div class="panel-body" id="deliver-panel">
						<!-- delivery address -->
						<div class="row">
							<div class="col-lg-12">
								<p><strong>Afleveradres:</strong></p>
							</div>
							<div class="col-lg-12">
					            <form action="javascript:AlternateAddress" id="addressForm-2" class="idealforms">
					                <input form="addressForm" id="addressform-2-id" name="id" type="hidden">
					
					                <div class="field">
					                    <label class="main">Voornaam:</label>
					                    <input form="addressForm-2" id="addressform-2-firstName" name="firstName" type="text" placeholder="Voornaam">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Achternaam:</label>
					                    <input form="addressForm-2" id="addressform-2-lastName" name="lastName" type="text" placeholder="Achternaam">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Straat naam:</label>
					                    <input form="addressForm-2" id="addressform-2-streetName" name="streetName" type="text" placeholder="Straat">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Straat nummer:</label>
					                    <input form="addressForm-2" id="addressform-2-streetNumber" name="streetNumber" type="text" placeholder="Nummer">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Postcode:</label>
					                    <input form="addressForm-2" id="addressform-2-postCode" name="postCode" type="text" placeholder="Postcode">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Stad:</label>
					                    <input form="addressForm-2" id="addressform-2-city" name="city" type="text" placeholder="Stad">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Telefoon nr.:</label>
					                    <input form="addressForm-2" id="addressform-2-phoneNumber" name="phoneNumber" type="text" placeholder="Telefoon">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field buttons">
					                    <label class="main">&nbsp;</label>
					                    <button form="addressForm-2"  type="submit" class="submit">Opslaan</button>
					                </div>
					
					                <span id="invalid"></span>
					            </form>
							</div>
						</div>
						<!-- end delivery address -->
						<br>
						<!-- billing address -->
						<div class="row">
							<div class="col-lg-12">
								<p><strong>Factuuradres:</strong></p>
							</div>
							<div class="col-lg-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="billing-address-checkbox" checked>Afleveradres gebruiken
									</label>
								</div>
							</div>
							<div class="col-lg-12" id="billing-address-form">
					            <form action="javascript:AlternateAddress" id="addressForm-3" class="idealforms">
					                <input form="addressForm" id="addressForm-3-id" name="id" type="hidden">
					
					                <div class="field">
					                    <label class="main">Voornaam:</label>
					                    <input form="addressForm-3" id="addressForm-3-firstName" name="firstName" type="text" placeholder="Voornaam">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Achternaam:</label>
					                    <input form="addressForm-3" id="addressForm-3-lastName" name="lastName" type="text" placeholder="Achternaam">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Straat naam:</label>
					                    <input form="addressForm-3" id="addressForm-3-streetName" name="streetName" type="text" placeholder="Straat">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Straat nummer:</label>
					                    <input form="addressForm-3" id="addressForm-3-streetNumber" name="streetNumber" type="text" placeholder="Nummer">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Postcode:</label>
					                    <input form="addressForm-3" id="addressForm-3-postCode" name="postCode" type="text" placeholder="Postcode">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Stad:</label>
					                    <input form="addressForm-3" id="addressForm-3-city" name="city" type="text" placeholder="Stad">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field">
					                    <label class="main">Telefoon nr.:</label>
					                    <input form="addressForm-3" id="addressForm-3-phoneNumber" name="phoneNumber" type="text" placeholder="Telefoon">
					                    <span class="error"></span>
					                </div>
					
					                <div class="field buttons">
					                    <label class="main">&nbsp;</label>
					                    <button form="addressForm-3"  type="submit" class="submit">Opslaan</button>
					                </div>
					
					                <span id="invalid"></span>
					            </form>
							</div>
						</div>
						<!-- end billing address -->
					</div>
				<?php } ?>
				</div>
				<div class="row">
					<div class="col-lg-offset-9 col-lg-3">
						<a class="btn btn-red btn-lg btn-block" href="<?php echo ROOT_PATH . '/order/address'; ?>">Bestellen <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- address modal -->
<div class="modal" id="address-modal" tabindex="-1" role="dialog" aria-labelledby="address-modal-title">
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
<!-- end address modal -->
