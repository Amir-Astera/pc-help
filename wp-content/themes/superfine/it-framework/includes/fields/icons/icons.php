<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.com
 * @copyright 2014 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */


header("Content-type: text/css");
define('WP_USE_THEMES', false);

$file = dirname(__FILE__);
$file = substr($file, 0, stripos($file, "wp-content") );
require( $file . "/wp-load.php"); 
  
$request = FRAMEWORK_URI.'/includes/fields/icons/fontawesome.json';          
$response = wp_remote_get( $request );
$body = wp_remote_retrieve_body($response);
$icons = json_decode( $body, true );

$request_openiconic = FRAMEWORK_URI.'/includes/fields/icons/openiconic.json';
$response_openiconic = wp_remote_get( $request_openiconic );
$body_openiconic = wp_remote_retrieve_body($response_openiconic);
$icons_openiconic  = json_decode( $body_openiconic, true );

$request_typicons = FRAMEWORK_URI.'/includes/fields/icons/typicons.json';
$response_typicons = wp_remote_get( $request_typicons );
$body_typicons = wp_remote_retrieve_body($response_typicons);
$icons_typicons  = json_decode( $body_typicons, true );

$request_entypo = FRAMEWORK_URI.'/includes/fields/icons/entypo.json';
$response_entypo = wp_remote_get( $request_entypo );
$body_entypo = wp_remote_retrieve_body($response_entypo);
$icons_entypo  = json_decode( $body_entypo, true );

$request_linecons = FRAMEWORK_URI.'/includes/fields/icons/linecons.json';
$response_linecons = wp_remote_get( $request_linecons );
$body_linecons = wp_remote_retrieve_body($response_linecons);
$icons_linecons  = json_decode( $body_linecons, true );


?>
<div class="add_i">
    <h3>Choose an icon <a class="close-login" href="#"><i class="fa fa-times"></i></a></h3>
    <h3 class="icons-sel-head">
        <span style="font-size: 13px;line-height: 20px;">Select From Icon Library:</span> <select name="type" class="select_icon">
            <option class="fontawesome" value="fontawesome" selected="selected">Font Awesome</option>
            <option class="openiconic" value="openiconic">Open Iconic</option>
            <option class="typicons" value="typicons">Typicons</option>
            <option class="entypo" value="entypo">Entypo</option>
            <option class="linecons" value="linecons">Linecons</option>
        </select>
        
    </h3>

    <div class="icons_set">
        <div class="fontawesome">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="fa '.$ico.'"></i></a>';
                };
            ?>
        </div>
        <div class="openiconic">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_openiconic["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="oiconic '.$ico.'"></i></a>';
                };
            ?>
        </div>
        <div class="typicons">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_typicons["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="typcn '.$ico.'"></i></a>';
                };
            ?>
        </div>
        <div class="entypo">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_entypo["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="'.$ico.'"></i></a>';
                };
            ?>
        </div>
        <div class="linecons">
            <div style="padding: 10px 0;"><input type="text" placeholder="Search for icon..." class="regular-text iconSearch"></div>
            <?php   
                foreach($icons_linecons["items"] as $ico){
                    print '<a href="#" data-icon="'.$ico.'"><i class="'.$ico.'"></i></a>';
                };
            ?>
        </div>
    </div>
</div>