function ResetStatus()
{
	$("#status").text("");
	$("#status").removeClass("alert-warning alert-danger alert-success");
}

function UpdatePartner()
{
	if (confirm("Weet u zeker dat u deze partner wilt wijzigen?"))
	{
		ResetStatus();
		
		// Get the form data.
		var formData = new FormData(document.getElementById("updatePartnerForm"));
		formData.append("id", "<?php echo $model->id ?>");
		
		// Check if the image is set. If so, add it to the formdata.
		if ($("#image").val() !== "")
		{
			// Check if the file has an image extension.
			if (!IsImage($("#image").val()))
			{
				$("#status").text("Het bestand dat u probeert te gebruiken is geen plaatje.");
				$("#status").addClass("alert-warning");
		        
				return;
			}
			
	        formData.append("image", $("#image")[0].files[0]);
		}
		
		// Check if all the needed data is here.
//		if (formData.has("name") && formData.has("website") && formData.has("image"))
//			alert("has them all.");
//		else
//			alert("nope");
	
		$.ajax(
		{
			url: "../updatepartner",
			type: "POST",
	        data: formData,
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