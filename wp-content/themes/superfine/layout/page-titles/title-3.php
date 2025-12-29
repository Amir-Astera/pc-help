<?php
    $cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
    $cust_title_overlay = get_post_meta(c_page_ID(),'title_bg_overlay',true);
    $header_video_cover = get_post_meta(c_page_ID(),'header_video_cover',true);
    $chck_video_bg = get_post_meta(c_page_ID(),'chck_video_bg',true);
    $video_mp4 = get_post_meta(c_page_ID(),'video_mp4',true);
    $video_webm = get_post_meta(c_page_ID(),'video_webm',true);
    $video_ogv = get_post_meta(c_page_ID(),'video_ogv',true);
    $cust_title_txt = get_post_meta(c_page_ID(),'custom_title_txt',true);  
    $hide_breadcrumbs = get_post_meta(c_page_ID(),'hide_breadcrumbs',true);
    $it_page_title = '';
    $subtitl_text = '';
    $parallax = '';
    $attr_para = '';
    $vid_class='';
    $parallax_bg='';
    
    if(get_post_meta(c_page_ID(),'title_fixed_bg',true) == '1'){
        $parallax_bg = get_post_meta(c_page_ID(),'title_fixed_bg',true);
    }else if(theme_option('page_head_parallax') == '1'){
        $parallax_bg = theme_option('page_head_parallax');
    }
    
    if($cust_title == '1'){
       if ($cust_title_txt != ''){
           $it_page_title = esc_html($cust_title_txt);  
        }else{
            $it_page_title = it_custom_page_title();
        }
       $subtitl_text = '<h3 class="sub-title shape fx" data-animate="fadeInUp">'.esc_html(get_post_meta(c_page_ID(),'custom_subtitle',true)).'</h3>'; 
    }else{
       $it_page_title = it_custom_page_title(); 
    }
    if($chck_video_bg == '1'){
        $vid_class = 'page-title-video';
    }
    if($parallax_bg == '1'){
        $parallax = 'parallax';
        $attr_para = ' data-stellar-background-ratio="0.4"';
    }
?>
<div class="page-title title-5 <?php echo $vid_class ?> <?php echo $parallax ?>" <?php echo $attr_para; ?>>
    
    <?php if($cust_title == '1' && $chck_video_bg == '1'){ ?>
        <div class="video-wrap">
            <video poster="<?php echo esc_url($header_video_cover); ?>" preload="auto" loop autoplay muted>
                <source src='<?php echo esc_url($video_mp4); ?>' type='video/mp4' />
                <source src='<?php echo esc_url($video_webm); ?>' type='video/webm' />
                <source src='<?php echo esc_url($video_ogv); ?>' type='video/ogv' />
            </video>
        </div>
    <?php } ?> 
    
    <?php if(isset($cust_title_overlay)){ ?>
        <div class="title-overlay"></div>
    <?php }?>
     
    <div class="container">
        <div class="row">
            <div class="col-md-12 lft-title">
                <div class="title-container">
                    <?php if (theme_option('title_icon') !='' || get_post_meta( c_page_ID() , 'title_icon' , true) != ''){ ?>
                        <div class="center-tbl"><i class="title-icon main-bg shape sm <?php it_page_title_icon(); ?> fx" data-animate="fadeInLeft"></i></div>
                    <?php } ?>
                    <h1 class="shape fx" data-animate="fadeInDown"><?php echo $it_page_title; ?></h1>
                    <?php echo $subtitl_text; ?>
                </div>
            </div>
            <?php 
            if($hide_breadcrumbs != '1'){
                $yoast_links_options = get_option( 'wpseo_internallinks' );
                $yoast_bc_enabled=$yoast_links_options['breadcrumbs-enable'];
                if ( function_exists('yoast_breadcrumb') && $yoast_bc_enabled) {
                    
                    yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs fx white-bg" data-animate="fadeInUp">','</div>');
                    
                }else if(function_exists('bcn_display')){
                    echo '<div class="breadcrumbs fx white-bg" data-animate="fadeInUp">';
                    bcn_display();
                    echo '</div>';
                }
                 
            } ?>
        </div>
    </div>
</div>


