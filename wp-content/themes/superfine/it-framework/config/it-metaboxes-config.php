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
 
require_once(FRAMEWORK_DIR."/classes/it-meta-boxes.class.php");
  
  /* Page Title Settings
  ============================================= */
  $title_box = array(
    'id'             => 'it_meta_page_title',
    'title'          => 'Page Title Settings',
    'fields'         => array(),
  );
  $page_title_meta =  new ITMetaBoxes($title_box);
  $page_title_meta->it_checkbox(
    'chck_custom_title',
    array(
        'name'=> 'Enable Custom Page Title',
        'desc'=> 'Enable / Disable custom page title.',
        'std'=>'0'
    )
  ); 
  $page_title_meta->it_select(
    'title_style',
    array(
        '1' => 'Normal Page Title',
        '2' => 'Centered Page Title',
        '3' => 'Centered Page Title Style 2',
        '4' => 'Minimal Page Title'
    ),
    array(
        'name'=> 'Page Title Style ', 
        'std'=> array('0'),
        'desc'=> 'Select the page Title style.'
        )
    );
  
  $page_title_meta->it_textbox(
    'custom_title_txt',
    array(
        'name'=> 'Custom Title',
        'desc'=> 'Custom page title, replace the original title',
        'std'=>''
    )
  );
  $page_title_meta->it_textbox(
    'custom_subtitle',
    array(
        'name'=> 'Custom SubTitle',
        'desc'=> 'Custom subtitle, replace the original title.'
    )
  );
  
  $page_title_meta->it_textbox(
    'title_height',
    array(  
        'name'=> 'Page Title Height',
        'std'=>'',
        'desc'=> 'page Title Height. Ex: 200px'
    )
  );
  
  $page_title_meta->it_color(
    'title_color',
    
    array(
        'name'=> 'Title Color',
        'desc'=> 'Select the page Title color.',
        'std'=>''
    )
  );
  $page_title_meta->it_color(
    'subtitle_color',
    array(
        'name'=> 'SubTitle Color ',
        'desc'=> 'Select the page sub Title color.',
        'std'=> ''
    )
  );
  $page_title_meta->it_icon(
    'title_icon',
    array(
        'name'=> 'Title Icon ',
        'desc'=> 'Select the page Title Icon.',
        'std'=> ''
    )
  );
  $page_title_meta->it_color(
        'title_bg_color',
    array(
        'name'=> 'Title Background Color',
        'desc'=> 'Select the page Title background color.',
        'std'=> ''
    )
  );
  $page_title_meta->it_uploadfile(
        'title_bg_img',
        array(
            'name'=> 'Background image',
            'desc'=> 'upload image or type a URL.',
            'std'=>''
        )
  );
  $page_title_meta->it_select(
      'title_bg_repeat',
      array(
        'no-repeat'=>'No Repeat',
        'repeat-x'=>'Repeat Horizontal',
        'repeat-y'=>'Repeat Vertical',
        'repeat'=>'Repeat'),
        array(
            'name'=> 'Background Repeat',
            'desc'=> 'Choose how background image repeated.',
            'std'=> array('no-repeat')
        )
  );
  $page_title_meta->it_checkbox(
        'title_full_bg',
        array(
            'name'=> '100% background image ?',
            'desc'=> 'Make background 100% width & height.',
            'std'=>'0'
        )
  );
  $page_title_meta->it_checkbox(
        'title_fixed_bg',
        array(
            'name'=> 'Parallax Background ?',
            'desc'=> 'Enable / Disable Parallax effect.',
            'std'=>'0'
        )
  );
  $page_title_meta->it_color(
        'title_bg_overlay',
    array(
        'name'=> 'Overlay ?',
        'desc'=> 'Overlay over the background image.',
        'std'=> ''
    )
  );
  $page_title_meta->it_textbox(
        'title_bg_overlay_opacity',
    array(
        'name'=> 'Overlay Opacity',
        'desc'=> 'Numbers between 0 and 1 Ex: 0.5',
        'std'=> '0.5'
    )
  );
  $page_title_meta->it_checkbox(
        'chck_video_bg',
        array(
            'name'=> 'Video Background',
            'desc'=> 'Upload video background.',
            'std'=>'0'
        )
  );
  $page_title_meta->it_uploadfile(
        'header_video_cover',
        array(
            'name'=> 'Video Cover',
            'desc'=> 'upload an image or type an image URL in the textbox below.',
            'std'=>'',
            'class'=>'vid_cov'
        )
  );
  $page_title_meta->it_uploadfile(
        'video_mp4',
        array(
            'name'=> 'video/mp4',
            'desc'=> 'upload .MP4 video or type a video URL.',
            'data-type'=> 'video',
            'std'=>''
        )
  );
  $page_title_meta->it_uploadfile(
        'video_webm',
        array(
            'name'=> 'video/webm',
            'desc'=> 'upload .WEBM video or type a video URL.',
            'data-type'=> 'video',
            'std'=>''
        )
  );
  $page_title_meta->it_uploadfile(
        'video_ogv',
        array(
            'name'=> 'video/ogv',
            'desc'=> 'upload .OGV video or type a video URL.',
            'data-type'=> 'video',
            'std'=>''
        )
  );
  $page_title_meta->it_checkbox(
        'hide_breadcrumbs',
        array(
            'name'=> 'Hide Breadcrumbs',
            'desc'=> 'hide Breadcrumbs only in this page.',
            'std'=>'0'
        )
  );
  $page_title_meta->it_checkbox(
        'hide_page_title',
        array(
            'name'=> '<b style="color:red">Hide Page Title</b>',
            'desc'=> 'Hide the Page Title only in this page.',
            'std'=>'0'
        )
  );
  
  /* Header Settings
  ============================================= */
  $header_box = array(
    'id'             => 'it_meta_head_options',
    'title'          => 'Header Settings',
    'fields'         => array(),
  );
  $header_meta =  new ITMetaBoxes($header_box);
  $header_meta->it_select(
    'meta_header_style',
    array(
        ''=> '-- Choose Header Style --',
        'header-1' => 'Header 1',
        'header-2' => 'Header 2',
        'header-3' => 'Header 3',
        'header-4' => 'Header 4',
        'header-5' => 'Header 5',
        'header-6' => 'Header 6',
        'header-7' => 'Header 7',
        'header-8' => 'Header 8',
        'header-9' => 'Header 9',
        'header-banner' => 'Header With Banner',
        'header-shop' => 'Shop Header',
        'header-one-page-2' => 'One Page 2 Header',
        'header-left' => 'Left Header',
        'header-right' => 'Right Header',
        'header-transparent-1-boxed' => 'Header Transparent 1 Boxed',
        'header-transparent-1-fluid' => 'Header Transparent 1 Fluid',
        'header-transparent-2' => 'Header Transparent 2',
        'header-semi-transparent-light' => 'Header Semi Transparent Light',
        'header-semi-transparent-dark' => 'Header Semi Transparent Dark'
    ),
    array(
        'name'=> 'Header Style ', 
        'std'=> array('1'),
        'desc'=> 'Select different header style for this page.'
        )
  );
  $header_meta->it_select(
    'sub_menu_color',
    array(
        ''                  => '-- Choose Sub Menu Color --',
        'default'           => 'Default Color',
        'dark-submenu'      => 'Dark Sub Menu',
        'colored-submenu'   => 'Colored Sub Menu',
    ),
    array(
        'name'=> 'Sub Menu Color ', 
        'std'=> array('1'),
        'desc'=> 'Select Sub Menu Color for this page.'
        )
  );
  $header_meta->it_uploadfile(
        'meta_header_banner',
        array(
            'name'=> 'header Banner image',
            'desc'=> 'upload a Banner image or type an image URL in the textbox below.',
            'std'=>'',
            'class'=>''
        )
  );
  $header_meta->it_textbox(
    'meta_header_banner_link',
    array(  
        'name'=> 'Header Banner Link',
        'std'=>'',
        'desc'=> 'Insert here the LINK for the Banner. Ex: http://www.google.com',
        'class'=>''
    )
  );  
  $header_meta->it_checkbox(
        'hide_top_bar',
        array(
            'name'=> 'Hide Top Bar',
            'desc'=> 'hide the Top Bar only in this page.',
            'std'=>'0'
        )
  );
  $header_meta->it_checkbox(
        'hide_menu',
        array(
            'name'=> 'Hide Logo and Menu',
            'desc'=> 'hide the Logo and Menu only in this page.',
            'std'=>'0'
        )
  );
  $header_meta->it_textbox(
    'meta_header_extra_class',
    array(  
        'name'=> 'Extra CSS Class',
        'std'=>'',
        'desc'=> 'Insert here extra CSS class for the Header Element.',
        'class'=>''
    )
  );
  $header_meta->it_checkbox(
        'hide_header',
        array(
            'name'=> '<b style="color:red">Hide Header</b>',
            'desc'=> 'This will only hide the header in this page.',
            'std'=>'0'
        )
  );
  
  
  /* Footer Settings
  ============================================= */
  $footer_box = array(
    'id'             => 'it_meta_foot_options',
    'title'          => 'Footer Settings',
    'fields'         => array(),
  );
  $footer_meta =  new ITMetaBoxes($footer_box);
  $footer_meta->it_select(
    'meta_footer_style',
    array(
        ''=> '-- Choose Footer Style --',
        '1' => 'Footer 1',
        '2' => 'Footer 2',
        '3' => 'Footer 3',
        '4' => 'Footer 4',
        'light' => 'Light Colored Footer',
        'minimal-1' => 'Minimal Footer 1',
        'minimal-2' => 'Minimal Footer 2',
        'minimal-3' => 'Minimal Footer 3',
        'minimal-4' => 'Minimal Footer 4',
        'fullscreen' => 'Fullscreen Footer',
        'fullscreen-2' => 'Fullscreen 2 Footer'
    ),
    array(
        'name'=> 'Footer Style', 
        'std'=> array(''),
        'desc'=> 'Select different header style for this page.'
        )
  );
  $footer_meta->it_checkbox(
        'hide_top_foot_bar',
        array(
            'name'=> 'Hide Top Footer Bar',
            'desc'=> 'Hide Top Footer Bar only in this page.',
            'std'=>'0'
        )
  );
  $footer_meta->it_checkbox(
        'hide_foot_widgets',
        array(
            'name'=> 'Hide Footer Widgets',
            'desc'=> 'Hide Footer Widgets only in this page.',
            'std'=>'0'
        )
  );
  $footer_meta->it_checkbox(
        'hide_bottom_foot_bar',
        array(
            'name'=> 'Hide Bottom Footer Bar',
            'desc'=> 'Hide Bottom Footer Bar only in this page.',
            'std'=>'0'
        )
  ); 
  $footer_meta->it_checkbox(
        'hide_footer',
        array(
            'name'=> '<b style="color:red">Hide Footer</b>',
            'desc'=> 'This will only Hide the Footer in this page.',
            'std'=>'0'
        )
  );
