function cp_nav_trigger(){ 

	var toggle 	= $('.nav-toggle'),
		menu 	= $('.nav-primary');

	toggle.on('click', function(e){
		e.preventDefault;

		toggle.toggleClass('active');
		menu.toggleClass('active');
	})

}

cp_nav_trigger();