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

	$('#sloganTable').DataTable({
		"columnDefs": [{
			"width": "7em", "targets": 1
		}],
		"ordering": false
	});
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
    });

});

function ResetStatus()
{
    $("#statuscompanyinformation").text("");
    $("#statuscompanyinformation").removeClass("alert-warning alert-danger alert-success");
    $("#statusvisitinghours").text("");
    $("#statusvisitinghours").removeClass("alert-warning alert-danger alert-success");
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
                url: getBaseURL() + "pagecontentapi/updatecompanyinformation",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                    var successMessage = "Adresgegevens succesvol gewijzigd.";
                    localStorage.setItem("successMessage", successMessage);
                    location.reload();
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
                url: getBaseURL() + "pagecontentapi/updatevisitinghours",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                    $("#statusvisitinghours").text("Openingstijden succesvol gewijzigd.");
                    $("#statusvisitinghours").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}