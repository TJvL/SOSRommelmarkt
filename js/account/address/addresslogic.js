var AddressManager;

AddressManager =
{
    initialize: function()
    {
        var addressForm = $('#addressForm');

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
                'postCode': 'required',
                'city': 'required',
                'phoneNumber': 'required'
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

        $('#addressTable').DataTable();
        $('.deleteAddressButton').on('click', AddressManager.deleteAddress);
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
    },

    deleteAddress: function()
    {
        if(confirm("Weet u zeker dat u dit adres wilt verwijderen?"))
        {

            var data =
            {
                modelName: 'Address',
                id: $(this).val()
            };

            $.ajax(
                {
                    url: getBaseURL() + 'addressapi/deleteself',
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

