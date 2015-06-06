//Initialize ideal forms
$('#product_add').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'name': 'required name',
        'description': 'required minmax:20:500',
        'colorCode': 'select:default'
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

//Prompts idealforms to show the next step in the form.
$('.prev').click(function(){
    $('.prev').show();
    $('form.idealforms').idealforms('prevStep');
});
//Prompts idealforms to show the previous step in the form.
$('.next').click(function(){
    $('.next').show();
    $('form.idealforms').idealforms('nextStep');
});

function addAuctionProduct()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var data =
        {
            modelName: 'AuctionProduct',
            name: $('#name').val(),
            description: $('#description').val(),
            colorCode: $('#colorCode').val(),
            auctionId: $('#auctionId').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'auctionproductapi/add',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    document.location.href = getBaseURL() + 'manage/auctionoverview'; //TODO: redirect naar nieuwe product pagina om fotos toe te voegen + success message
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}
