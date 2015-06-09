//Initialize ideal forms
$('#projectform').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'title': 'required name max:100',
        'description': 'required minmax:20:9999'
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

//Checks input fields and show message on bottom after every user input.
$('#projectform').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

function AddProject()
{
    if (confirm("Weet u zeker dat u dit projectview wilt toevoegen?"))
    {
        ResetStatus();

        var data =
        {
            modelName:  'Project',
            title:	    $("#title").val(),
            body:	    $("#description").val()
        };

        $.ajax(
            {
                url: getBaseURL() + "projectapi/add",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                    var successMessage = "Project is succesvol toegevoegd.";
                    localStorage.setItem("successMessage", successMessage);
                    document.location.href = getBaseURL() + 'manage/projectoverview';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}


