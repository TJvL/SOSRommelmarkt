function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$('#productImagePreview').attr('src', e.target.result).width(150).height(200); // TODO: width/height shit aanpassen...
		};
		
		reader.readAsDataURL(input.files[0]);
	}
}