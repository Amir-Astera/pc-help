<?php 
$title = wp_title( '', false, '' ); 
$hide_breadcrumbs = get_post_meta(c_page_ID(),'hide_breadcrumbs',true);
?>
    <div class="page-title title-minimal">
        <div class="container">
            <div class="row">
                <h1 class="shape fx" data-animate="fadeInDown">
                    <?php
                        if ( is_day() ) :
                            printf( esc_html__( '%s', 'superfine' ), get_the_date() );

                        elseif ( is_month() ) :
                            printf( esc_html__( '%s', 'superfine' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'superfine' ) ) );

                        elseif ( is_year() ) :
                            printf( esc_html__( '%s', 'superfine' ), get_the_date( _x( 'Y', 'yearly archives date format', 'superfine' ) ) );

                        else :
                            echo single_cat_title( '', false );
                        endif;
                    ?>
                </h1>
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

