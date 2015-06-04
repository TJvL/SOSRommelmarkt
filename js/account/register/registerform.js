$('#accountForm').idealforms({

    silentLoad: true,

    rules: {
        'username': 'required username ajax',
        'email': 'required email ajax',
        'emailConfirm': 'equalto:email',
        'password': 'required strongpass',
        'passwordConfirm': 'equalto:password'
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

function addAccount()
{
    // Reset status message.
    $("#status").text("");
    $("#status").removeClass("alert-success alert-danger");

    var data =
    {
        modelName: 'AccountPostViewModel',
        username: $('#username').val(),
        email: $('#email').val(),
        password: $('#password').val()
    };

    $.ajax(
        {
            url: getBaseURL() + 'accountapi/add',
            type: 'POST',
            data: data,
            async: true,
            success: function () {
                document.location.href = getBaseURL() + 'account/login';
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}

