$(window).load(function() {

    boxes = $('.thumbnail');
    maxHeight = Math.max.apply(
        Math, boxes.map(function () {
            return $(this).height();
        }).get());
    boxes.height(maxHeight);

});

function ResetStatus()
{
	$("#status").text("");
	$("#status").removeClass("alert-warning alert-danger alert-success");
}

function UpdateProject()
{
	if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
	{
		//ResetStatus();
		
		var data =
		{
	    	id:				$("#id").val(),
	    	title:			$("#title").val(),
	    	description:	$("#description").val()
		};
		
	    $.ajax(
		{
			url: "../../projectapi/editproject",
	        type: "POST",
	        data: data,
	        success: function(result)
	        {
		        // Check if it went alright.
		        if (result == 0)
		        {
                    alert("Projectgegevens succesvol gewijzigd!")
		        	//$("#status").text("Projectgegevens succesvol gewijzigd!");
		        	//$("#status").addClass("alert-success");
		        }
		        else
		        {
                    alert("Er is iets verkeerd gegaan.")
		        	//$("#status").text("Er is iets verkeerd gegaan");
		        	//$("#status").addClass("alert-danger");
		        }
	        }
		});
	}
}

function DeleteProject()
{
	if (confirm("Weet u zeker dat u dit project wilt verwijderen?"))
	{
		ResetStatus();
		
		var data =
		{
			id: $("#id").val()
		};
	
		$.ajax(
		{
			url: "../../projectapi/deleteproject",
	        type: "POST",
	        data: data,
	        success: function(result)
	        {
	        	// Check if it went alright.
				if (result == 0)
				{
					document.location.href = "../projects";
				}
				else
				{
                    alert("Er is iets verkeerd gegaan.")
                    //$("#status").text("Er is iets verkeerd gegaan.");
	                //$("#status").addClass("alert-danger");
				}
	        }
		});
	}
}

function handleNewImage()
{
	var formData = new FormData(document.getElementById("imageDataForm"));

    $.ajax(
	{
		url: "../../projectapi/addprojectimage",
        type: "POST",
        data: formData,
        async: true,
        contentType: false,
        processData: false,
        success: function(result)
        {
	        // Check if it went alright.
	        if (result == 0)
	        {
	        	alert("De afbeelding is succesvol toegevoegd.");
	        }
	        else
	        {
	        	alert("Er is iets verkeerd gegaan.");
	        }

	     	// Reload the page.
        	location.reload();
        }
	});
}

function handleDeleteImage(imagePath)
{
	if (confirm("Weet u zeker dat u deze afbeelding wilt verwijderen?"))
	{
		imageName = imagePath.substring(imagePath.lastIndexOf("/") + 1);

	
		var data =
		{
			projectId: $("#id").val(),
	    	imageName: imageName
		};
	
		$.ajax(
		{
			url: "../../projectapi/deleteprojectimage",
	        type: "POST",
	        data: data,
	        async: true,
	        success: function(result)
	        {
	        	// Check if it went alright.
		        if (result == 0)
		        {
		        	alert("De afbeelding is succesvol verwijderd.");
                    //$("#status").text("De afbeelding is succesvol verwijderd.");
                    //$("#status").addClass("alert-success");
		        }
		        else
		        {
                    alert("Er is iets verkeerd gegaan.");
                    //$("#status").text("Er is iets verkeerd gegaan.");
                    //$("#status").addClass("alert-danger");
		        }
	
		     	// Reload the page.
	        	location.reload();
	        }
		});
	}
}

$(document).ready(function()
{
	$("#addImageButton").click(function()
	{
		$("#fileInput").trigger("click");
	});

	$("#fileInput").change(function()
	{
		$("#previewImageDiv").removeClass("hidden");
		showImage(this);
	});

	function showImage(input)
	{
        if (input.files && input.files[0])
		{
			var reader = new FileReader();
			
			reader.onload = function(e)
			{
				// Reset the image.
				$("#image").html("<img id='image'>");
				$("#image").attr("src", e.target.result);
				$("#image").css("width", "auto");
				$("#image").css("max-width", "100%");
				$("#image").css("max-height", "500px");
            }
			reader.readAsDataURL(input.files[0]);
		}
	}
});

$('#projectform').idealforms({

    silentLoad: true,

    rules: {
        'title': 'required',
        'description': 'required'
        //'phone': 'required'
    },


    //When submit is pressed catch the event.
    onSubmit: function(invalid,event) {

        // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
        if (invalid > 0) {
            event.preventDefault();
            $('#invalid').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
        } else {
            $('#invalid').hide();
        }
    }

});

$('#projectform').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

