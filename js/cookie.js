(function($){
	//Detach the popover and attach it to the element we want.
	var pop_elem = $("#inducto_popover").detach();
	var new_parent = $(".menu-item-643");
	new_parent.append(pop_elem);

	//Set cookie on close, so it doesn't open again.
	$(document).on('click', '#inducto_close', function(){
		document.cookie = "inductopop_closed=true";
		pop_elem.hide();
	});
	
})(jQuery);