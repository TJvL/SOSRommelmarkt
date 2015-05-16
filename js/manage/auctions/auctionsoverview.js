$(document).ready( function () {
    $('#auctionTable').DataTable();
} );

function deleteAuction($auctionId)
{
    if (confirm("Weet u zeker dat u deze veiling wilt verwijderen?"))
    {
        var data =
        {
            auctionId: $auctionId
        };

        $.ajax(
            {
                url: "/SOSRommelmarkt/manage/auctions/delete",
                type: "POST",
                data: data,
                async: true,
                success: function(result)
                {
                    if (result == 0)
                    {
                        // OK
                    }
                    else
                    {
                        alert("Deze veiling kan niet worden verwijderd.");
                    }

                    document.location.href = "./auctions";
                }
            });
    }
}