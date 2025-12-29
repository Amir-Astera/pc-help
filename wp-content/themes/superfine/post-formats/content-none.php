<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<section class="padding-vertical-30 not-found clearfix">
    <div class="lg-not-found f-left"><?php echo esc_html__('404','superfine') ?><i></i></div>
    <div class="ops">
        <span class="main-color bold font-50"><?php echo esc_html__('OOOPS!','superfine') ?></span><br>
        <span class="pg-nt-fnd"><?php echo esc_html__('The Page You Are Looking for can not Be Found.','superfine') ?></span>
    </div>

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p class="t-center"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'superfine' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

            <p class="t-center"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'superfine' ); ?></p>
            <div class="not-found-form">
                <?php get_search_form(); ?>
            </div>

        <?php else : ?>

            <p class="t-center"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'superfine' ); ?></p>
            <div class="not-found-form">
                <?php get_search_form(); ?>
            </div>

        <?php endif; ?>
    <!-- .page-content -->
</section><!-- .no-results -->
