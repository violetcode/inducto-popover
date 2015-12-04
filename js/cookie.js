(function($){
	$("#inducto_close").click(function(){
		document.cookie = "inductopop_closed=true";
		$("#inducto_popover").hide();
	});
})(jQuery);