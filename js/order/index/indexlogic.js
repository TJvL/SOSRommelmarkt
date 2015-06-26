function addNewOrder()
{
    $.ajax({
        url: getBaseURL() + 'cartapi/get',
        type: "GET",
        success: function (data) {

            var data =
            {
                modelName: 'NewOrderViewModel',
                orderProducts: data
            };

            $.ajax(
                {
                    url: getBaseURL() + 'orderplacementapi/startnew',
                    type: 'POST',
                    data: data,
                    async: true,
                    success: function () {
                        window.location = getBaseURL() + "order/address";
                    },
                    error: function (status) {
                        $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                        $("#status").addClass("alert-danger");
                    }
                });

        }
    });

}



