<?php
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
		<?php if ( theme_option('singlepostimg_on') == "1" ) : ?>
            <?php 
            if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                
                echo post_media( get_the_content() );
                
            } else if ( get_post_format() == 'image' ) {
                if( has_post_thumbnail()){
                    it_post_thumbnail();  
                }else{
                    echo post_image(get_the_content());
                }        
            } else {
                
                it_post_thumbnail();
                
            } 
            ?>
        <?php endif; ?>
        <article class="post-content margin-top-30">
        <?php
            if ( is_single()){
        ?>
        <div class="post-info-container">            
            <div class="post-info">
                <?php if ( theme_option('post_icon_on') == "1" ) { ?>
                    <?php it_post_icon(); ?>
                <?php } ?>
                
                <?php if ( theme_option('single_title_on') == "1" ) { ?>
                    <?php if( get_post_format() == 'link' ){ ?>
                        <?php
                         $title_format  = post_format_link( get_the_content(), get_the_title() );
                          $it_title   = $title_format['title'];
                          $it_link = getUrl( $it_title );
                          echo $it_title;
                        ?>
                    <?php }else{ ?>
                        <h2><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo esc_html__('Permanent Link to','superfine') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php } ?>
                <?php } ?>
                
                <ul class="post-meta">
                    <?php it_post_meta(); ?>
                </ul>
            </div>
            
        </div>
            <?php if ( theme_option('singlecontent_on') == "1" ) : ?>
                <?php if ( ! is_single() && ( is_search() || has_excerpt() ) ) : ?>
                    <div class="entry-summary"><?php the_excerpt(); ?></div>
                <?php else : ?>
                    <div class="entry-content">
                        <?php echo the_content( esc_html__( 'Read More', 'superfine' ) ); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php
            if ( theme_option('singletags_on') == "1" ) {
            $posttags = get_the_tags();
             if ($posttags){
                 ?>
                 <div class="margin-top-20">
                    <div class="divider lft"><i class="fa fa-scissors"></i></div>
                </div>
                 <div class="post-tags main-color"> <i class="fa fa-tags"></i><?php the_tags(); ?> </div>
            <?php 
            
            }
            }
            if ( theme_option('singlesocial_on') == "1" ) {
            if ( is_single()){
            ?>
            <div class="padding-vertical-20">
                <div class="divider lft"><i class="fa fa-scissors"></i></div>
            </div>  
            <i class="fa fa-share-alt m-right"></i> <span class="main-color"><strong><?php echo esc_html__('Share this post on:','superfine') ?></strong></span>
            <div class="share-post shape">
                <div id="share_btns" data-easyshare data-easyshare-url="">
                    
                    <?php if ( theme_option('fb_on') == "1" ) { ?>
                    <button class="facebook" data-easyshare-button="facebook">
                        <span class="fa fa-facebook"></span>
                        <span class="share_num" data-easyshare-button-count="facebook"></span>
                    </button>
                    <?php } ?>
                    
                    <?php if ( theme_option('tw_on') == "1" ) { ?>
                    <button class="twitter" data-easyshare-button="twitter" data-easyshare-tweet-text="">
                        <span class="fa fa-twitter"></span>
                        <span class="share_num" data-easyshare-button-count="twitter"></span>
                    </button>
                    <?php } ?>
                    
                    <?php if ( theme_option('gplus_on') == "1" ) { ?>
                    <button class="googleplus" data-easyshare-button="google">
                        <span class="fa fa-google-plus"></span>
                        <span class="share_num" data-easyshare-button-count="google"></span>
                    </button>
                    <?php } ?>
                    
                    <?php if ( theme_option('ln_on') == "1" ) { ?>
                    <button class="linkedin" data-easyshare-button="linkedin">
                          <span class="fa fa-linkedin"></span>
                          <span class="share_num" data-easyshare-button-count="linkedin"></span>
                    </button>
                    <?php } ?>
                    
                    <?php if ( theme_option('pin_on') == "1" ) { ?>
                    <button class="pinterest" data-easyshare-button="pinterest">
                          <span class="fa fa-pinterest-p"></span>
                          <span class="share_num" data-easyshare-button-count="pinterest"></span>
                    </button>
                    <?php } ?>
                    
                    <?php if ( theme_option('xing_on') == "1" ) { ?>
                    <button class="xing" data-easyshare-button="xing">
                          <span class="fa fa-xing"></span>
                          <span class="share_num" data-easyshare-button-count="xing"></span>
                    </button>
                    <?php } ?>

                    <div data-easyshare-loader>Loading...</div>
                </div>
            </div>
            <?php
                }
            }
        }
        ?>
        </article>

	</article>
    
