$(document).ready(function() {	
	$('.collapse-group .collapse-button').on('click', function(e)
	{
		e.preventDefault();
		var $this = $(this);
		var $collapse = $this.closest('.collapse-group-item').find('.collapse');
		$collapse.collapse('toggle');
		$this.find('i').toggleClass('fa-expand fa-compress');
	});
});
