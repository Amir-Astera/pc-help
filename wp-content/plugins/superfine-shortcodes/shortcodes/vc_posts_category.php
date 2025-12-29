<?php
function it_posts_category_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_category'     => '',
        'max_posts'     => '3',
    ), $atts));
    
    $cont = '';
    global $post; 
    $it_category;
    $cat_n = '';
    $cat_n = '';
    $cat_id = '';
    
    $args = array(
        'category_name' => $it_category,
        'showposts'     => $max_posts,
    );
    
    $size = '';
     
    $categories = get_categories($args);
    foreach($categories as $category){
        if ($category->category_nicename == $it_category){
         $cat_n = $category->name;
         $cat_id = $category->cat_ID;   
        }
    }
      
    
    $q = new WP_Query( $args ); 

    if($q->have_posts()):
        $cont .= '<div class="row-minus news-cat">';
        while($q->have_posts()): $q->the_post();
            $cont .= '<div class="col-md-4">';
                $cont .= '<div class="post-item">';
                    $cont .= '<div class="entry-image">';
                    if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                        $cont .= post_media( get_the_content() );
                    } else if ( get_post_format() == 'image' ) {
                        if( has_post_thumbnail()){
                            if ( post_password_required() || ! has_post_thumbnail() ) { return; }

                            global $it_blog_image_size;
                            $contents = '';
                            $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                $cont .='<div class="post-image">';
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $size,'' );
                                    $cont .='</a>';
                                $cont .='</div>';
                        }else{
                            $cont .= post_image2(get_the_content());
                        }        
                    } else {
                        if ( get_the_post_thumbnail() ){
                            global $it_blog_image_size;
                            $contents = '';
                            $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                $cont .='<div class="post-image">';
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $size,'' );
                                    $cont .='</a>';
                                $cont .='</div>';
                         }else {
                            $cont .= '<div class="post-image"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/no-img.jpg" /></div>';
                        }
                        
                        
                    }
                    $cont .= '</div>';
                    $cont .= '<article class="entry-content">';
                        $cont .= '<h5><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
                        $cont .= '<ul class="post-meta">';
                            $cont .= '<li class="meta-user"><i class="fa fa-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>';
                            $cont .= '<li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'<li>';
                        $cont .= '</ul>';
                        $cont .= '<p>'.it_excerpt().'</p>';                        
                    $cont .= '</article>';
                $cont .= '</div>';
            $cont .= '</div>';
        endwhile;
        $cont .= '</div>';        
    endif;
    wp_reset_postdata(); 
    return $cont;
     
     
}                                               
add_shortcode('it_posts_category', 'it_posts_category_shortcode');