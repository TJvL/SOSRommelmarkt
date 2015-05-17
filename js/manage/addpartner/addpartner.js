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
		var formData = new FormData(document.getElementById("createPartnerForm"));
		
		// Check if all the needed data is here.
//		if (formData.has("name") && formData.has("website") && formData.has("image"))
//			alert("has them all.");
//		else
//			alert("nope");
		
		// Send the POST request.
		$.ajax(
		{
			url: "createpartner",
			type: "POST",
	        data: formData,
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