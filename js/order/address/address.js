// Hides the 2nd panel and creates a slide animation depending on what option you pick (in address.php)
$('#deliver-panel').css('display', 'none');
$('.deliver-method').click(function(){
	if ($('input[name=deliveryMethodRadios]:checked').val() == 'pickup') {
		$('#billing-address-form').slideDown();
		$('#pickup-panel').slideDown('fast');
		$('#deliver-panel').slideUp('fast');
		$('#addressForm-2').resize();
		$('#addressForm-3').resize();
	}
	
	if ($('input[name=deliveryMethodRadios]:checked').val() == 'deliver') {
		$('#billing-address-checkbox').prop("checked", true);
		$('#billing-address-form').slideUp();
		$('#deliver-panel').slideDown('fast');
		$('#pickup-panel').slideUp('fast');
		$('#addressForm-2').resize();
		$('#addressForm-3').resize();
	}
});
//end

// shows/hides billing address
$('#billing-address-checkbox').click(function() {
	if ($('#billing-address-checkbox').is(':checked')) {
		$('#billing-address-form').slideUp();
		$('#addressForm-2').resize();
		$('#addressForm-3').resize();
	} else {
		$('#billing-address-form').slideDown();
		$('#addressForm-2').resize();
		$('#addressForm-3').resize();
	}
});
//end

// order stuff TODO: het niet zo'n zooi maken? :(
function addAddressesToOrder(addresses, isLoggedIn) {
	var data = {
			modelName: 'NewOrderViewModel'
	}
	
	// if delivery is selected, add the shipping address
	if ($('input[name=deliveryMethodRadios]:checked').val() == 'deliver') {
		if (isLoggedIn) {
			var shippingAddressId = $('#deliver-address').val();
			var billingAddressId = $('#billing-address').val();
			
			// find the right shipping address
			// TODO: Optimize this for loop (breaks etc)........
			for (i in addresses) {
				if (billingAddressId == shippingAddressId) {
					if (addresses[i].id == shippingAddressId) {
						data.shippingAddress = addresses[i];
						data.billingAddress = addresses[i];
					}
				} else {
					if (addresses[i].id == shippingAddressId) {
						data.shippingAddress = addresses[i];
					}
					
					if (addresses[i].id == billingAddressId) {
						data.billingAddress = addresses[i];
					}
				}
			}
            console.log(data);
            debugger;
		} else {
			// attempt to submit shipping address form (validate with idealforms)
			$('#addressForm-2').submit();
			
			if($('#addressForm-2-invalid').is(':visible')) {
				// cancel adding addresses 
				return;
			}
			
			var shippingAddress = {
					modelName:		'Address',
					firstName:		$('#addressForm-2-firstName').val(),
					lastName:		$('#addressForm-2-lastName').val(),
					streetName:		$('#addressForm-2-streetName').val(),
					streetNumber:	$('#addressForm-2-streetNumber').val(),
					postCode:		$('#addressForm-2-postCode').val(),
					city:			$('#addressForm-2-city').val(),
	                phoneNumber:	$('#addressForm-2-phoneNumber').val()
			};
			
			if ($('#billing-address-checkbox').is(':checked')) {
				// same address for both
                console.log("checked");
				data.billingAddress = shippingAddress;
                data.shippingAddress = shippingAddress;
			} else {
				// attempt to submit billing address form (validate with idealforms)
				$('#addressForm-3').submit();
				
				if ($('#addressForm-3-invalid').is(':visible')) {
					// cancel adding addresses
					alert("3");
					return;
				}
                var shippingAddress = {
                    modelName:		'Address',
                    firstName:		$('#addressForm-2-firstName').val(),
                    lastName:		$('#addressForm-2-lastName').val(),
                    streetName:		$('#addressForm-2-streetName').val(),
                    streetNumber:	$('#addressForm-2-streetNumber').val(),
                    postCode:		$('#addressForm-2-postCode').val(),
                    city:			$('#addressForm-2-city').val(),
                    phoneNumber:	$('#addressForm-2-phoneNumber').val()
                };

				var billingAddress = {
						modelName:		'Address',
						id:				$('#addressForm-3-id').val(),
						firstName:		$('#addressForm-3-firstName').val(),
						lastName:		$('#addressForm-3-lastName').val(),
						streetName:		$('#addressForm-3-streetName').val(),
						streetNumber:	$('#addressForm-3-streetNumber').val(),
						postCode:		$('#addressForm-3-postCode').val(),
						city:			$('#addressForm-3-city').val(),
		                phoneNumber:	$('#addressForm-3-phoneNumber').val()
				};
                data.billingAddress = billingAddress;
                data.shippingAddress = shippingAddress;
			}
		}
	} else {
        //Delivery is not selected, only billing address needs to be added
		if (isLoggedIn) {
			var billingAddressId = $('#billing-address').val();
			
			for (i in addresses) {
				if (addresses[i].id == billingAddressId) {
					data.billingAddress = addresses[i];
				}
			}
		} else {
			// attempt to submit billing address form (validate with idealforms)
			$('#addressForm-3').submit();
			
			if ($('#addressForm-3-invalid').is(':visible')) {
				// cancel adding addresses
				return;
			}
			
			var billingAddress = {
					modelName:		'Address',
					id:				$('#addressForm-3-id').val(),
					firstName:		$('#addressForm-3-firstName').val(),
					lastName:		$('#addressForm-3-lastName').val(),
					streetName:		$('#addressForm-3-streetName').val(),
					streetNumber:	$('#addressForm-3-streetNumber').val(),
					postCode:		$('#addressForm-3-postCode').val(),
					city:			$('#addressForm-3-city').val(),
	                phoneNumber:	$('#addressForm-3-phoneNumber').val()
			};

            data.billingAddress = billingAddress;
		}
	}

	$.ajax({
		url: getBaseURL() + 'orderplacementapi/addaddresses',
		type: 'POST',
		data: data,
		async: true,
		success: function() {
			window.location = getBaseURL() + "order/confirm";
		},
		error: function (status) {
			$("#status").text(status.status + ": " + translateHttpError(status.statusText));
			$("#status").addClass("alert-danger");
		}
	});
}
//end