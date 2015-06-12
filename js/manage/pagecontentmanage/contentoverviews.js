$(document).ready(function() {
    if(localStorage.getItem("successMessage")!=null){
        if(localStorage.getItem("successMessage")== "Home module succesvol toegevoegd."){
            $("#statushomemodules").text(localStorage.getItem("successMessage"));
            $("#statushomemodules").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Over ons module succesvol toegevoegd."){
            $("#statusaboutusmodules").text(localStorage.getItem("successMessage"));
            $("#statusaboutusmodules").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Home module succesvol verwijderd."){
            $("#statushomemodules").text(localStorage.getItem("successMessage"));
            $("#statushomemodules").addClass("alert-success");
        }
        else if(localStorage.getItem("successMessage")== "Over ons module succesvol verwijderd."){
            $("#statusaboutusmodules").text(localStorage.getItem("successMessage"));
            $("#statusaboutusmodules").addClass("alert-success");
        }
        localStorage.clear();
    }

    $('#homeTable').DataTable({
        "columnDefs": [{
            "width": "7em", "targets": 1
        }],
        "ordering": false
    });
    $('#aboutusTable').DataTable({
        "columnDefs": [{
            "width": "7em", "targets": 1
        }],
        "ordering": false
    });

    var hash = document.location.hash;
    var prefix = "tab_"; // prevents the page from scrolling
    if (hash) {
        $('.nav-tabs a[href='+hash.replace(prefix,"")+']').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
        $('.idealforms').resize();
    });
});
