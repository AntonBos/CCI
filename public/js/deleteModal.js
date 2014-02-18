$(document).ready(function() {

	$('.btn-danger').on('click', function(e) {
	    e.preventDefault();

	    var route = $(this).data('route');
	    var text = $(this).data('text');
	    
	    $(".modal-body").html('Are you sure you want to delete this item?');

	    $('#deleteModal').data('route', route);
	});

	$('#confirmDelete').click(function() {
	    // handle deletion here
	     $(".modal-body").html('Deleting...');

	  	var route = $('#deleteModal').data('route');
	  	window.location.replace(route);
	});
});