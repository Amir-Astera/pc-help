<?php 
get_header();

$a_id=$post->post_author;
$gallery = get_post_gallery();
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$utvideo = get_post_meta(c_page_ID(),'eg_sources_youtube',true);
$vimeovideo = get_post_meta(c_page_ID(),'eg_sources_vimeo',true);
$html5videomp4 = get_post_meta(c_page_ID(),'eg_sources_html5_mp4',true);
$html5videoogv = get_post_meta(c_page_ID(),'eg_sources_html5_ogv',true);
$html5videowebm = get_post_meta(c_page_ID(),'eg_sources_html5_webm',true);
$soundcloud = get_post_meta(c_page_ID(),'eg_sources_soundcloud',true);

function eg_content (){
    while ( have_posts() ) : the_post();
        $content = strip_shortcode_gallery( get_the_content() );                                        
        $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
        echo $content;
    endwhile;  
}
if ( get_post_gallery() ) {
    $cl = ' slick-gal pro-gallery';
}else{
    $cl = '';
} 
// page title function.
it_title_style();
?> 
 
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php if ( theme_option('singleprojectimg_on') == "1" ) { ?>
    <div class="section gry-bg">
        <div class="container">
            <div class="full-img <?php echo $cl; ?> t-center">
                <?php 
                if ( get_post_gallery() ) {
                        $galleries = get_post_galleries_images( $post  );
                        foreach( $galleries as $galleri ) {
                            foreach( $galleri as $image ) {
                                echo '<div><a class="zoom" href="' . esc_url(str_replace('-150x150','',$image)) . '" title=""><img src="' . esc_url(str_replace('-150x150','',$image)) . '" /></a></div>';
                            }
                        }
                }else if($html5videomp4 || $html5videoogv || $html5videowebm){
                    ?>
                    <div class="esg-entry-media">
                        <div class="esg-media-video" data-mp4="<?php echo esc_url($html5videomp4); ?>" data-webm="<?php echo esc_url($html5videowebm); ?>" data-ogv="<?php echo esc_url($html5videoogv); ?>" width="100%" height="300" data-poster=""></div>
                        <video class="esg-video-frame readytoplay haslistener esg-htmlvideo" controls="" width="100%" height="300" data-origw="100%" data-origh="300">
                            <source src="<?php echo esc_url($html5videomp4); ?>" type="video/mp4">
                            <source src="<?php echo esc_url($html5videowebm); ?>" type="video/webm">
                            <source src="<?php echo esc_url($html5videoogv); ?>" type="video/ogg">
                        </video>
                    </div>
                    <?php
                }else if($vimeovideo){
                      ?>
                      <iframe class="esg-vimeo-frame haslistener esg-vimeovideo readytoplay" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="100%" height="300" src="http://player.vimeo.com/video/<?php echo esc_html($vimeovideo); ?>?title=0&amp;byline=0&amp;html5=1&amp;portrait=0&amp;api=1&amp;player_id=vimeoiframe65115&amp;api=1" data-src="about:blank"></iframe>
                      <?php
                }else if($utvideo){
                     ?>
                     <iframe class="esg-youtube-frame haslistener esg-youtubevideo" frameborder="0" wmode="Opaque" width="100%" height="300" src="https://www.youtube.com/embed/<?php echo esc_html($utvideo); ?>?version=3&amp;enablejsapi=1&amp;html5=1&amp;controls=1&amp;autohide=1&amp;rel=0&amp;showinfo=0" data-src="about:blank" id="ytiframe28709"></iframe>
                     <?php
                }else if($soundcloud){
                    ?>
                    <iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo esc_html($soundcloud); ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                    <?php
                }else if ( has_post_thumbnail() ){
                    if ( function_exists( 'add_theme_support' ) ){ ?> 
                     
                     <a class="zoom" href="<?php echo esc_url($url); ?>">
                        <?php the_post_thumbnail('full'); ?>
                     </a>
                    
                    <?php }
                
                } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="heading">
                        <h3 class="uppercase head-6"><i class="fa fa-info-circle"></i><span class="main-color"><?php echo __('Project','superfine') ?></span> <?php echo __('Info','superfine') ?></h3>
                    </div>
                    <ul class="list">
                        <?php if ( theme_option('singleprojectcategory_on') == "1"  ) {
                        $terms = get_the_terms( $post->id, 'essential_grid_category' );

                        if(is_array( $terms )){
                        ?>
                        <li>
                            <i class="fa fa-tag"></i> <span class="bold main-color"><?php echo __('Category: ','superfine') ?></span> <?php it_eg_category(); ?>
                        </li>
                        <?php }} ?>
                        <?php if ( theme_option('singleprojectauthor_on') == "1" ) { ?>
                        <li>
                            <i class="fa fa-user"></i> <span class="bold main-color"><?php echo __('Added By:','superfine') ?></span> <?php echo the_author_meta( 'user_nicename', $a_id ); ?>
                        </li>
                        <?php } ?>
                        <?php if ( theme_option('singleprojectdate_on') == "1" ) { ?>
                        <li>
                            <i class="fa fa-calendar"></i> <span class="bold main-color"><?php echo __('Date Added:','superfine') ?></span> <?php echo get_the_date('j M Y'); ?>
                        </li>
                        <?php } ?>
                        <?php if ( theme_option('singleprojecttags_on') == "1" ) { ?>
                        <li class="tags-list">
                            <?php $posttags = get_the_tags();
                             if ($posttags){
                                ?>
                                <i class="fa fa-tags"></i><span class="main-color">
                                <?php
                                 the_tags();
                                 ?>
                                 </span>
                                 <?php 
                             }
                            ?>
                        </li>
                        <?php } ?>
                        <?php if ( theme_option('singleprojectsocial_on') == "1" ) { ?>
                        <li>
                            <i class="fa fa-share-alt m-right"></i> <span class="main-color"><strong><?php echo __('Share this post on:','superfine') ?></strong></span>
                            <ul class="social-list margin-top-20 share-project" id="share_btns" data-easyshare data-easyshare-url="">                            
                                <?php if ( theme_option('projectfb_on') == "1" ) { ?>
                                <li>
                                    <a class="gry-bg shape sm fa fa-facebook" data-easyshare-button="facebook" data-easyshare-tweet-text=""></a>
                                </li>
                                <?php } ?>
                                
                                <?php if ( theme_option('projecttw_on') == "1" ) { ?>
                                <li>
                                    <a class="gry-bg shape sm fa fa-twitter" data-easyshare-button="twitter" data-easyshare-tweet-text=""></a>
                                </li>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectgplus_on') == "1" ) { ?>
                                <li>
                                    <a class="gry-bg shape sm fa fa-google-plus" data-easyshare-button="google"></a>
                                </li>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectln_on') == "1" ) { ?>
                                <li>
                                    <a class="gry-bg shape sm fa fa-linkedin" data-easyshare-button="linkedin"></a>
                                </li>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectpin_on') == "1" ) { ?>
                                <li>
                                    <a class="gry-bg shape sm fa fa-pinterest-p" data-easyshare-button="pinterest"></a>
                                </li>
                                <?php } ?>
                                
                                <?php if ( theme_option('projectxing_on') == "1" ) { ?>
                                <li>
                                    <a class="gry-bg shape sm fa fa-xing" data-easyshare-button="xing"></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php if ( theme_option('singleprojectcontent_on') == "1" ) { ?>
                <div class="col-md-8">
                    <div class="heading">
                        <h3 class="uppercase head-6"><i class="fa fa-desktop"></i><span class="main-color"><?php echo __('Case','superfine') ?></span> <?php echo __('Study','superfine') ?></h3>
                    </div>
                    <?php eg_content(); ?>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    
    <?php if ( theme_option('singleprojectrelated_on') == "1" ) { ?>
        <?php locate_template( 'layout/blog/related-projects.php','related'); ?> 
    <?php } ?>
    
</div>

<?php get_footer(); ?>