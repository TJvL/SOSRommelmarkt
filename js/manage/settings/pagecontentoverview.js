$('#companyinformationform').idealforms({

    silentLoad: true,

    rules: {
        'address': 'required',
        'city': 'required',
        'postalcode': 'required',
        'phone': 'required',
        'email': 'required email'
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

$('#companyinformationform').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

$('#visitinghoursform').idealforms({

    silentLoad: true,

    rules: {
        'monday': 'required',
        'tuesday': 'required',
        'wednesday': 'required',
        'thursday': 'required',
        'friday': 'required',
        'saturday': 'required',
        'sunday': 'required'
    },


    //When submit is pressed catch the event.
    onSubmit: function(invalid,event) {

        // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
        if (invalid > 0) {
            event.preventDefault();
            $('#invalidvisitinghours').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
        } else {
            $('#invalidvisitinghours').hide();
        }
    }

});

$("#backgroundForm").idealforms(
{
    silentLoad: true,

    rules:
    {
    	'image': 'extension:jpg:jpeg:bmp:png:gif'
    },

    //When submit is pressed catch the event.
    onSubmit: function(invalid,event)
    {
        // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
        if (invalid > 0)
        {
            event.preventDefault();
            $('#invalidBackground').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
        } else
        {
            $('#invalidBackground').hide();
        }
    }
});

$('#visitinghoursform').find('input, select, textarea').on('change keyup', function() {
    $('#invalidvisitinghours').hide();
});

$(document).ready(function() {
    if(localStorage.getItem("successMessage")!=null){
        if(localStorage.getItem("successMessage")== "Adresgegevens succesvol gewijzigd."){
            $("#statuscompanyinformation").text(localStorage.getItem("successMessage"));
            $("#statuscompanyinformation").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Home module succesvol toegevoegd."){
            $("#statushomemodules").text(localStorage.getItem("successMessage"));
            $("#statushomemodules").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Over ons module succesvol toegevoegd."){
            $("#statusaboutusmodules").text(localStorage.getItem("successMessage"));
            $("#statusaboutusmodules").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Home module succesvol verwijderd."){
            $("#statushomemodules").text(localStorage.getItem("successMessage"));
            $("#statushomemodules").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Over ons module succesvol verwijderd."){
            $("#statusaboutusmodules").text(localStorage.getItem("successMessage"));
            $("#statusaboutusmodules").addClass("alert-success");
        }
        localStorage.clear();
    }

	$('#homeTable').DataTable({
		"columnDefs": [{
			"width": "7em", "targets": 1
		}],
		"ordering": false
	});
	$('#aboutusTable').DataTable({
		"columnDefs": [{
			"width": "7em", "targets": 1
		}],
		"ordering": false
	});

    var hash = document.location.hash;
    var prefix = "tab_"; // prevents the page from scrolling
    if (hash) {
        $('.nav-tabs a[href='+hash.replace(prefix,"")+']').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
        $('.idealforms').resize();
    });
});

function ResetStatus()
{
    $("#statuscompanyinformation").text("");
    $("#statuscompanyinformation").removeClass("alert-warning alert-danger alert-success");
    $("#statusvisitinghours").text("");
    $("#statusvisitinghours").removeClass("alert-warning alert-danger alert-success");
    $("#statusBackground").text("");
    $("#statusBackground").removeClass("alert-warning alert-danger alert-success");
}

function UpdateCompanyInformation()
{
    if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
    {
        ResetStatus();

        var data =
        {
            modelName:          'CompanyInformation',
            id:					$('#companyInformationId').val(),
            phone:			    $('#phone').val(),
            email:			    $('#email').val(),
            address:			$('#address').val(),
            city:			    $('#city').val(),
            postalcode:	        $('#postalcode').val()
        };

        $.ajax(
            {
                url: getBaseURL() + "settingsapi/updatecompanyinformation",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                	$("#statuscompanyinformation").text("Adresgegevens succesvol gewijzigd.");
                    $("#statuscompanyinformation").addClass("alert-success");
                },
                error: function (status) {
                    $("#statuscompanyinformation").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#statuscompanyinformation").addClass("alert-danger");
                }
            });
    }
}

function UpdateVisitinghours()
{
    if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
    {
        ResetStatus();

        var data =
        {
            modelName:  'VisitingHours',
            id:			$('#visitinghoursId').val(),
            monday:	    $('#monday').val(),
            tuesday:	$('#tuesday').val(),
            wednesday:	$('#wednesday').val(),
            thursday:	$('#thursday').val(),
            friday:     $('#friday').val(),
            saturday:   $('#saturday').val(),
            sunday:	    $('#sunday').val()
        };

        $.ajax(
            {
                url: getBaseURL() + "settingsapi/updatevisitinghours",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                    $("#statusvisitinghours").text("Openingstijden succesvol gewijzigd.");
                    $("#statusvisitinghours").addClass("alert-success");
                },
                error: function (status) {
                    $("#statusvisitinghours").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#statusvisitinghours").addClass("alert-danger");
                }
            });
    }
}

function UpdateBackground()
{
	if (confirm("Weet u zeker dat de achtergrond wilt wijzigen?"))
	{
		ResetStatus()
		
		// Check if the image is set.
		if ($("#image").val() === "")
		{
			$("#status").text("Er is geen afbeelding geselecteerd.");
			$("#status").addClass("alert-warning");
	        
			return;
		}
		
		var data = new FormData();
		data.append("image", $("#image")[0].files[0]);
		
		$.ajax(
		{
			url: getBaseURL() + "settingsapi/updatebackground",
			type: "POST",
	        data: data,
	        async: false,
	        contentType: false,
	        processData: false,
            success: function()
            {
            	 $("#statusBackground").text("Achtergrond succesvol gewijzigd.");
                 $("#statusBackground").addClass("alert-success");
            },
            error: function (status)
            {
                $("#statusBackground").text(status.status + ": " + translateHttpError(status.statusText));
                $("#statusBackground").addClass("alert-danger");
                console.log("fail");
            }
		});
	}
}

//For previewing the image.
$("#image").change(function()
{
	ResetStatus();
	
	// Check if the file has an image extension.
	if (!IsImage($("#image").val()))
	{
		$("#statusBackground").text("Het bestand dat u probeert te gebruiken is geen afbeelding.");
        $("#statusBackground").addClass("alert-warning");
        
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

$(window).load(function() {
    Resize();
});