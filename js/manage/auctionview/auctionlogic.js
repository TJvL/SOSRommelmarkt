//Initialize ideal forms
$('#updateForm').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'startDate': 'required date:yyyy-mm-dd',
        'endDate': 'required date:yyyy-mm-dd'
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
$('#aution_add').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

$('.datepicker').datepicker('option', 'dateFormat', 'yy-mm-dd');
$('.datepickerStart').datepicker().val($('.datepickerStart').data('startdate')).trigger('change');
$('.datepickerEnd').datepicker().val($('.datepickerEnd').data('enddate')).trigger('change');

function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

function handleUpdateAuction()
{
    if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
    {
        ResetStatus();

        var data =
        {
            modelName:  'Auction',
            id:         $('#id').val(),
            startDate:  $('#startDate').val(),
            endDate:    $('#endDate').val()
        };

        console.log(data);

        $.ajax(
            {
                url: getBaseURL() + "auctionapi/update",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                    $("#status").text("Vitrinegegevens succesvol gewijzigd.");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

function handleDeleteAuction()
{
    if (confirm("Weet u zeker dat u dit product wilt verwijderen?"))
    {
        var data =
        {
            modelName:  'Auction',
            id:         $('#id').val()
        };
    }

    $.ajax(
        {
            url: getBaseURL() +  "auctionapi/delete",
            type: "POST",
            data: data,
            async: true,
            success: function () {
                var successMessage = "De vitrine is succesvol verwijderd.";
                localStorage.setItem("successMessage", successMessage);
                document.location.href = getBaseURL() + 'manage/auctionoverview';
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}
