$('#contactform').idealforms({

    silentLoad: true,

    rules: {
        'name': 'required',
        'lastname': 'required',
        'companyname': 'required',
        'kvknr': 'required',
        'street': 'required',
        'zip': 'required',
        'place': 'required',
        'phone': 'required',
        'gsm': 'required',
        'fax': 'required',
        'email': 'required',
        'explanation': 'required minmax:50:200',
        'planned_activities': 'required minmax:50:200',
        'intended_results': 'required minmax:50:200'
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

$('#contactform').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});
