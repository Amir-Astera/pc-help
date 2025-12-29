<?php
function it_blog_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_category'       => '',
        'blog_style'        => 'large',
        'blog_cols'         => '6',
        'tl_sidebar'        => 'left_bar',
        'pager_type'        => '1',
        'pager_style'       => '1',
        'el_class'          => ''
        ), $atts));
    global $post,$paged; 

    $cont = $cat_n = $cat_n = $cat_id = $b_cols = $t_bar = $t_full = $ppage = $size = '';

    /*if ( $pager_type != "3" ){
        $ppage = "'posts_per_page' => $posts_per_page";
    }*/
    
    $args = array(
        
        'category_name' => $it_category,
        'ignore_sticky_posts'   => true,
        'post_type' => 'post',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'paged' => $paged,
    ); 
    
    $q = new WP_Query( $args );
    
    $categories = get_categories($args);
    
    foreach($categories as $category){
        if ($category->category_nicename == $it_category){
         $cat_n = $category->name;
         $cat_id = $category->cat_ID;   
        }
    }
      
    $row_m = '';
    
    if($blog_style == 'timeline'){
        $row_m = '';
        if($tl_sidebar == 'no_bar'){
            $t_bar = 'timeline_no_bar';
            $t_full = ' full';
        }else if ($tl_sidebar == 'right_bar'){
            $t_bar = 'timeline-left';
            $t_full = ' lft-tl';
        }else{
            $t_bar = 'timeline-right';
            $t_full = ' rit-tl';
        }
    }
    
    if($blog_style == 'small' || $blog_style == 'grid' || $blog_style == 'masonry'){
        $size = 'blog-small-image';
    }else{
        $size  = ( empty( $it_blog_image_size ) ) ? theme_option( 'blog_image_size' ) : $it_blog_image_size;
    } 
    
    if($q->have_posts()){
        $cont .= '<div class="'.$row_m.' blog-posts '.$blog_style.$t_full.'" id="content">';   
        if($blog_style == 'timeline'){
            $cont .= '<div class="'.$t_bar.'">';
        }
        while($q->have_posts()): $q->the_post();
            if($blog_style == 'grid' || $blog_style == 'masonry'){
                $cont .= '<div class="col-md-'.$blog_cols.'">';
            }
                $cont .= '<div class="post-item">';
                    if($blog_style == 'timeline'){
                        $cont .= '<div class="timeline_date">';
                           $cont .= '<span class="inner_date">';
                                $cont .= '<span class="day">'.get_the_date("j").'</span>';
                                $cont .= '<span class="month">'.get_the_date("M").'</span>';
                           $cont .= '</span>';
                           $cont .= '<span class="year">'.get_the_date("Y").'</span>';
                       $cont .= '</div>';
                    }
                    if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                        $cont .= post_media( get_the_content() );
                    } else if ( get_post_format() == 'image' ) {
                        if( has_post_thumbnail()){
                            if ( post_password_required() || ! has_post_thumbnail() ) { return; }

                            global $it_blog_image_size;
                            $contents = '';
                            $link  = ( empty( $link ) ) ? get_the_permalink() : $link;
                                $cont .='<div class="post-image">';
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $size,'' );
                                    $cont .='</a>';
                                $cont .='</div>';
                            
                            //$cont .= it_post_thumbnail2();  
                        }else{
                            $cont .= post_image2(get_the_content());
                        }        
                    } else {
                        if ( get_the_post_thumbnail() ){
                            global $it_blog_image_size;
                            $contents = '';
                            $link  = ( empty( $link ) ) ? get_the_permalink() : $link;
                                $cont .='<div class="post-image">';
                                    $cont .='<a href="'. get_the_permalink() .'" class="post-thumbnail">';
                                        $cont .= get_the_post_thumbnail( null, $size,'' );
                                    $cont .='</a>';
                                $cont .='</div>';
                         }else {
                             if($blog_style == 'grid' || $blog_style == 'masonry' || $blog_style == 'small'){
                                $cont .= '<div class="post-image"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/no-img.jpg" /></div>';
                             }else{
                                $cont .= '<div class="post-image"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/large-default.jpg" /></div>'; 
                             }
                        }
                        
                        
                    }
                    $cont .= '<article class="post-content"><div class="post-info-container"><div class="post-info">';
                        $cont .= it_post_icon2();
                        $cont .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
                        $cont .= '<ul class="post-meta">';
                            if ( is_sticky() ) {
                              $cont .='<li class="post-sticky"><i class="fa fa-magic"></i>' . esc_html__( 'Sticky', 'superfine' ) . '</li>';
                            }
                            $cont .= '<li class="meta-user"><i class="fa fa-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>';
                            if($blog_style != 'timeline'){
                                $cont .= '<li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'<li>';
                            }
                            if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) {
                              $cont .='<li class="meta-cat"><i class="fa fa-folder-open"></i>'. get_the_category_list( ', ' ) .'</li>';
                            }
                        $cont .= '</ul>';
                        $cont .= '</div></div>';
                        
                        if ( has_excerpt() ) {
                            $cont .= '<div class="entry-summary">';
                                $cont .= the_excerpt();
                            $cont .='</div>';
                        }else{
                            $cont .= '<div class="entry-content">'; 
                                $content = get_the_content('',false,'');   
                                $cont .= apply_filters('the_content', $content);  
                            $cont .='</div>';
                        }
                                                
                        $cont .= '<div class="bottom_tools">';

                              if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )  {
                                $cont .= get_comments_popup_link( esc_html__( 'Leave a comment', 'superfine' ), esc_html__( '1 Comment', 'superfine' ), esc_html__( '% Comments', 'superfine' ), 'meta_comments f-left shape' );
                              }

                            
                            $cont .= getPostLikeLink( $post->ID );
                                        
                            /*$cont .= wp_link_pages( array(
                                'before'      => '<div class="sub-pager"><span class="page-links-title">' . esc_html__( 'Pages:', 'superfine' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            )); */
                            
                            if ($pos=strpos($post->post_content, '<!--more-->')):
                                $cont .= '<a class="f-right more_btn shape" href="'.get_the_permalink().'">'.__('Read more','superfine').'</a>';
                            endif;
                            
                        $cont .= '</div>';
                    $cont .= '</article>';
                $cont .= '</div>';
            if($blog_style == 'grid' || $blog_style == 'masonry'){
                $cont .= '</div>';
            }                                                      
        endwhile;
        
        if($blog_style == 'timeline'){
            $cont .= '</div>';        
        }

        $cont .= '</div><div class="clearfix"></div>';        
        
        $total = $q->max_num_pages;
        
        //if ( $total < 2 )return;
        
        $big = 999999999;
        
        $args2 = array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '&paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $total,
            'type' => 'list',
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>'                    
        );
        
        $pg_pos = theme_option('pager_position');
        
        if ( $pager_type == "1" ) {
            if ( $pager_style == "1" ) {
                $cont .= '<div class="pagination default '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            }else if ($pager_style == "2"){
                $cont .= '<div class="pagination diamond-pager '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            }else if ($pager_style == "3"){
                $cont .= '<div class="pagination circle-pager '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            }else if ($pager_style == "4"){
                $cont .= '<div class="pagination bottom-border '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            }else if ($pager_style == "5"){
                $cont .= '<div class="pagination bar-1 '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            }else if ($pager_style == "6"){
                $cont .= '<div class="pagination bar-2 '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            }else if ($pager_style == "7"){
                $cont .= '<div class="pagination bar-3 '.$pg_pos.'">';
                    $cont .= paginate_links( $args2 );
                $cont .= '</div>';
            } 
        } else if ( $pager_type == "2" ) {
            if( $q->max_num_pages > 1 ){
                $cont .= '<div class="old-new shape">';
                    $cont .= '<div class="f-left">'.get_next_posts_link(__("&laquo; Older","superfine"), $q->max_num_pages).'</div>';
                    $cont .= '<div class="f-right">'.get_previous_posts_link(__("Newer &raquo; ","superfine"), $q->max_num_pages).'</div>';
                $cont .= '</div>';
            }
            
        } else if ( $pager_type == "3" ){
            $cont .= '<div class="t-center">';
                $cont .= '<a class="btn shape sm load_more" href="#">'.__("Load more","superfine").'</a>';
                $cont .= '<img alt="" class="pager_loading" src="'.THEME_URI.'/assets/images/page-loader.gif" />';
            $cont .= '</div>';
                        
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function() { 
                        var count = 2;
                        var total = <?php echo $q->max_num_pages ?>;
                        
                        if(jQuery('a.load_more').length){
                            if (count <= total){
                                jQuery('a.load_more').css('display','table');
                            }
                            jQuery('a.load_more').click(function(e){
                                e.preventDefault();
                                if (count > total){
                                    jQuery('a.load_more').hide();
                                    return false;
                                }else{
                                    jQuery('.pager_loading').show();
                                    jQuery('a.load_more').css('display','table');
                                    loadArticle(count);
                                }
                                
                                count++;
                                
                                if (count > total){
                                    jQuery('a.load_more').hide();
                                }
                            });
                        }
                            
                        function loadArticle(pageNumber){    
                              jQuery.ajax({
                                  url: "<?php echo esc_attr(site_url()); ?>/wp-admin/admin-ajax.php",
                                  type:'POST',
                                  data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop', 
                                  success: function(html){
                                      jQuery('.pager_loading').hide();
                                      var c = jQuery(html).children().unwrap();

                                      if(jQuery('.masonry').length){
                                        jQuery("#content.masonry").append(c);  
                                      } else{
                                        jQuery("#content").append(c);
                                      }                          
                                         
                                      jQuery('.post-password-form input[type="submit"]').addClass('btn main-bg');
                                        if(jQuery('.masonry').length){
                                            docReady( function() {
                                              var container = document.querySelector('.masonry');
                                              var msnry = new Masonry( container, {});
                                            });
                                        }
                                      if(jQuery('.posts-gal').length > 0){
                                          var rt = '';
                                          if (jQuery('html').css('direction') == 'rtl'){
                                              rt = true;
                                          }else{
                                              rt = false;
                                          }  
                                          jQuery('.posts-gal').slick({
                                                dots: true,
                                                arrows:false,
                                                slidesToShow: 1,
                                                slidesToScroll: 1,
                                                autoplay:true
                                            });
                                        }
                                        var htmlclass = jQuery('html').attr('data-class');
                
                                        jQuery('.header-5 .top-cart .cart-icon .cart-heading,.header-6 .top-cart .cart-icon .cart-heading,.header-8 .top-cart .cart-icon .cart-heading').addClass('dark-bg shape sm');
                                        if(jQuery('.top-head').hasClass('header-left') || jQuery('.top-head').hasClass('header-right')){
                                            jQuery('.top-nav').removeClass('top-nav').addClass('side-nav');
                                        }
                                        
                                        jQuery('.shape').addClass(htmlclass);
                                        jQuery('.no-touch .fx').waypoint(function() {
                                            var anim = jQuery(this).attr('data-animate'),
                                                del = jQuery(this).attr('data-animation-delay');
                                            jQuery(this).addClass('animated '+anim).css({animationDelay: del + 'ms'});
                                        },{offset: '90%',triggerOnce: true});

                                  }
                              });
                          return false;
                      }  
                       
                });
            </script>
            <?php
        }
    }
    
    wp_reset_postdata(); 
    return $cont;
     
     
}                                               
add_shortcode('it_blog', 'it_blog_shortcode');
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');

