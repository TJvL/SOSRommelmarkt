// Hides the 2nd panel and creates a slide animation depending on what option you pick (in address.php)
$('#deliver-panel').css('display', 'none');
$('.deliver-method').click(function(){
	if ($('input[name=deliveryMethodRadios]:checked').val() == 'pickup') {
		$('#pickup-panel').slideDown('fast');
		$('#deliver-panel').slideUp('fast');
	}
	
	if ($('input[name=deliveryMethodRadios]:checked').val() == 'deliver') {
		$('#deliver-panel').slideDown('fast');
		$('#pickup-panel').slideUp('fast');
	}
});
//end

// shows/hides billing address
$('#billing-address-form').css('display', 'none');
$('#billing-address-checkbox').click(function() {
	if ($('#billing-address-checkbox').is(':checked')) {
		console.log("checked");
		$('#billing-address-form').slideUp();
	} else {
		console.log("not checked");
		$('#billing-address-form').slideDown();
	}
});
//end

// resize idealforms on load
$(document).load(function() {
	$('#addressForm-2').resize();
});
