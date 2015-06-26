// This is based on account/address/addresslogic.js
// Make sure changes are made to both files.

var AddressManager;

AddressManager =
{
    initialize: function()
    {
        var addressForm = $('#addressForm');
        var shippingAddressForm = $('#addressForm-2');
        var billingAddressForm = $('#addressForm-3');

        // FIRST FORM
        //Initialize ideal forms
        addressForm.idealforms(
        {

            // Do not select the first input field and show error message.
            silentLoad: true,

            //Add rules for the input fields
            rules:
            {
                'firstName': 'required',
                'lastName': 'required',
                'streetName': 'required',
                'streetNumber': 'required',
                'postCode': 'required zip',
                'city': 'required',
                'phoneNumber': 'required number'
            },

            //When submit is pressed catch the event.
            onSubmit: function(invalid,event)
            {

                // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
                if (invalid > 0)
                {
                    event.preventDefault();
                    $('#invalid').show().text(invalid +' ongeldige velden!');
                    // else submit the form in a POST request
                }
                else
                {
                    $('#invalid').hide();
                }
            }
        });

        //Checks input fields and show message on bottom after every user input.
        addressForm.find('input, select, textarea').on('change keyup', function()
        {
            $('#invalid').hide();
        });
        // END FIRST FORM
        
        // SECOND FORM
        //Initialize ideal forms
        shippingAddressForm.idealforms(
        {

            // Do not select the first input field and show error message.
            silentLoad: true,

            //Add rules for the input fields
            rules:
            {
                'firstName': 'required',
                'lastName': 'required',
                'streetName': 'required',
                'streetNumber': 'required',
                'postCode': 'required zip',
                'city': 'required',
                'phoneNumber': 'required number'
            },

            //When submit is pressed catch the event.
            onSubmit: function(invalid,event)
            {

                // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
                if (invalid > 0)
                {
                	event.preventDefault();
                    $('#addressForm-2-invalid').show().text(invalid +' ongeldige velden!');
                    // else submit the form in a POST request
                }
                else
                {
                    $('#addressForm-2-invalid').hide();
                }
            }
        });

        //Checks input fields and show message on bottom after every user input.
        shippingAddressForm.find('input, select, textarea').on('change keyup', function()
        {
            $('#addressForm-2-invalid').hide();
        });
        // END SECOND FORM
        
        // THIRD FORM
        //Initialize ideal forms
        billingAddressForm.idealforms(
        {

            // Do not select the first input field and show error message.
            silentLoad: true,

            //Add rules for the input fields
            rules:
            {
                'firstName': 'required',
                'lastName': 'required',
                'streetName': 'required',
                'streetNumber': 'required',
                'postCode': 'required zip',
                'city': 'required',
                'phoneNumber': 'required number'
            },

            //When submit is pressed catch the event.
            onSubmit: function(invalid,event)
            {

                // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
                if (invalid > 0)
                {
                	event.preventDefault();
                    $('#addressForm-3-invalid').show().text(invalid +' ongeldige velden!');
                    // else submit the form in a POST request
                }
                else
                {
                    $('#addressForm-3-invalid').hide();
                }
            }
        });

        //Checks input fields and show message on bottom after every user input.
        billingAddressForm.find('input, select, textarea').on('change keyup', function()
        {
            $('#addressForm-3-invalid').hide();
        });
        // END THIRD FORM
    },

    addAddress: function()
    {
        if(confirm("Weet u zeker dat u dit adres wilt toevoegen?"))
        {

            var data =
            {
                modelName: 'Address',
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                streetName: $('#streetName').val(),
                streetNumber: $('#streetNumber').val(),
                postCode: $('#postCode').val(),
                city: $('#city').val(),
                phoneNumber: $('#phoneNumber').val()
            };

            $.ajax(
                {
                    url: getBaseURL() + 'addressapi/addself',
                    type: 'POST',
                    data: data,
                    async: true,
                    success: function ()
                    {
                        location.reload();
                    },
                    error: function (status)
                    {
                        var statusDiv = $("#status");
                        statusDiv.text(status.status + ": " + translateHttpError(status.statusText));
                        statusDiv.addClass("alert-danger");
                    }
                });
        }
    }
};

$(document).ready(AddressManager.initialize);

// fixes idealforms layout (modal issues etc)
$('#address-modal').on('shown.bs.modal', function(e) {
	$('.idealforms').resize();
});