$(document).ready( function () {
    if(localStorage.getItem("successMessage")!=null){
        $("#status").text(localStorage.getItem("successMessage"));
        $("#status").addClass("alert-success");
        localStorage.clear();
    }

    $('#projectTable').DataTable();

    // enable tab hrefs
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
} );
