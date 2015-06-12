$('#accountForm').idealforms({

    silentLoad: true,

    rules: {
        'username': 'required username ajax',
        'email': 'required email ajax',
        'password': 'required strongpass'
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

//Function to be called when form is submitted.
function updateAccount()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
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
            newPassword: $('#newPassword').val(),
            roleName: $('#roleName').find('option:selected').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'accountapi/update',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    $("#status").text("Success");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

//Function to be called when delete button is pressed.
function deleteAccount()
{
    if(confirm("Weet u zeker dat u wilt verwijderen?"))
    {
        var data =
        {
            modelName:  'AccountPostViewModel',
            id:         $("#id").val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'accountapi/delete',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    var successMessage = "Account is succesvol verwijderd.";
                    localStorage.setItem("successMessage", successMessage);
                    document.location.href = getBaseURL() + 'manage/accountoverview';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

