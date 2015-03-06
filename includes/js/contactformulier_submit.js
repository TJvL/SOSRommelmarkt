$('form.idealforms').idealforms({

    silentLoad: false,

    rules: {
        'username': 'required username ajax',
        'name': 'required name',
        'kvknr': 'required kvknr',
        'straatnaam': 'required straatnaam',
        'van': 'required van',
        'naar': 'required naar',
        'lname': 'required lname',
        'email': 'required email',
        'password': 'required pass',
        'confirmpass': 'required equalto:password',
        'date': 'required date',
        'picture': 'required extension:jpg:png',
        'website': 'url',
        'hobbies[]': 'minoption:2 maxoption:3',
        'phone': 'required phone',
        'zip': 'required zip',
        'options': 'select:default',
        'bedrijfsnaam': 'required bedrijfsnaam'
    },


    onSubmit: function(invalid, e) {
        e.preventDefault();
        $('#invalid')
            .show()
            .toggleClass('valid', ! invalid)
            .text(invalid ? (invalid +' invalid fields') : 'All good!');
    }
});

$('form.idealforms').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

$('form.idealforms').idealforms('addRules', {
    'comments': 'required minmax:50:200'
});

$('.prev').click(function(){
    $('.prev').show();
    $('form.idealforms').idealforms('prevStep');
});
$('.next').click(function(){
    $('.next').show();
    $('form.idealforms').idealforms('nextStep');
});