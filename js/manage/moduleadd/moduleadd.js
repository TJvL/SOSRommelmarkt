function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

//Initialize ideal forms
$('#moduleForm').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'reference': 'required'
        //'description': 'required minmax:20:500',
        //'price': 'required price',
        //'colorCode': 'select:default',
        //'picture': 'extension:jpg'
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

//Checks input fields and show message on bottom after every user input.
$('#product_add').find('input, select, textarea').on('change keyup', function() {
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

function addModule()
{
    if(confirm("Weet u zeker dat u deze module wilt toevoegen?"))
    {
        ResetStatus();

        var data =
        {
            modelName: 'Module',
            heading: $('#module-heading').val(),
            content: $('#module-content').val(),
            category: $('#module-category').val(),
            reference: $('#module-reference').val(),
            reference_label: $('#module-reference-label').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'pagecontentapi/addmodule',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    if($('#module-category').val() == "home"){
                        var successMessage = "Home module succesvol toegevoegd.";
                        localStorage.setItem("successMessage", successMessage);
                    }
                    else if($('#module-category').val() == "aboutus"){
                        var successMessage = "Over ons module succesvol toegevoegd.";
                        localStorage.setItem("successMessage", successMessage);
                    }
                    document.location.href = getBaseURL() + 'manage/pagecontentoverview#tab_' + $('#module-category').val() + '-modules';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}
