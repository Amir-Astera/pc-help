<?php
function it_news_in_pictures_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_cat'           => '',
        'it_title'           => '',
        ), $atts));
    $output = '';
    global $post;
    
    //$n = $cat_n->name;
    $args = array(
        'category_name' => $it_cat,
        'showposts'     => 24,
    ); 
        
    $quer = new WP_Query( $args ); 
    
    if($quer->have_posts()):
        
        $output .= '<div class="gallery"><ul class="gallery_thumbs">';
        while($quer->have_posts()): $quer->the_post();
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                if(get_the_post_thumbnail($post->ID, 'thumbnail') != ''){                                            
                    $output .= '<li>';
                    $output .= '<div class="pop-items"><a class="zoom" href="'.esc_url($feat_image).'"><i class="fa fa-search-plus"></i></a>';
                    $output .= '<a class="link" href="'.esc_url(get_the_permalink()).'"><i class="fa fa-link"></i></a></div>';
                    $output .= get_the_post_thumbnail($post->ID, 'blog-small-image');
                    $output .= '</li>';
                }
        endwhile;
        $output .= '</ul></div>';        
    endif;
    wp_reset_postdata(); 
    return $output;
     
     
}                                               
add_shortcode('it_new_in_pictures', 'it_news_in_pictures_shortcode');