$(document).ready(function(){
    $("#deleteButton").click(function(){

        var x;
        if (confirm("Weet je zeker dat je deze aanvraag wilt verwijderen?") == true) {

            $("#confirmButton").click();


        } else {
            x = "You pressed Cancel!";
        }

    });
});