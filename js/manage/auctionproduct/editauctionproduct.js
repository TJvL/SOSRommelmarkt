function handleUpdateProduct()
{
    if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
    {
        // Reset status message.
        $("#status").text("");
        $("#status").removeClass("alert-success alert-danger");

        var formData =
        {
            id:				$("#id").val(),
            name:			$("#name").val(),
            description:	$("#description").val(),
            colorCode:		$("#colorCode option:selected").val()
        };
        console.log(formData);

        $.ajax(
            {
                url: "../update",
                type: "POST",
                data: formData,
                async: true,
                contentType: false,
                processData: false,
                success: function(result)
                {
                    // Check if it went alright.
                    if (result == 0)
                    {
                        $("#status").text("  Succes!");
                        $("#status").addClass("alert-success");
                        alert("succes");
                    }
                    else
                    {
                        $("#status").text("  Er is iets verkeerd gegaan");
                        $("#status").addClass("alert-danger");
                        alert("fail");
                    }
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

            id: $('#productId').val()
        };
    }

    $.ajax(
        {
            url: "delete",
            type: "POST",
            data: data,
            async: true,
            success: function(result)
            {
                // Check if it went alright.
                if (result == 0)
                {
                    alert("Success");
                }
                else
                {
                    alert("fail");
                }
            }
        });
}

function handleNewImage()
{
    var formData = new FormData(document.getElementById("imageForm"));

    $.ajax(
        {
            url: "addImage",
            type: "POST",
            data: formData,
            async: true,
            contentType: false,
            processData: false,
            success: function(result)
            {
                // Check if it went alright.
                if (result == 0)
                {
                    alert("Success");
                }
                else
                {
                    alert("fail");
                }

                // Reload the page.
                location.reload();
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
            id: $('#productId').val(),
            imageName: imageName
        };
    };

    $.ajax(
        {
            url: "deleteImage",
            type: "POST",
            data: data,
            async: true,
            success: function(result)
            {
                // Check if it went alright.
                if (result == 0)
                {
                    alert("Success");
                }
                else
                {
                    alert("fail");
                }

                // Reload the page.
                location.reload();
            }
        });

}

$(document).ready(function()
{
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

