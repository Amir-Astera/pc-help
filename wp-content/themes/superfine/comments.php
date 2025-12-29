<?php

if ( post_password_required() )
	return;
    
    if ( theme_option('singlecomment_on') == "1" ) : ?>

<div id="comments" class="comments">
	<?php if ( have_comments() ) : ?>
        <div class="heading side-head">
            <div class="head-7 main-border">
                <h4><span class="main-bg"><i class="fa fa-comments"></i><?php echo __('Comments','superfine'); ?></span></h4>
            </div>
        </div>

        <p class="hint margin-bottom-20 bold"><?php
                printf( _nx( 'There is <span class="main-color">1</span> comment on this post', 'There are <span class="main-color">%1$s</span> comments on this post', get_comments_number(), 'superfine' ),
                    number_format_i18n( get_comments_number() ) );
            ?></p>
		<ul class="comment-list">
			<?php wp_list_comments('callback=IT_comment_template'); ?>
		</ul>
        <div style="display: none;">
        <?php
            echo __('There are <span class="main-color">%1$s</span> comments on this post');
        ?>
        </div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php __( 'Comment navigation', 'superfine' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'superfine' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'superfine' ) ); ?></div>
		</nav>
		<?php 
        endif;
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php __( 'Comments are closed.' , 'superfine' ); ?></p>
		<?php endif; ?>
        <div class="padding-vertical-30">
            <div class="divider lft"><i class="fa fa-scissors"></i></div>
        </div>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>

<?php endif; ?>