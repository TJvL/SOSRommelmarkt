function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

function handleUpdateModule()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		ResetStatus();
		
		var data =
		{
            modelName:          'Module',
			id:					$('#module-id').val(),
			heading:			$('#module-heading').val(),
			content:			$('#module-content').val(),
			category:			$('#module-category').val(),
			reference:			$('#module-reference').val(),
			reference_label:	$('#module-reference-label').val()
		};
		
		$.ajax(
			{
				url: getBaseURL() + "pagecontentapi/updatemodule",
				type: "POST",
				data: data,
				async: true,
                success: function () {
                    $("#status").text("Modulegegevens succesvol gewijzigd.");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
			});
	}
}

function handleDeleteModule()
{
	if (confirm("Weet u zeker dat u deze moduleview wilt verwijderen?"))
	{
        ResetStatus();

		var data =
		{
            modelName:  'Module',
			id:	        $("#module-id").val()
		};
		
		$.ajax(
		{
			url: getBaseURL() + "pagecontentapi/deletemodule",
			type: "POST",
			data: data,
			async: true,
            success: function () {
                if($('#module-category').val() == "home"){
                    var successMessage = "Home module succesvol verwijderd.";
                    localStorage.setItem("successMessage", successMessage);
                }
                else if($('#module-category').val() == "aboutus"){
                    var successMessage = "Over ons module succesvol verwijderd.";
                    localStorage.setItem("successMessage", successMessage);
                }
                document.location.href = getBaseURL() + 'manage/pagecontentoverview#tab_' + $('#module-category').val() + '-modules';
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
		});
	}
}
