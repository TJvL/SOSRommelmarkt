//Function to be called when form is submitted.
function updateSubvention()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var data =
        {
            modelName: 'SubventionRequest',
            id: $('#id').val(),
            status: $('#selectedstatus').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'subventionapi/updatestatus',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    $("#statusmessage").text("Subsidieaanvraag status succesvol gewijzigd.");
                    $("#statusmessage").addClass("alert-success");
                },
                error: function (status) {
                    $("#statusmessage").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#statusmessage").addClass("alert-danger");
                }
            });
    }
}

//Function to be called when delete button is pressed.
function deleteSubvention()
{
    if(confirm("Weet u zeker dat u wilt verwijderen?"))
    {
        var data =
        {
            modelName: 'SubventionRequest',
            id: $('#id').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'subventionapi/delete',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    var successMessage = "Subsidieaanvraag is succesvol verwijderd.";
                    localStorage.setItem("successMessage", successMessage);
                    document.location.href = getBaseURL() + 'manage/subventionoverview';
                },
                error: function (status) {
                    $("#statusmessage").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#statusmessage").addClass("alert-danger");
                }
            });
    }
}
