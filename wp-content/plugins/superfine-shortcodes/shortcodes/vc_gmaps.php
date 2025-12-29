<?php 
function it_gmap_shortcode($atts, $content=null){
    extract(shortcode_atts( array(
    'no_scroll'        => '',
    'el_class'         => '',
    'gmap_zoom'        => '',
    'gmap_latitude'    => '',
    'gmap_longitude'   => '',
    'gmap_headquarter' => '',
    'gmap_height'      => '500px'
    ), $atts));
    
    $gmap_scroll = 'false';
    if($no_scroll != '1'){
        $gmap_scroll = 'true';
    }
    static $i = 1;
    
    $output = '<div class="'.$el_class.'">';          
          
    $output .= '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS0xMdE2r-3TK8_XKlDrLXA1Of08InVhA&sensor=false"
  type="text/javascript"></script>';     
    $output .= '<div id="map_canvas'.$i.'" style="height: '.$gmap_height.'; width: 100%;">
        <script type="text/javascript"> 
            function init_map(){
                var myOptions = {zoom:'.$gmap_zoom.',scrollwheel:'.$gmap_scroll.',center:new google.maps.LatLng('.$gmap_latitude.','.$gmap_longitude.'),mapTypeId: google.maps.MapTypeId.ROADMAP};
                
                map = new google.maps.Map(document.getElementById("map_canvas'.$i.'"), myOptions);
                marker = new google.maps.Marker({map: map,position: new google.maps.LatLng('.$gmap_latitude.', '.$gmap_longitude.')});
                infowindow = new google.maps.InfoWindow({content:"<div>'.esc_html($gmap_headquarter).'</div>" });
                google.maps.event.addListener(marker, "click", function(){
                    infowindow.open(map,marker);
                });
                infowindow.open(map,marker);
            }
            google.maps.event.addDomListener(window, "load", init_map);
            
            
        </script>
    </div>';

    $i++;

    $output .= '</div>';       
          
    return $output; 
    
 
}
add_shortcode('it_gmap', 'it_gmap_shortcode');