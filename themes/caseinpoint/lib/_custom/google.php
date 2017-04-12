<?php 

//Add Google Scripts
function cp_load_scripts() {
	
	wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDRGmRLD_c1Gk3gJmRZrpIh4lF5lNCMcwg',null,null,true);  
	wp_enqueue_script('googlemaps');

}

add_action( 'wp_enqueue_scripts', 'cp_load_scripts' );