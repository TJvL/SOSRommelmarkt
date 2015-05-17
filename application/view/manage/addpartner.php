<head>
<script>
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
	//	if (formData.has("name") && formData.has("website") && formData.has("image"))
	//		alert("has them all.");
	//	else
	//		alert("nope");
		
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
</script>
</head>

<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/partners" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
	            <h1>Partner toevoegen</h1>
            </div>
            <form class="form-horizontal" id="createPartnerForm" enctype="multipart/form-data" action="javascript:CreatePartner()">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Naam</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Naam van de partner" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="website">Website</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="website" name="website" type="text" placeholder="Website van de partner" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">Plaatje</label>
                    <div class="col-sm-8">
                    	<input class="form-control" id="image" name="image" type="file" required>
                    </div>
                </div>
                <div class="form-group hidden" id="imagePreviewDiv">
                	<label class="control-label col-sm-2" for="imagePreview">Plaatje preview</label>
	                <div class="col-sm-8">
	                	<img class="image-preview" id="imagePreview">
	                </div>
				</div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button class="btn btn-default btn-block" type="submit">Opslaan</button>
                    </div>
                    <div class="col-sm-4">
						<div class="alert" id="status" role="alert"></div>
					</div>
                </div>
            </form>
        </div>
    </div>
</div>