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