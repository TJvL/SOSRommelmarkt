$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var when = $("#when_running").val();
        var startDate = new Date(data[0]); // use data for the age column
        var endDate = new Date(data[1]);
        var now = new Date();

        if(when == "before")
        {
            if(endDate < now)
            {
                return true;
            }
        }
        else if(when == "after")
        {
            if(startDate > now)
            {
                return true;
            }
        }
        else if(when == "now")
        {
            if(startDate < now && endDate > now)
            {
                return true;
            }
        }
        else if(when == "all")
        {
            return true;
        }
        return false;
    }
);

$(document).ready( function () {
    if(localStorage.getItem("successMessage")!=null){
        $("#status").text(localStorage.getItem("successMessage"));
        $("#status").addClass("alert-success");
        localStorage.clear();
    }

    var dropDown = $(
        '<div id="auctionTable_dropdown" class="">' +
        '<label> Vitrine is:  ' +
        '<select id="when_running">' +
        '<option value="before">afgelopen</option>' +
        '<option value="after">nog niet gestart</option>' +
        '<option value="now">nu bezig</option>' +
        '<option value="all" selected="selected">laat alles zien</option>' +
        '</select>' +
        '</label>' +
        '</div>'
    );

    var table = $('#auctionTable').DataTable(
        {
            initComplete: function ()
            {
                $('#auctionTable_wrapper').prepend(dropDown);
            }
        });

    table.draw();

    $('#when_running').change(function()
    {
        table.draw();
    });
} );

