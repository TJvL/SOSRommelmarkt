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


