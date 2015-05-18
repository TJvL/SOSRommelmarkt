function ResetStatus()
{
	$("#status").text("");
	$("#status").removeClass("alert-warning alert-danger alert-success");
}

function SetPartnerImage()
{
	if (confirm("Weet u zeker dat u het plaatje wilt wijzigen?"))
	{
		ResetStatus();
		
		// Check if the image is set.
		if ($("#image").val() === "")
		{
			$("#status").text("Er is geen plaatje geselecteerd.");
			$("#status").addClass("alert-warning");
	        
			return;
		}
		
		// Check if the file has an image extension.
		if (!IsImage($("#image").val()))
		{
			$("#status").text("Het bestand dat u probeert te gebruiken is geen plaatje.");
			$("#status").addClass("alert-warning");
	        
			return;
		}
		
		var data = new FormData();
		data.append("id", $("#id").val());
		data.append("image", $("#image")[0].files[0]);
		
		$.ajax(
		{
			url: "../setpartnerimage",
			type: "POST",
	        data: data,
	        async: false,
	        contentType: false,
	        processData: false,
	        success: function(result)
	        {
		        // Check if it went alright.
		        if (result == 0)
		        {
		        	$("#status").text("Succes!");
	                $("#status").addClass("alert-success");
		        }
		        else
		        {
		        	$("#status").text("Er is iets verkeerd gegaan.");
	                $("#status").addClass("alert-danger");
		        }
	        }
		});
	}
}

function UpdatePartner()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		ResetStatus();
		
		var data =
		{
	    	id:			$("#id").val(),
	    	name:		$("#name").val(),
	    	website:	$("#website").val()
		};
	
		$.ajax(
		{
			url: "../updatepartner",
			type: "POST",
	        data: data,
	        success: function(result)
	        {
		        // Check if it went alright.
		        if (result == 0)
		        {
		        	$("#status").text("Succes!");
	                $("#status").addClass("alert-success");
		        }
		        else
		        {
		        	$("#status").text("Er is iets verkeerd gegaan.");
	                $("#status").addClass("alert-danger");
		        }
	        }
		});
	}
}

function DeletePartner()
{
	if (confirm("Weet u zeker dat u deze partner wilt verwijderen?"))
	{
		ResetStatus();
		
		var data =
		{
			id: $("#id").val()
		};
	
		$.ajax(
		{
			url: "../deletepartner",
			type: "POST",
			data: data,
			success: function(result)
			{
				// Check if it went alright.
				if (result == 0)
				{
					// Go to the partner management page.
					document.location.href = "../partners";
				}
				else
				{
					$("#status").text("Er is iets verkeerd gegaan.");
	                $("#status").addClass("alert-danger");
				}
			}
		});
	}
}

$(document).ready(function()
{
	// For previewing the image.
	$("#image").change(function()
	{
		ResetStatus();
		
		// Check if the file has an image extension.
		if (!IsImage($("#image").val()))
		{
			$("#status").text("Het bestand dat u probeert te gebruiken is geen plaatje.");
	        $("#status").addClass("alert-warning");
	        
	     	// Hide the image.
			$("#imagePreviewDiv").addClass("hidden");
	        
			return;
		}
		
		if (this.files && this.files[0])
		{
			var reader = new FileReader();

			reader.onload = function(e)
			{
				$("#imagePreview").attr("src", e.target.result);
			}

			reader.readAsDataURL(this.files[0]);

			// Show the image.
			$("#imagePreviewDiv").removeClass("hidden");
	    }
	});
});