<head>
<script>
function InsertPartner()
{
	// Get the form data.
	var formData = new FormData(document.getElementById("addPartnerForm"));
	
	// Check if all the needed data is here.
//	if (formData.has("name") && formData.has("website") && formData.has("image"))
//		alert("has them all.");
//	else
//		alert("nope");
	
	$.ajax(
	{
		url: "addpartner",
		type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(result)
        {
	        // Check if it went alright.
	        if (result == 0)
	        {
	        	alert("Success");

	        	// Go to the partners page.
		        window.location.replace("partners");
	        }
	        else
	        {
	        	alert("fail");
	        }
        }
	});
}
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
            <form class="form-horizontal" id="addPartnerForm" enctype="multipart/form-data" action="javascript:InsertPartner()">
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
                    	<input class="form-control" id="image" name=image type="file" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button class="btn btn-default btn-block" type="submit">Opslaan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>