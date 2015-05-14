
function post(path, params, method) {
	method = method || "post"; // Set method to post by default if not specified.

	// The rest of this code assumes you are not using a library.
	// It can be made less wordy if you use one.
	var form = document.createElement("form");
	form.setAttribute("method", method);
	form.setAttribute("action", path);

	for(var key in params) {
		if(params.hasOwnProperty(key)) {
			var hiddenField = document.createElement("input");
			hiddenField.setAttribute("type", "hidden");
			hiddenField.setAttribute("name", key);
			hiddenField.setAttribute("value", params[key]);

			form.appendChild(hiddenField);
		}
	}
	document.body.appendChild(form);
	form.submit();
}

function print_sub(clicked_id)
{
	var x;
	    if (confirm("Weet je zeker dat je deze aanvraag wilt uitprinten?") == true) {
			window.location.href = "../../SOSRommelmarkt/printsubvention.php?id="+clicked_id;
	    } else {
	        x = "You pressed Cancel!";
	    }

}

function delete_sub(clicked_id)
{
	var x;
	if (confirm("Weet je zeker dat je deze aanvraag wilt verwijderen?") == true) {
		post('/SOSRommelmarkt/manage/subventions', {id: clicked_id});
	} else {
		x = "You pressed Cancel!";
	}

}

function loadCollapse()
{
    $('.collapse-group .collapse-button').on('click', function(e)
    {
        e.preventDefault();
        var $this = $(this);
        var $collapse = $this.closest('.collapse-group-item').find('.collapse');
        $collapse.collapse('toggle');
        $this.find('i').toggleClass('fa-expand fa-compress');
    });
}



$(document).ready(function() {

    loadCollapse()

});
