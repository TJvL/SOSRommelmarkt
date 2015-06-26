<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
		<h3>Website instellingen</h3>
		<div class="tabpanel">
			<!-- start nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#companyinformation" aria-controls="companyinformation" role="tab" data-toggle="tab">Adres</a></li>
				<li role="presentation"><a href="#visitinghours" aria-controls="visitinghours" role="tab" data-toggle="tab">Openingstijden</a></li>
				<li role="presentation"><a href="#background" aria-controls="background" role="tab" data-toggle="tab">Achtergrond</a></li>
			</ul>
			<!-- end nav tabs -->
			
			<!-- start tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active margin-ver-lg" id="companyinformation">
					<form class="idealforms" id="companyinformationform" action="javascript:UpdateCompanyInformation()">
                        <input type="hidden" form="companyinformationform" id="companyInformationId" name="companyInformationId" value="<?php echo $model->companyInformation->id; ?>" />

						<div class="field">
							<label class="main" for="address">Adres</label>
							<input type="text" form="companyinformationform" id="address" name="address" value="<?php echo $model->companyInformation->address; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="city">Plaats</label>
							<input type="text" form="companyinformationform" id="city" name="city" value="<?php echo $model->companyInformation->city; ?>"/>
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="postalcode">Postcode</label>
							<input type="text" form="companyinformationform" id="postalcode" name="postalcode" value="<?php echo $model->companyInformation->postalcode; ?>"/>
							<span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="phone">Telefoon</label>
							<input type="text" form="companyinformationform" id="phone" name="phone" value="<?php echo $model->companyInformation->phone; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="email">Email</label>
							<input type="email" form="companyinformationform" id="email" name="email" value="<?php echo $model->companyInformation->email; ?>" />
                            <span class="error"></span>
						</div>
                        <div class="field buttons">
                            <label class="main">&nbsp;</label>
                            <button form="companyinformationform" type="submit" class="submit">Opslaan</button>
                        </div>
                        <span id="invalid"></span>
					</form>
                    <div class="row">
                        <div class="col-md-12 padding-lg">
                            <p id="statuscompanyinformation" class="padding-lg"></p>
                        </div>
                    </div>
				</div>
				
				<div role="tabpanel" class="tab-pane margin-ver-lg" id="visitinghours">
					<form class="idealforms" id="visitinghoursform" action="javascript:UpdateVisitinghours()">
                        <input type="hidden" form="visitinghoursform" id="visitinghoursId" name="visitinghoursId" value="<?php echo $model->visitingHours->id; ?>" />

						<div class="field">
							<label class="main" for="monday">Maandag</label>
							<input type="text" form="visitinghoursform" id="monday" name="monday" value="<?php echo $model->visitingHours->monday; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="tuesday">Dinsdag</label>
							<input type="text" form="visitinghoursform" id="tuesday" name="tuesday" value="<?php echo $model->visitingHours->tuesday; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="wednesday">Woensdag</label>
							<input type="text" form="visitinghoursform" id="wednesday" name="wednesday" value="<?php echo $model->visitingHours->wednesday; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="thursday">Donderdag</label>
							<input type="text" form="visitinghoursform" id="thursday" name="thursday" value="<?php echo $model->visitingHours->thursday; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="friday">Vrijdag</label>
							<input type="text" form="visitinghoursform" id="friday" name="friday" value="<?php echo $model->visitingHours->friday; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="saturday">Zaterdag</label>
							<input type="text" form="visitinghoursform" id="saturday" name="saturday" value="<?php echo $model->visitingHours->saturday; ?>" />
                            <span class="error"></span>
						</div>
						<div class="field">
							<label class="main" for="sunday">Zondag</label>
							<input type="text" form="visitinghoursform" id="sunday" name="sunday" value="<?php echo $model->visitingHours->sunday; ?>" />
                            <span class="error"></span>
						</div>
                        <div class="field buttons">
                            <label class="main">&nbsp;</label>
                            <button form="visitinghoursform" type="submit" class="submit">Opslaan</button>
                        </div>
                        <span id="invalidvisitinghours"></span>
					</form>
                    <div class="row">
                        <div class="col-md-12 padding-lg">
                            <p id="statusvisitinghours" class="padding-lg"></p>
                        </div>
                    </div>
				</div>
                    
                <div role="tabpanel" class="tab-pane margin-ver-lg" id="background">
					<form class="idealforms" id="backgroundForm" action="javascript:UpdateBackground()">
						<div class="field">
		                    <label class="main" for="image">Plaatje</label>
		                    <input id="image" type="file">
		                    <span class="error"></span>
		                </div>
		                <div class="field" id="imagePreviewDiv">
		                	<label class="main" for="imagePreview">Plaatje preview</label>
			                <img class="image-preview" id="imagePreview" src="<?php echo $model->backgroundPath ?>">
		                    <span class="error"></span>
						</div>
		                <div class="field buttons">
		                    <label class="main">&nbsp;</label>
		                    <button type="submit" class="submit">Opslaan</button>
		                </div>
                        <span id="invalidBackground"></span>
					</form>
                    <div class="row">
                        <div class="col-md-12 padding-lg">
                            <p id="statusBackground" class="padding-lg"></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
 