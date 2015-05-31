function handleUpdateNews()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		// Reset status message.
		$("#status").text("");
		$("#status").removeClass("alert-success alert-danger");
		
		var data =
		{
			id:					$('#news-id').val(),
			heading:			$('#news-heading').val(),
			content:			$('#news-content').val(),
			create_date:		$('#news-create-date').val(),
			expiration_date:	$('#news-expiration-date').val(),
		};
		
		$.ajax(
			{
				url: "update",
				type: "POST",
				data: data,
				async: true,
				success: function(result)
				{
					// Check if it went alright.
					if (result == 0)
					{
						$("#status").text("  Succes!");
						$("#status").addClass("alert-success");
					}
					else
					{
						$("#status").text("  Er is iets verkeerd gegaan");
						$("#status").addClass("alert-danger");
					}
				}
			});
	}
}

function handleDeleteNews()
{
	if (confirm("Weet u zeker dat u dit artikel wilt verwijderen?"))
	{
		var data =
		{
			id:	$("#news-id").val()
		};
		
		$.ajax(
		{
			url: "delete",
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
				document.location.href = "../../manage/settings#tab_news-items";
			}
		});
	}
}
