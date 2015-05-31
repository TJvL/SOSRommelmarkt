function ResetStatus()
{
	$("#status").text("");
	$("#status").removeClass("alert-warning alert-danger alert-success");
}

function CreatePartner()
{
	if (confirm("Weet u zeker dat u deze partner wilt toevoegen?"))
	{
		ResetStatus();
		
		// Check if the file has an image extension.
		if (!IsImage($("#image").val()))
		{
			$("#status").text("Het bestand dat u probeert te gebruiken is geen plaatje.");
			$("#status").addClass("alert-warning");
	        
			return;
		}
		
		// Get the form data.
		var data = new FormData();
		data.append("name", $("#name").val());
		data.append("website", $("#website").val());
        data.append("category", $("#category").val());
		data.append("image", $("#image")[0].files[0]);
		
		// Send the POST request.
		$.ajax(
		{
			url: "createpartner",
			type: "POST",
	        data: data,
	        contentType: false,
	        processData: false,
	        success: function(result)
	        {
		        // Check if it went alright.
		        if (result == 0)
		        {
		        	// Go to the partners page.
			        window.location.replace("partners");
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