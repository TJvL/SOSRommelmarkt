$(document).ready(function() {	
	$('.list-group .list-group-item').on('click', function(e)
	{
		e.preventDefault();
		var $this = $(this);
		var $collapse = $this.closest('.list-group-item').find('.collapse');
		$collapse.collapse('toggle');
	});
});