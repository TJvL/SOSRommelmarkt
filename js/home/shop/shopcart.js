function addProductToCart(product)
{
    if(product.isReserved)
    {
        alert("Dit product is gereserveed door iemand.");
        return;
    }

    var data =
    {
        modelName:      'ShopProduct',
        id:				product.id,
        name:           product.name,
        description:    product.description,
        addedBy:        product.addedBy,
        colorCode:      product.colorCode,
        imagePath:      product.imagePath,
        imagePaths:     product.imagePaths,
        price:          product.price,
        isReserved:     product.isReserved
    };

    $.ajax(
        {
            url: getBaseURL() + "cartapi/additem",
            type: "POST",
            data: data,
            async: true,
            success: function () {
                refreshCart()
                //$("#status").text("Productgegevens succesvol gewijzigd.");
                //$("#status").addClass("alert-success");
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}


