//Initialize ideal forms
$('#auction_add').idealforms({

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