$(document).ready(function() {
	$('#sloganTable').DataTable();
	$('#homeTable').DataTable({
		"columnDefs": [{
			"width": "7em", "targets": 1
		}],
		"ordering": false
	});
});