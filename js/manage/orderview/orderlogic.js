$('#orderForm').idealforms({

    silentLoad: true,

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

//Function to be called when form is submitted.
function updateOrder()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var data =
        {
            modelName: 'OrderOverviewViewModel',
            id: $('#id').val(),
            isPayed: ($("#isPayed").is(":checked") == false ? 0 : 1),
            status: $('#status option:selected').val(),
            deliveryMethod: $('#deliveryMethod option:selected').val(),
            payMethod: $('#payMethod option:selected').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'ordermanageapi/update',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    $("#status").text("Success");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

//Function to be called when delete button is pressed.
function deleteOrder()
{
    if(confirm("Weet u zeker dat u wilt verwijderen?"))
    {
        var data =
        {
            modelName:  'OrderOverviewViewModel',
            id:         $("#id").val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'ordermanageapi/delete',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    var successMessage = "Order is succesvol verwijderd.";
                    localStorage.setItem("successMessage", successMessage);
                    document.location.href = getBaseURL() + 'manage/orderoverview';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}
