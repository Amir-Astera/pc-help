<?php 
header("Content-type: text/css; charset: UTF-8");
define('WP_USE_THEMES', false);

$file = dirname(__FILE__);
$file = substr($file, 0, stripos($file, "wp-content") );
require( $file . "/wp-load.php");

function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}
$hexStr = theme_option("sticky_bg_color");
$rgb = hex2RGB($hexStr, true, ','); 

$hexStr2 = theme_option("soon_overlay");
$rgb2 = hex2RGB($hexStr2, true, ',');

function colourBrightness($hex, $percent) {
    $hash = '';
    if (stristr($hex,'#')) {
        $hex = str_replace('#','',$hex);
        $hash = '#';
    }
    $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
    for ($i=0; $i<3; $i++) {
        if ($percent > 0) {
            // Lighter
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
        } else {
            // Darker
            $positivePercent = $percent - ($percent*2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
        }
        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }
    }
    $hex = '';
    for($i=0; $i < 3; $i++) {
        $hexDigit = dechex($rgb[$i]);
        if(strlen($hexDigit) == 1) {
        $hexDigit = "0" . $hexDigit;
        }
        $hex .= $hexDigit;
    }
    return $hash.$hex;
}
$topDark = colourBrightness( esc_attr(theme_option('barbgcolor')) ,-0.92);
?>
<?php if ( theme_option('body_font') || theme_option('bodybgcolor') || theme_option('bodyfontcolor') || theme_option('body_font_size') || theme_option('body_font_weight') || theme_option('body_line_height')) { ?>
body{
    <?php if ( theme_option('body_font')) { ?>
        font-family:"<?php echo theme_option('body_font'); ?>", Arial, sans-serif;
    <?php } ?>
    <?php if ( theme_option('body_font_size')) { ?>
        font-size:<?php echo esc_attr(theme_option('body_font_size')); ?>px;
    <?php } ?>
    <?php if ( theme_option('body_font_weight')) { ?>
        font-weight:<?php echo theme_option('body_font_weight'); ?>;
    <?php } ?>
    <?php if ( theme_option('body_line_height')) { ?>
        line-height:<?php echo esc_attr(theme_option('body_line_height')); ?>px !important;
    <?php } ?>
    <?php if ( theme_option('bodybgcolor') ) { ?>
        background-color: <?php echo esc_attr(theme_option('bodybgcolor')); ?>;
    <?php } ?>
    <?php if ( theme_option('bodyfontcolor') ) { ?>
        color: <?php echo esc_attr(theme_option('bodyfontcolor')); ?>;
    <?php } ?>
}
<?php } if ( theme_option('body_font_size')) { ?>
p,div{
    font-size:<?php echo esc_attr(theme_option('body_font_size')); ?>px;
}
<?php } ?>
<?php if ( theme_option('body_line_height')) { ?>
    p,div{
        line-height:<?php echo esc_attr(theme_option('body_line_height')); ?>px !important;
    }
<?php } ?>
<?php if ( theme_option('menu_font') || theme_option('menu_font_size') || theme_option('menu_font_weight') || theme_option('menu_line_height')) { ?>
.top-nav > ul > li > a,.top-nav > ul > li > span > a{
    <?php if ( theme_option('menu_font')) { ?>
        font-family:"<?php echo theme_option('menu_font'); ?>", Arial, sans-serif;
    <?php } ?>
    <?php if ( theme_option('menu_font_size')) { ?>
        font-size:<?php echo esc_attr(theme_option('menu_font_size')); ?>px;
    <?php } ?>
    <?php if ( theme_option('menu_font_weight') !== '' ) { ?>
        font-weight:<?php echo theme_option('menu_font_weight'); ?>;
    <?php } ?>
    <?php if ( theme_option('menu_line_height')) { ?>
        line-height:<?php echo esc_attr(theme_option('menu_line_height')); ?>px;
    <?php } ?>
}
<?php } ?>
<?php if ( theme_option('headings_font') || theme_option('headings_font_weight')) { ?>
h1,h2,h3,h4,h5,h6{
<?php if ( theme_option('headings_font')) { ?>
    font-family:"<?php echo theme_option('headings_font'); ?>", Arial, sans-serif !important;
<?php }
 if ( theme_option('headings_font_weight') !== '') { ?>
    font-weight:<?php echo theme_option('headings_font_weight'); ?>;
<?php } ?>
}
<?php } ?>
<?php if ( theme_option('logo_font') || theme_option('logo_font_size') || theme_option('logo_font_weight') || theme_option('logo_font_color')) { ?>
header.top-head .logo a{
    <?php if ( theme_option('logo_font')) { ?>
        font-family:"<?php echo theme_option('logo_font'); ?>", Arial, sans-serif;
    <?php } ?>
    <?php if ( theme_option('logo_font_size')) { ?>
        font-size:<?php echo esc_attr(theme_option('logo_font_size')); ?>px;
    <?php } ?>
    <?php if ( theme_option('logo_font_weight')) { ?>
        font-weight:<?php echo theme_option('logo_font_weight'); ?>;
    <?php } ?> 
}
<?php if ( theme_option('logo_font_color')) { ?>
header.top-head .logo a i{
    color:<?php echo esc_attr(theme_option('logo_font_color')); ?> !important;}
<?php } ?>
<?php if ( theme_option('logo_font_size')) { ?>
header.top-head .logo-txt{
    font-size:<?php echo esc_attr(theme_option('logo_font_size')); ?>px;
}
<?php } ?>
<?php } ?>
<?php if ( theme_option('slogan_font') || theme_option('slogan_font_size') || theme_option('slogan_font_weight') || theme_option('slogan_font_color')) { ?>
header.top-head .logo a span{
    <?php if ( theme_option('slogan_font')) { ?>
        font-family:"<?php echo theme_option('slogan_font'); ?>", Arial, sans-serif;
    <?php } ?>
    <?php if ( theme_option('slogan_font_color')) { ?>
        color:<?php echo esc_attr(theme_option('slogan_font_color')); ?> !important;
    <?php } ?>
    <?php if ( theme_option('slogan_font_size')) { ?>
        font-size:<?php echo esc_attr(theme_option('slogan_font_size')); ?>px;
    <?php } ?>
    <?php if ( theme_option('slogan_font_weight')) { ?>
        font-weight:<?php echo theme_option('slogan_font_weight'); ?>;
    <?php } ?> 
}
<?php } ?> 
<?php if ( theme_option('bodybgimage') ) { ?>
    body{
        background-image: url("<?php echo esc_url(theme_option('bodybgimage')); ?>");
        background-repeat: <?php echo theme_option('body_bg_img_repeat'); ?>;
        <?php if ( theme_option('body_bg_full_width') == '1' ) { ?>
            background-size:100% 100%;
        <?php } ?>
        <?php if ( theme_option('body_bg_img_parallax') == '1' ) { ?>
            background-attachment:fixed;
        <?php } ?>
    }
<?php } elseif ( theme_option('usepatterns') == '1' ) {
    if ( theme_option('patterns-imgs') ) { ?>
    body{
        background-image: url("<?php echo esc_url(theme_option('patterns-imgs')); ?>");
    }
<?php } } ?>

