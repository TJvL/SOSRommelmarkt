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
		ResetStatus();
		
		var data =
		{
            modelName:      'Project',
	    	id:				$("#id").val(),
	    	title:			$("#title").val(),
	    	description:	$("#description").val()
		};
		
	    $.ajax(
		{
			url: getBaseURL() + "projectapi/update",
	        type: "POST",
	        data: data,
            success: function () {
                $("#status").text("Projectgegevens succesvol gewijzigd.");
                $("#status").addClass("alert-success");
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
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
            modelName:  'Project',
			id:         $("#id").val()
		};
	
		$.ajax(
		{
			url: getBaseURL() + "projectapi/delete",
	        type: "POST",
	        data: data,
            success: function () {
                document.location.href = getBaseURL() + 'manage/projects';
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
		});
	}
}

function handleNewImage()
{
	var formData = new FormData(document.getElementById("imageDataForm"));

    $.ajax(
	{
		url: getBaseURL() + "projectapi/addimage",
        type: "POST",
        data: formData,
        async: true,
        contentType: false,
        processData: false,
        success: function () {
            var successMessage = "De afbeelding is succesvol toegevoegd.";
            localStorage.setItem("successMessage", successMessage);
            location.reload();
        },
        error: function (status) {
            $("#status").text(status.status + ": " + translateHttpError(status.statusText));
            $("#status").addClass("alert-danger");
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
        console.log(data);
	
		$.ajax(
		{
			url: getBaseURL() + "projectapi/deleteimage",
	        type: "POST",
	        data: data,
            success: function () {
                var successMessage = "De afbeelding is succesvol verwijderd.";
                localStorage.setItem("successMessage", successMessage);
                location.reload();
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
    if(localStorage.getItem("successMessage")!=null){
        $("#status").text(localStorage.getItem("successMessage"));
        $("#status").addClass("alert-success");
        localStorage.clear();
    }

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

