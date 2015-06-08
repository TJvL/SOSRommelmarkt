$(document).ready( function () {
    if(localStorage.getItem("successMessage")!=null){
        $("#status").text(localStorage.getItem("successMessage"));
        $("#status").addClass("alert-success");
        localStorage.clear();
    }

	$('#auctionProductTable').DataTable();
} );

function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}



function deleteAuctionProduct($auctionProductId)
{
	if (confirm("Weet u zeker dat u dit product uit de veiling wilt verwijderen?"))
	{
		var data = 
		{
				id: $auctionProductId
		};

		$.ajax(
		{
			url: "../auctionproductview/delete",
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
					alert("Dit product kan niet worden verwijderd.");
				}

				location.reload();
			}
		});
	}
}