<?php if ( theme_option('nav_bg_color') ) : ?>
    header.top-head{
        background-color: <?php echo esc_attr(theme_option('nav_bg_color')); ?>
    }
<?php endif; ?>
<?php if ( theme_option('nav_text_color') ) : ?>
    header.top-head:not(.sticky-nav) .top-nav > ul > li > a ,header.top-head:not(.sticky-nav) .top-nav > ul > li > span > a,.top-head .top-search > a {
        color: <?php echo esc_attr(theme_option('nav_text_color')); ?> !important
    }
    .top-cart .cart-num{
        background-color: <?php echo esc_attr(theme_option('nav_text_color')); ?> !important
    }
<?php endif; ?> 
 <?php if ( theme_option('nav_image') ) : ?>
    .top-head{
        background-image: url("<?php echo esc_url(theme_option('nav_image')); ?>");
        <?php if ( theme_option('nav_img_full_width') == '1' ) : ?>
            background-size:100% 100%;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('nav_img_repeat'); ?>;
        background-position:50% 0;
    }
 <?php endif; ?>
 
 <?php if ( theme_option('foot_top_bg_color') ) : ?>
    .footer-top{
        background-color: <?php echo esc_attr(theme_option('foot_top_bg_color')); ?> !important;
    }
 <?php endif; ?>
 
 <?php if ( theme_option('foot_top_image') ) : ?>
    .footer-top{
        background-image: url("<?php echo esc_url(theme_option('foot_top_image')); ?>");
        <?php if ( theme_option('foot_top_bg_img_full_width') == '1' ) : ?>
            background-size:100% 100%;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('foot_top_bg_img_repeat'); ?>;
        background-position:50% 0;
    }
 <?php endif; ?>
 
 <?php if ( theme_option('foot_bg_color') ) : ?>
    .footer-middle{
        background-color: <?php echo esc_attr(theme_option('foot_bg_color')); ?> !important;
    }
 <?php endif; ?>
 
 <?php if ( theme_option('footer_image') ) : ?>
    .footer-middle{
        background-image: url("<?php echo esc_url(theme_option('footer_image')); ?>") !important;
        <?php if ( theme_option('footer_bg_img_full_width') == '1' ) : ?>
            background-size:100% 100%;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('footer_bg_img_repeat'); ?>;
        background-position:50% 0;
    }
 <?php endif; ?>
