function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

//Initialize ideal forms
$('#product_add').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'name': 'required name max:64',
        'description': 'required minmax:20:500',
        'price': 'required price',
        'colorCode': 'select:default',
        'picture': 'extension:jpg'
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

function addShopProduct()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        ResetStatus();

        var data =
        {
            modelName: 'ShopProduct',
            name: $('#name').val(),
            description: $('#description').val(),
            price: $('#price').val(),
            colorCode: $('#colorCode').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'shopproductapi/add',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    document.location.href = getBaseURL() + 'manage/shopproductoverview'; //TODO: redirect naar nieuwe product pagina om fotos toe te voegen + success message
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}
