//Initialize ideal forms
$('#newsForm').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'heading': 'required',
        'content': 'required minmax:20:500',
        'create_date': 'required date:dd-mm-yyyy',
        'expiration_date': 'required date:dd-mm-yyyy'
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

// set datepicker format
//$('.datepicker').datepicker({
//	dateFormat: "dd-mm-yy"
//});
$('.datepicker').datepicker('option', 'dateFormat', 'dd-mm-yy');

//Checks input fields and show message on bottom after every user input.
$('#newsForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

//Function to be called when form is submitted.
function updateNews()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var data =
        {
            modelName: 'News',
            id: $('#id').val(),
            heading: $('#heading').val(),
            content: $('#content').val(),
            expiration_date: $('#expiration-date').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'newsapi/update',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    $("#status").text("Success");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + status.statusText);
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

//Function to be called when delete button is pressed.
function deleteNews()
{
    if(confirm("Weet u zeker dat u wilt verwijderen?"))
    {
        var data =
        {
            modelName:  'News',
            id:         $("#id").val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'newsapi/delete',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    document.location.href = getBaseURL() + 'manage/newsoverview';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + status.statusText);
                    $("#status").addClass("alert-danger");
                }
            });
    }
}