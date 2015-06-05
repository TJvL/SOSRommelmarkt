function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

function AddProject()
{
    if (confirm("Weet u zeker dat u dit project wilt toevoegen?"))
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
                    document.location.href = getBaseURL() + 'manage/projects';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}


