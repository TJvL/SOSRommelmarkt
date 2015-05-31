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
        'phonenumber2': 'required',
        'fax': 'required',
        'email': 'required',
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
            
            var data = new FormData($("#subventionForm")[0]);
            
            jQuery.ajax(
            {
                url: "../subventionapi/createsubventionrequest",
                data: data,
                contentType: false,
                processData: false,
                type: "POST",
                success: function(data)
                {
                	if (data === 0)
                		window.location.href = "successpage";
                	else
                		alert("Er is iets verkeerd gegaan.")
                }
            });
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