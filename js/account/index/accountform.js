$('#accountForm').idealforms({

    silentLoad: true,

    rules: {
        'username': 'required username',
        'email': 'required email',
        'oldPassword': 'required',
        'newPassword': 'pass',
        'confirmPassword': 'pass equalto:newPassword'
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

$('#accountForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});
