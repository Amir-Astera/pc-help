<?php $title = wp_title( '', false, '' );$it_page_title = it_custom_page_title(); ?>
    <div class="page-title title-search title-minimal">
        <div class="container">
            <div class="row">
                <h3 class="fx" data-animate="fadeInDown"><span class="main-color heavy-font font-20"><?php echo $wp_query->found_posts; ?></span> <?php echo esc_html__('Search results for', 'superfine') ?></h3>
                <h1 class="fx" data-animate="fadeInUp"><span class="main-color"><?php echo $it_page_title; ?></span></h1>
            </div>
        </div>
    </div>
