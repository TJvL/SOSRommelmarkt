$(document).ready(function(){
    $("#deleteButton").click(function(){

        var x;
        if (confirm("Weet je zeker dat je deze aanvraag wilt verwijderen?") == true) {

            $("#confirmButtonDel").click();


        } else {
            x = "You pressed Cancel!";
        }

    });


    $("#printButton").click(function(){

        var x;
        if (confirm("Weet je zeker dat je deze aanvraag wilt uitprinten?") == true) {

                $("#confirmButtonPrint").click();


        } else {
            x = "You pressed Cancel!";
        }

    });




});
