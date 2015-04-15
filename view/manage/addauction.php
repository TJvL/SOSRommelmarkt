<head>
	<link href=  "/SOSRommelmarkt/IdealForms/css/jquery.idealforms.css" rel="stylesheet">
</head>

<div class="container">
	<div class="white">
		<div class="content">
			<div class="idealsteps-container">
				<form method="POST" action="" role="form" class="idealforms" id="auction_add">
					<div class="idealsteps-wrap">
						<!-- Step 1 -->
						<section class="idealsteps-step">
							<div class="field">
								<label class="main">Startdatum:</label>
								<input name="startDate" type="text" placeholder="mm/dd/yyyy" class="datepicker" data-idealforms-ajax="ajax.php">
								<span class="error"></span>
							</div>
							<div class="field">
								<label class="main">Einddatum:</label>
								<input name="endDate" type="text" placeholder="mm/dd/yyyy" class="datepicker" data-idealforms-ajax="ajax.php">
								<span class="error"></span>
							</div>
							<div class="field buttons">
								<label class="main"></label>
								<button type="submit" class="submit">Aanmaken</button>
							</div>
						</section>
						</section>
					</div>
					<span id="invalid"></span>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.js" type="text/javascript"></script>
<script src="/SOSRommelmarkt/IdealForms/js/out/jquery.idealforms.submit.js" type="text/javascript"></script>
<script>
	// idealforms datepicker
	$('form').idealforms({
		rules: {
			'event': 'date'
		}
	});
</script>
