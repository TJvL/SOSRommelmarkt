function ResetStatus()
{
	$("#status").text("");
	$("#status").removeClass("alert-warning alert-danger alert-success");
}

function SetPartnerImage()
{
	if (confirm("Weet u zeker dat de afbeelding wilt wijzigen?"))
	{
		ResetStatus();
		
		// Check if the image is set.
		if ($("#image").val() === "")
		{
			$("#status").text("Er is geen afbeelding geselecteerd.");
			$("#status").addClass("alert-warning");
	        
			return;
		}
		
		// Check if the file has an image extension.
		if (!IsImage($("#image").val()))
		{
			$("#status").text("Het bestand dat u probeert te gebruiken is geen afbeelding.");
			$("#status").addClass("alert-warning");
	        
			return;
		}
		
		var data = new FormData();
		data.append("id", $("#id").val());
		data.append("image", $("#image")[0].files[0]);
		
		$.ajax(
		{
			url: getBaseURL() + "partnerapi/setimage",
			type: "POST",
	        data: data,
	        async: false,
	        contentType: false,
	        processData: false,
            success: function () {
                $("#status").text("Afbeelding succesvol gewijzigd.");
                $("#status").addClass("alert-success");
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
                console.log("fail");
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
            modelName:  'Partner',
	    	id:			$("#id").val(),
	    	name:		$("#name").val(),
	    	website:	$("#website").val(),
            category:   $("#category").val()
		};

        $.ajax(
            {
                url: getBaseURL() + "partnerapi/update",
                type: "POST",
                data: data,
                success: function () {
                    $("#status").text("Partnergegevens succesvol gewijzigd.");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                    console.log("fail");
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
            modelName: 'Partner',
			id: $("#id").val()
		};
	
		$.ajax(
		{
			url: getBaseURL() +  "partnerapi/delete",
			type: "POST",
			data: data,
            success: function () {
                document.location.href = getBaseURL() + 'manage/partners';
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
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
			$("#status").text("Het bestand dat u probeert te gebruiken is geen afbeelding.");
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