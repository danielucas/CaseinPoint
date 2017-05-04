<?php 


function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDRGmRLD_c1Gk3gJmRZrpIh4lF5lNCMcwg';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
