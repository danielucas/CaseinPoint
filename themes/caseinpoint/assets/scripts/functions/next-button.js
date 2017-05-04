function cp_next_button() {

	var nxtBtn 	= $('[href="#next"]');

	$(nxtBtn).on('click touch', function(e){
		e.preventDefault();
		var thisParent 	= $(this).parents('.container'),
			thisNext 	= thisParent.next('.container');

		$('html, body').animate({scrollTop: thisNext.offset().top});

	});

}

//cp_next_button();