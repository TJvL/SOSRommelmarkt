$(document).ready( function () {
    if(localStorage.getItem("successMessage")!=null){
        $("#status").text(localStorage.getItem("successMessage"));
        $("#status").addClass("alert-success");
        localStorage.clear();
    }

    $('#subventionTable').DataTable();
} );
