//Initialize ideal forms
$('#sloganForm').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'slogan': 'required minmax:10:200'
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
$('#sloganForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

function addSlogan()
{
    if(confirm("Weet u zeker dat u wilt opslaan?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var data =
        {
            modelName: 'Slogan',
            slogan: $('#slogan').val()
        };

        $.ajax(
            {
                url: getBaseURL() + 'sloganapi/add',
                type: 'POST',
                data: data,
                async: true,
                success: function () {
                    document.location.href = getBaseURL() + 'manage/sloganoverview';
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}
