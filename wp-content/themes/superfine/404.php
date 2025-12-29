<?php 
get_header();

// page title function.
it_title_style();
?> 

<div class="section">
    <div class="container">
        <div class="row">
            <div class="padding-vertical-30 not-found clearfix">
                <div class="lg-not-found f-left"><?php echo __('404','superfine') ?><i></i></div>
                <div class="ops">
                    <span class="main-color bold font-50"><?php echo __('OOOPS!','superfine') ?></span><br>
                    <span class="pg-nt-fnd"><?php echo __('The Page You Are Looking for can not Be Found.','superfine') ?></span>
                </div>
                
                <p class="t-center"><?php echo __('You can use the form below to search for what you need.','superfine') ?></p>
                
                <div class="not-found-form">
                    <?php get_search_form(); ?>
                </div>
                
                <p class="t-center"><?php echo __('You can browse the following links that may help you for what you are looking for.','superfine') ?></p>
                
                <div class="menu404">
                    <?php it_nav_menu( array( 'theme_location' => '404NotFoundMenu') ); ?>
                </div>
                
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>