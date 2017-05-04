cp_map_styles = [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#c2e5db"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    }
];


/*
 *  new_map
 *
 *  This function will render a Google Map onto the selected jQuery element
 *
 *  @type  function
 *  @date  8/11/2013
 *  @since 4.3.0
 *
 *  @param $el (jQuery element)
 *  @return  n/a
 */

function new_map($el, $markers) {

    // var
    var $markers = $('.map-markers').find($markers);

    // vars
    var args = {
        zoom                : 3,
        center              : new google.maps.LatLng(3.7609, -42.4350), //LatLng for the Castro in San Francisco

        mapTypeId           : google.maps.MapTypeId.ROADMAP,
        styles              : cp_map_styles,

        disableDefaultUI    : false,
        scaleControl        : true,
        scrollwheel         : false,        
        mapTypeControl      : false,
        streetViewControl   : false
        
    };


    // create map
    var map = new google.maps.Map($el[0], args);

    // add a markers reference
    map.markers = [];

    // instance the infowindow 
    infowindow = new google.maps.InfoWindow();

    // add markers
    $markers.each(function(index, value){

        add_marker( $(this), map, index );

    });

    // center map
    //center_map(map);

    // return
    return map;

}

/*
 *  add_marker
 *
 *  This function will add a marker to the selected Google Map
 *
 *  @type  function
 *  @date  8/11/2013
 *  @since 4.3.0
 *
 *  @param $marker (jQuery element)
 *  @param map (Google Map object)
 *  @return  n/a
 */

function add_marker( $marker, map, index ) {

    var index = index || 0;

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
        position    : latlng,
        map         : map,
        icon        : ajax_objects.themeurl+'/dist/images/markers/'+$marker.data('icon')+'.svg',
        html        : $marker.html(),

    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() ) {
      
        // pop open if on a single post
        infowindow.setContent($marker.html());
        infowindow.open( map, marker );


        setTimeout(function(){
            cp_remove_gmaps_box_style();
        }, 250);



        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent($marker.html());
            infowindow.open( map, marker );
            cp_remove_gmaps_box_style();
        });
    }

}


		function cp_remove_gmaps_box_style() {

		   // $('.gm-style-iw').next().css({'height': '0px'}); //remove arrow bottom inforwindow
		    $('.gm-style-iw').prev().html(''); //remove style default inforwindows

		}


/*
 *  center_map
 *
 *  This function will center the map, showing all markers attached to this map
 *
 *  @type  function
 *  @date  8/11/2013
 *  @since 4.3.0
 *
 *  @param map (Google Map object)
 *  @return  n/a
 */

function center_map(map) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each(map.markers, function(i, marker) {

        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

        bounds.extend(latlng);

    });

    // fit to bounds
    map.fitBounds(bounds);
    map.setZoom(13);

}

/*
 *  document ready
 *
 *  This function will render each map when the document is ready (page has loaded)
 *
 *  @type  function
 *  @date  8/11/2013
 *  @since 5.0.0
 *
 *  @param n/a
 *  @return  n/a
 */
// global var
map = null;

$(document).ready(function() {

    if($('#client-map').length > 0 ) {
     
        map = new_map( $('#client-map'), '.marker' ); 
    
    }

});



// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    map.markers = [];
}