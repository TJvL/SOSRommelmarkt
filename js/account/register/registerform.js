$('#registerForm').idealforms({

    silentLoad: true,

    rules: {
        'username': 'required username ajax',
        'email': 'required email ajax',
        'emailConfirm': 'required equalto:email',
        'password': 'required pass',
        'passwordConfirm': 'required pass equalto:password'
    },

    errors: {
        'username': {
            ajax: 'Gebruikersnaam beschikbaarheid wordt gecontroleerd...',
            ajaxError: 'Gebruikersnaam niet beschikbaar!'
        },
        'email': {
            ajax: 'Email beschikbaarheid wordt gecontroleerd...',
            ajaxError: 'Email is al gebruikt!'
        }
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

$('#registerForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

