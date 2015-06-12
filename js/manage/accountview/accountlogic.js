$('#accountForm').idealforms({

    silentLoad: true,

    rules: {
        'username': 'required username ajax',
        'email': 'required email ajax',
        'password': 'required strongpass',
        'roleName': 'select:default'
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
function updateNews()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var data =
        {
            modelName: 'News',
            id: $('#id').val(),
            heading: $('#heading').val(),
            content: $('#content').val(),
            expiration_date: $('#expiration-date').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'newsapi/update',
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
function deleteNews()
{
    if(confirm("Weet u zeker dat u wilt verwijderen?"))
    {
        var data =
        {
            modelName:  'News',
            id:         $("#id").val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'newsapi/delete',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    var successMessage = "Nieuws is succesvol verwijderd.";
                    localStorage.setItem("successMessage", successMessage);
                    document.location.href = getBaseURL() + 'manage/newsoverview';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

