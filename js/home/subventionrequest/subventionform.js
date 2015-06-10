$('#subventionForm').idealforms({

    silentLoad: true,

    rules: {
        'name': 'required',
        'lastname': 'required',
        'firm': 'required',
        'address': 'required',
        'postalcode': 'required',
        'city': 'required',
        'phonenumber1': 'required',
        'phonenumber2': '',
        'fax': '',
        'email': 'required email',
        'elucidation': 'required minmax:50:200',
        'activities': 'required minmax:50:200',
        'results': 'required minmax:50:200',
        'files[]': 'extension:pdf:doc:docx:odt:html:htm'
    },

    //When submit is pressed catch the event.
    onSubmit: function(invalid, event)
    {
        // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
        if (invalid > 0)
        {
            event.preventDefault();
            $('#invalid').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
        }
        else
        {
            $('#invalid').hide();
        }
    }
});

$('#subventionForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

$('.prev').click(function(){
    $('.prev').show();
    $('form.idealforms').idealforms('prevStep');
});

$('.next').click(function(){
    $('.next').show();
    $('form.idealforms').idealforms('nextStep');
});

//Function to be called when form is submitted.
function addSubvention()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var formData = new FormData($("#subventionForm")[0]);

        $.ajax(
            {
                url: getBaseURL() + "subventionapi/add",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                async: true,
                success: function () {
                    document.location.href = getBaseURL() + 'home/subventionsuccesspage';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

$("#addFileFieldButton").click(function()
{
	$('#subventionForm').idealforms('addFields',
	{
		'files[]':
		{
			type: 'file',
			label: 'Bestand',
			rules: 'extension:pdf:doc:docx:odt:html:htm',
			before: "addFileFieldButton"
		}
	});
	
	$('form.idealforms').idealforms('lastStep');
});