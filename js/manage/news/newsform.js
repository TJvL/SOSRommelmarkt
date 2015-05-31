//Initialize ideal forms
$('#news_update').idealforms({

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
$('#news_add').find('input, select, textarea').on('change keyup', function() {
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
