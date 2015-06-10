
//filter function
$(".filterButton").click(function(){
//   get the clicked buttons status
    var selected = ($(this.id).selector);

    $( ".list-group-item" ).each(function(){

       if(selected == "alles")
       {
           $(this).show();

       }
        else
       {
           $(this).hide();

           if($(this.id).selector == selected)
           {
               console.log("test");
               $(this).show();
           }
       }

    });

});

$('#deletesubventionForm').idealforms({

    silentLoad: true,

    //When submit is pressed catch the event.
    onSubmit: function(invalid, event)
    {
        // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
        if (!confirm("Weet je zeker dat je deze aanvraag wilt verwijderen?"))
        {
            event.preventDefault();
        }
        else
        {


            var data = new FormData($("#deletesubventionForm")[0]);

            jQuery.ajax(
                {
                    url: "../subventionapi/deletesubventionrequest",
                    data: data,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data)
                    {
                        if (data === 0)
                            window.location.href = "subventions";
                        else
                            alert("Er is iets verkeerd gegaan.")
                    }
                });
        }
    }
});

//
////i know this is ugly but pretty low priority
//    function post(path, params, method) {
//        method = method || "post"; // Set method to post by default if not specified.
//
//        // The rest of this code assumes you are not using a library.
//        // It can be made less wordy if you use one.
//        var form = document.createElement("form");
//        form.setAttribute("method", method);
//        form.setAttribute("action", path);
//
//        for (var key in params) {
//            if (params.hasOwnProperty(key)) {
//                var hiddenField = document.createElement("input");
//                hiddenField.setAttribute("type", "hidden");
//                hiddenField.setAttribute("name", key);
//                hiddenField.setAttribute("value", params[key]);
//
//                form.appendChild(hiddenField);
//            }
//        }
//        document.body.appendChild(form);
//        form.submit();
//    }


    //function delete_sub(clicked_id) {
    //    var x;
    //    if (confirm("Weet je zeker dat je deze aanvraag wilt verwijderen?") == true) {
    //        post('../subventionapi/deletesubventionrequest', {id: clicked_id});
    //    } else {
    //        x = "You pressed Cancel!";
    //    }
    //
    //}

function print_sub(clicked_id)
{
	var x;
	    if (confirm("Weet je zeker dat je deze aanvraag wilt uitprinten?") == true) {
			window.location.href = "../../SOSRommelmarkt/printsubvention.php?id="+clicked_id;
	    } else {
	        x = "You pressed Cancel!";
	    }

}











    function downloadSubventionRequestAttachedFile(id, filename) {
        var data =
        {
            id: id,
            filename: filename
        }

        jQuery.ajax(
            {
                url: "../subventionapi/downloadsubventionrequestattachedfile",
                data: data,
                type: "POST",
                success: function (data) {
                    if (data !== 0)
                        alert("Er is iets verkeerd gegaan." + data)
                }
            });
    }




