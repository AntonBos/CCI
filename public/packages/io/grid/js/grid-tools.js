$(function() {
	$('.draggable tbody').sortable({
		placeholder: "ui-state-highlight",
        opacity: 0.6,
		update: function(event, ui) {

            var itemOrder = $(this).sortable("serialize");
            var orderBy = $("#orderBy").val();
            var controllerAction = $("#controllerAction").val();
            
            $.ajax({
			    type: "POST",
			    url: controllerAction,
			    data: { 
			    	itemOrder: itemOrder,
			    	orderBy: orderBy,
			    }
			});
        }
	});
});