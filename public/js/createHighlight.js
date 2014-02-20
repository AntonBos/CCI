$(document).ready(function() {

	tinyMCE.baseURL = "/js/tinymce/js/tinymce";

	tinymce.init({
		selector: "textarea#descriptionTextarea",
		convert_urls: false,
		relative_urls: false,
		paste_text_sticky: true,
		paste_text_sticky_default: true,
		theme_url: '/js/tinymce/js/tinymce/themes/modern/theme.min.js',
		skin_url: '/js/tinymce/js/tinymce/skins/lightgray',
		image_advtab: true,
		plugins: [
			"image link media paste code textcolor"
		],
		toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    	toolbar2: "link image | forecolor backcolor | fontselect |  fontsizeselect",
		paste_as_text: true,
		image_advtab: true
	});

	$('.datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		format: 'yyyy-mm-dd'
	});
});