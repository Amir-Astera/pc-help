<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" class="shape" value="<?php echo get_search_query(); ?>" name="s" placeHolder="<?php echo __('Enter search keyword here...','superfine') ?>" />
<button type="submit" class="shape main-bg main-border" data-text="<?php echo __('GO','superfine') ?>"><i class="fa fa-search"></i></button>
</form>