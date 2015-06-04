$('#loginForm').idealforms({

    silentLoad: true,

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

function login()
{
    // Reset status message.
    $("#status").text("");
    $("#status").removeClass("alert-success alert-danger");

    var data =
    {
        modelName: 'AccountPostViewModel',
        username: $('#username').val(),
        password: $('#password').val()
    };

    $.ajax(
        {
            url: getBaseURL() + 'accountapi/login',
            type: 'POST',
            data: data,
            async: true,
            success: function () {
                document.location.href = getBaseURL() + 'account/index';
            },
            error: function (status) {
                $("#status").text("Inloggen mislukt.");
                $("#status").addClass("alert-danger");
            }
        });
}
