var firstLoad 	= true,
	triggers 	= '.nav a, .page-footer .btn-simple, .slide-header a';


function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}


$.address.state(document.location.origin);
$(triggers).address();

$.address.change(function(event) {

	if($('body').hasClass('error404')) { }


	else {

	    var pathNames 	= $.address.pathNames(),
	    	pathURL 	= $.address.baseURL();
	    	pathTitle 	= capitalizeFirstLetter(pathNames[0]);

	    $.address.title(pathTitle + ' - Casein Point');
		$('html, body').animate({scrollTop: $('#'+pathNames).offset().top});
		$('.menu-item.active').removeClass('active');
	    $('.menu-item.menu-'+pathNames).addClass('active');

	}

});