function handleUpdateSlogan()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		// Reset status message.
		$("#status").text("");
		$("#status").removeClass("alert-success alert-danger");
		
		var data =
		{
			id:	<?php echo $model->id ?>,
			slogan:		$("#slogan-text").val(),
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

function handleDeleteSlogan()
{
	if (confirm("Weet u zeker dat u deze slogan wilt verwijderen?"))
	{
		var data =
		{
			id: <?php echo $model->id ?>,
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
				
				// Go to the partner management page.
				document.location.href = "../settings#tab_slogans";
			}
		});
	}
}
