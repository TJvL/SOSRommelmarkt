$('#accountForm').idealforms({

    silentLoad: true,

    rules: {
        'username': 'required username ajax',
        'email': 'required email ajax',
        'emailConfirm': 'equalto:email',
        'newPassword': 'strongpass',
        'passwordConfirm': 'equalto:password',
        'password': 'required'
    },

    errors: {
        'username': {
            ajax: 'Gebruikersnaam beschikbaarheid wordt gecontroleerd...',
            ajaxError: 'Gebruikersnaam niet beschikbaar.'
        },
        'email': {
            ajax: 'Email beschikbaarheid wordt gecontroleerd...',
            ajaxError: 'Email is al gebruikt.'
        }
    },

    //When submit is pressed catch the event.
    onSubmit: function(invalid,event) {

        // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
        if (invalid > 0) {
            event.preventDefault();
            $('#invalid').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
        } else {
            $('#invalid').hide();
        }
    }

});

$('#accountForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

function updateAccount()
{
    // Reset status message.
    $("#status").text("");
    $("#status").removeClass("alert-success alert-danger");

    var data =
    {
        modelName: 'AccountPostViewModel',
        id: $('#id').val(),
        username: $('#username').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        newPassword: $('#newPassword').val()
    };

    $.ajax(
        {
            url: getBaseURL() + 'accountapi/updateself',
            type: 'POST',
            data: data,
            async: true,
            success: function () {
                $("#status").text("Succes.");
                $("#status").addClass("alert-success");
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}
