//Initialize ideal forms
$('#updateForm').idealforms({

    // Do not select the first input field and show error message.
    silentLoad: true,

    //Add rules for the input fields
    rules: {
        'name': 'required name',
        'description': 'required minmax:20:500',
        'colorCode': 'select:default'
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
$('#updateForm').find('input, select, textarea').on('change keyup', function() {
    $('#invalid').hide();
});

$(window).load(function() {

    boxes = $('.thumbnail');
    maxHeight = Math.max.apply(
        Math, boxes.map(function () {
            return $(this).height();
        }).get());
    boxes.height(maxHeight);

});

function ResetStatus()
{
    $("#status").text("");
    $("#status").removeClass("alert-warning alert-danger alert-success");
}

function handleUpdateProduct()
{
    if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
    {
        ResetStatus();

        var data =
        {
            modelName:      'AuctionProduct',
            id:				$("#id").val(),
            name:			$("#name").val(),
            description:	$("#description").val(),
            colorCode:      $('#colorCode').val()
        };

        $.ajax(
            {
                url: getBaseURL() + "auctionproductapi/update",
                type: "POST",
                data: data,
                async: true,
                success: function () {
                    $("#status").text("Productgegevens succesvol gewijzigd.");
                    $("#status").addClass("alert-success");
                },
                error: function (status) {
                    $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                    $("#status").addClass("alert-danger");
                }
            });
    }
}

function handleDeleteProduct()
{
    if (confirm("Weet u zeker dat u dit product wilt verwijderen?"))
    {
        var data =
        {
            modelName:  'AuctionProduct',
            id:         $('#id').val()
        };
    }

    $.ajax(
        {
            url: getBaseURL() +  "auctionproductapi/delete",
            type: "POST",
            data: data,
            async: true,
            success: function () {
                document.location.href = getBaseURL() + 'manage/auctionoverview'; //TODO link naar huidige veiling
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}

function handleNewImage()
{
    var formData = new FormData(document.getElementById("imageForm"));

    $.ajax(
        {
            url: getBaseURL() + "auctionproductapi/addimage",
            type: "POST",
            data: formData,
            async: true,
            contentType: false,
            processData: false,
            success: function () {
                var successMessage = "De afbeelding is succesvol toegevoegd.";
                localStorage.setItem("successMessage", successMessage);
                location.reload();
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}

function handleDeleteImage(imagePath)
{
    if (confirm("Weet u zeker dat u deze afbeelding wilt verwijderen?"))
    {
        imageName = imagePath.substring(imagePath.lastIndexOf("/") + 1);

        var data =
        {
            id: $('#id').val(),
            imageName: imageName
        };
    };

    $.ajax(
        {
            url: getBaseURL() + "auctionproductapi/deleteimage",
            type: "POST",
            data: data,
            async: true,
            success: function () {
                var successMessage = "De afbeelding is succesvol verwijderd.";
                localStorage.setItem("successMessage", successMessage);
                location.reload();
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });

}

$(document).ready(function()
{
    if(localStorage.getItem("successMessage")!=null){
        $("#status").text(localStorage.getItem("successMessage"));
        $("#status").addClass("alert-success");
        localStorage.clear();
    }

    $("#addImageButton").click(function()
    {
        $("#fileInput").trigger("click");
    });

    $("#fileInput").change(function()
    {
        $("#cropperDiv").removeClass("hidden");
        showImage(this);

        // Once the image is loaded start up the cropper.
        $("#image").load(function()
        {
            // Get the original width and height.
            var originalWidth = document.getElementById("image").naturalWidth;
            var originalHeight = document.getElementById("image").naturalHeight;
            $("#originalWidth").val(originalWidth.toString());
            $("#originalHeight").val(originalHeight.toString());

            // Init a new cropper object for this image.
            var cropper;
            cropper = new Cropper(document.getElementById("image"),
                {
                    //Define aspect ratio for the crop box
                    ratio:
                    {
                        width:1,
                        height:1
                    },
                    update: function(data)
                    {
                        $("#xCoord").val(data.x);
                        $("#yCoord").val(data.y);
                        $("#width").val(data.width);
                        $("#height").val(data.height);

                        var clientWidth = document.getElementById("image").clientWidth;
                        var clientHeight = document.getElementById("image").clientHeight;
                        $("#clientWidth").val(clientWidth.toString());
                        $("#clientHeight").val(clientHeight.toString());
                    }
                });
        });
    });

    function showImage(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function(e)
            {
                // Reset the image.
                $("#image").html("<img id='image'>");
                $("#image").attr("src", e.target.result);
                $("#image").css("width", "auto");
                $("#image").css("max-width", "100%");
                $("#image").css("max-height", "500px");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
});
