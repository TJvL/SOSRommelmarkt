function handleUpdateModule()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		// Reset status message.
		$("#status").text("");
		$("#status").removeClass("alert-success alert-danger");
		
		var data =
		{
			id:					$('#module-id').val(),
			heading:			$('#module-heading').val(),
			content:			$('#module-content').val(),
			category:			$('#module-category').val(),
			reference:			$('#module-reference').val(),
			reference_label:	$('#module-reference-label').val(),
			returnPath:			$('#return-path').val()
		};
		
		$.ajax(
			{
				url: "../../moduleapi/update",
				type: "POST",
				data: data,
				async: true,
				success: function(result)
				{
					$("#status").text("  Succes!");
					$("#status").addClass("alert-success");
				},
				error: function(result)
				{
					$("#status").text("  Er is iets verkeerd gegaan");
					$("#status").addClass("alert-danger");
				}
			});
	}
}

function handleDeleteModule()
{
	if (confirm("Weet u zeker dat u deze module wilt verwijderen?"))
	{
		var data =
		{
			id:	$("#module-id").val()
		};
		
		$.ajax(
		{
			url: "moduleapi/delete",
			type: "POST",
			data: data,
			async: true,
			success: function(result)
			{
				// Check if it went alright.
				if (result != 0)
				{
					alert("Er is iets verkeerd gegaan");
				}
				
				// Go to the management page.
				document.location.href = "../.." + $('#return-path').val();
			}
		});
	}
}
