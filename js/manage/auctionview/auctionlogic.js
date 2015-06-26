//Initialize ideal forms
$('#updateForm').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'startDate': 'required date:yyyy-mm-dd dateFunc:0',
        'endDate': 'required date:yyyy-mm-dd dateFunc:0'
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
//$('.datepickerStart').datepicker().val($('.datepickerStart').data('startdate')).trigger('change');
//$('.datepickerEnd').datepicker().val($('.datepickerEnd').data('enddate')).trigger('change');

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

//extended date validation
var originalStart = "";
var originalEnd = "";

var occupied_ranges = [];
$.getJSON("/SOSRommelmarkt/auctionapi/dateRanges", "", function(data)
{
    occupied_ranges = data;
    originalStart = new Date($('#startDate').data('startdate'));
    originalEnd = new Date($('#endDate').data('enddate'));

    console.log(originalEnd);
    console.log(originalStart);

    var i = 0;
    var toRemove = -1;
    for(i = 0; i < occupied_ranges.length; i++)
    {
        var start = new Date(occupied_ranges[i].start);
        var end = new Date(occupied_ranges[i].end);

        console.log(start + ' - ' + originalStart);
        console.log(end  + ' - ' +  originalEnd)

        if(start.getTime() == originalStart.getTime() && end.getTime() == originalEnd.getTime())
        {
            toRemove = i;
        }
    }
    if(toRemove >= 0)
    {
        occupied_ranges.splice(toRemove, 1);
    }

    $('#startDate').val(originalStart.toISOString().substring(0,10));
    $('#endDate').val(originalEnd.toISOString().substring(0,10));
});

function isValidRange(_begin, _end)
{
    if(_begin == "" || _end == "") { return false; } //no date, no bueno.

    var start = new Date(_begin);
    var end = new Date(_end);

    var i = 0;
    for(i = 0; i < occupied_ranges.length; i++)
    {
        var startExisting = new Date(occupied_ranges[i].start);
        var finishExisting = new Date(occupied_ranges[i].end);

        // als begin en einde niet allebij VOOR de START van de periode vallen
        // OF als begin en einde niet allebij NA de FINISH van de periode vallen.
        if((!(start < startExisting) && !(end < startExisting)) && (!(start > finishExisting) && !(end > finishExisting)))
        {
            alert('De periode die je ingevoert hebt, is al (deels) bezet door een andere vitrine.');
            return false;
        }
    }

    if(start >= end)
    {
        alert('De einddatum moet NA de begindatum komen.');
        return false;
    }

    return true;
}

$.extend($.idealforms.rules,
    {
        dateFunc: function(input, value)
        {
            var currId = $(input).attr('id');
            var otherId = "";
            if(currId == "startDate")
            {
                otherId = "endDate";
            }
            else if (currId == "endDate")
            {
                otherId = "startDate";
            }

            var start = $('#startDate').val();
            var end = $('#endDate').val();
            var result = isValidRange(start, end);

            if(result) // if VALID, re-evaluate the other one too
            {
                //but ONLY if the other one is INVALID. This prevents endless loops.
                var other = $('.invalid').find('input');
                var temp = other.val();
                other.val('');
                other.trigger('keyup');
                other.val(temp); //dirty refresh
                other.trigger('keyup');
            }

            return result;
        }
    });
$.extend($.idealforms.errors,
    {
        dateFunc: "Een of beide datums vallen binnen een al bestaande vitrine-periode."
    });

//END extended date validation

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
