$(document).ready(function() {
	$('#sloganTable').DataTable({
		"columnDefs": [{
			"width": "7em", "targets": 1
		}],
		"ordering": false
	});
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
	})
	$('#newsTable').DataTable({
		"columnDefs": [{
			"width": "7em", "targets": 3
		}],
		"ordering": false
	})
});