<?php if ( theme_option('copyright_bg_color') ) : ?>
    .footer-bottom{
        background-color: <?php echo esc_attr(theme_option('copyright_bg_color')); ?> !important;
    }
<?php endif; ?>
<?php if ( theme_option('copyright_text_color') ) : ?>
    .footer-bottom *{
        color: <?php echo esc_attr(theme_option('copyright_text_color')); ?> !important;
    }
 <?php endif; ?> 
 <?php if ( theme_option('copyright_image') ) : ?>
    .footer-bottom{
        background-image: url("<?php echo esc_url(theme_option('copyright_image')); ?>");
        <?php if ( theme_option('copyright_bg_img_full_width') == '1' ) : ?>
            background-size:100% 100%;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('copyright_bg_img_repeat'); ?>;
        background-position:50% 0;
    }
 <?php endif; ?>
 <?php if ( theme_option('barbgcolor') ) : ?>
    .top-bar{
        background-color: <?php echo esc_attr(theme_option('barbgcolor')); ?> !important;
        text-shadow:none !important
    }
    .top-bar .alter-bg{
        background-color: <?php echo $topDark; ?>;
    }
    .top-bar a:hover{
        background-color: <?php echo $topDark; ?> !important;
    }
 <?php endif; ?>
  <?php if ( theme_option('bar_image') ) : ?>
    .top-bar{
        background-image: url("<?php echo esc_url(theme_option('bar_image')); ?>");
        <?php if ( theme_option('bar_img_full_width') == '1' ) : ?>
            background-size:100% 100%;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('bar_img_repeat'); ?>;
        background-position:50% 0;
    }
 <?php endif; ?>
  <?php if ( theme_option('barcolor') ) : ?>
    .top-bar,.top-bar a, .top-bar span{
        color: <?php echo esc_attr(theme_option('barcolor')); ?> !important;
    }
 <?php endif; ?>
 <?php if ( theme_option('bariconcolor') ) : ?>
    .top-bar i{
        color: <?php echo esc_attr(theme_option('bariconcolor')); ?> !important;
    }
 <?php endif; ?>
 <?php if ( theme_option('singleprevnext_on') == "0" ) : ?>
 .nav-single {
    display:none;
 }
 <?php endif; ?>
<?php if ( theme_option('is_responsive') == "0" ) : ?>
<?php if ( theme_option('main_width')) : ?> 
 
 .pageWrapper.fixedPage,.container{
    width:<?php echo esc_attr(theme_option('main_width')) ?>px;
    margin:auto
 }
