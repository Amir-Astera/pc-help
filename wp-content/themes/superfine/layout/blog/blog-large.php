
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>


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
    <article class="post-content">
        <div class="post-info-container">
            <div class="post-info">
                <?php it_post_icon(); ?>
                <?php if( get_post_format() == 'link' ){ ?>
                    <?php
                     $title_format  = post_format_link( get_the_content(), get_the_title() );
                      $it_title   = $title_format['title'];
                      $it_link = getUrl( $it_title );
                      echo $it_title;
                    ?>
                <?php }else{ ?>
                    <h2><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo __('Permanent Link to','superfine') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <?php } ?>
                
                <ul class="post-meta">
                    <?php it_post_meta(); ?>
                </ul>
            </div>
        </div>
        <?php if ( has_excerpt() ) : ?>
            <div class="entry-summary"><?php the_excerpt(); ?></div>
        <?php else : ?>
            <div class="entry-content">
                <?php echo the_content('',false,''); ?>
            </div>
        <?php endif; ?>
        <div class="bottom_tools">
            <?php 
            if ( ! is_search() ) {

              if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )  {
                  if ( !is_singular() || ( is_singular() &&  theme_option('singlecomment_on') == "1" )){
                      comments_popup_link( __( 'Leave a comment', 'superfine' ), __( '1 Comment', 'superfine' ), __( '% Comments', 'superfine' ), 'meta_comments f-left shape' );
                  }
              }

            }
            ?>
            
            <?php echo getPostLikeLink( $post->ID ); ?>
                        
            <?php wp_link_pages( array(
                'before'      => '<div class="sub-pager"><span class="page-links-title">' . __( 'Pages:', 'superfine' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                ) );
            ?>
            
            <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
                <a class="f-right more_btn shape" href="<?php esc_url(the_permalink()); ?>"><?php echo __('Read more','superfine') ?></a>
            <?php endif; ?>
            
        </div>
    </article>
    
</div>
<?php endwhile; ?>