<?php endif; ?>
<?php endif; ?>
 <?php if ( theme_option('sticky_header_on') == '1' ) { ?>
    <?php if ( theme_option('sticky_bg_color') || theme_option('sticky_text_color') ) { ?>
        <?php if ( theme_option('sticky_bg_color')) { ?>
            .top-head.sticky-nav{
                background:rgba(<?php echo esc_attr($rgb); ?>,<?php echo esc_attr(theme_option('sticky_bg_trans')); ?>);
            }
        <?php } ?>
        <?php if ( theme_option('sticky_text_color')) { ?>
            header.top-head.sticky-nav .top-nav > ul > li > a ,header.top-head.sticky-nav .top-nav > ul > li > span > a,.top-head.sticky-nav .top-search > a{
                color:<?php echo theme_option('sticky_text_color'); ?> !important;
            }
            .top-head.sticky-nav .top-nav > ul > li.hasChildren > a:after,.top-head.sticky-nav .top-nav > ul > li.hasChildren > span > a:after{
                color:<?php echo theme_option('sticky_text_color'); ?> !important;
            }
            .top-head.sticky-nav .top-cart .cart-num{
                background-color: <?php echo esc_attr(theme_option('sticky_text_color')); ?> !important
            }
        <?php } ?>
    <?php } ?> 
 <?php } ?>     
 <?php if ( theme_option('use_page_head_bg') == '1' ) : ?>
    .page-title{
        <?php if ( theme_option('page_head_bg')) : ?>
            background-image: url("<?php echo esc_url(theme_option('page_head_bg')); ?>") !important;
        <?php endif; ?>
        <?php if ( theme_option('page_head_full_width') == '1' ) : ?>
            background-size:100% 100% !important;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('page_head_img_repeat'); ?> !important;
        background-position:50% 0;
        <?php if ( theme_option('page_head_parallax') == '1' ) : ?>
        background-attachment:fixed;
        <?php endif; ?> 
    }
 <?php endif; ?> 
 <?php if ( theme_option('page_head_height') ) : ?>
    .page-title > .container{
        height: <?php echo esc_attr(theme_option('page_head_height')); ?>px;
    }
 <?php endif; ?>  
 <?php if ( theme_option('custom_css') ) : ?>
    <?php echo theme_option('custom_css'); ?>
 <?php endif; ?>
<?php if ( theme_option('nav_icon_color') ) : ?>
    .top-nav > ul li a i{
        color: <?php echo esc_attr(theme_option('nav_icon_color')); ?>;
    }
 <?php endif; ?>
 
 <?php if ( theme_option('soon_bgcolor') ) : ?>
    body.soon-page{
        background-color: <?php echo esc_attr(theme_option('soon_bgcolor')); ?>;
    }
 <?php endif; ?>
  <?php if ( theme_option('soon_bg') ) : ?>
    body.soon-page{
        background-image: url("<?php echo esc_url(theme_option('soon_bg')); ?>");
        <?php if ( theme_option('soon_bg_full_width') == '1' ) : ?>
            background-size:100% 100%;
        <?php endif; ?>
        background-repeat: <?php echo theme_option('soon_bg_repeat'); ?>;
        background-position:50% 0;
        <?php if (theme_option('soon_bg_img_parallax')) : ?>
        background-attachment:fixed;
        <?php endif; ?>
    }
 <?php endif; ?>
  <?php if ( theme_option('soon_overlay') ) : ?>
    body.soon-page:before{
        background:rgba(<?php echo esc_attr($rgb2); ?>,<?php echo esc_attr(theme_option('soon_overlay_trans')); ?>) !important;
    }
 <?php endif; ?>
   <?php if ( theme_option('digits_color') ) : ?>
    .digits span{
        color: <?php echo esc_attr(theme_option('digits_color')); ?>;
    }
 <?php endif; ?>
  <?php if ( theme_option('soon_count_color') ) : ?>
    .digits li p{
        color: <?php echo esc_attr(theme_option('soon_count_color')); ?>;
    }
 <?php endif; ?>
 
   <?php if ( theme_option('soon_socials_color') ) : ?>
    body.soon-page .social-list li a{
        color: <?php echo esc_attr(theme_option('soon_socials_color')); ?> !important;
    }
 <?php endif; ?>
 <?php if ( theme_option('soon_socials_bgcolor') ) : ?>
    body.soon-page .social-list li a{
        background-color: <?php echo esc_attr(theme_option('soon_socials_bgcolor')); ?>;
    }
 <?php endif; ?>
 <?php if ( theme_option('soon_socials_hoverbgcolor') ) : ?>
    body.soon-page .social-list li a:hover{
        background-color: <?php echo esc_attr(theme_option('soon_socials_hoverbgcolor')); ?>;
    }
 <?php endif; ?>
 <?php if ( theme_option('soon_socials_border') ) : ?>
    body.soon-page .social-list li a{
        border-color: <?php echo esc_attr(theme_option('soon_socials_border')); ?>;
    }
 <?php endif; ?>