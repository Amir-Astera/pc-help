<?php
function it_modify_breadcrumb_args() {
    $args['home_text'] = esc_html__('Home','superfine');
    $args['root_text'] = 'Forums';
    $args['sep'] = ' / ';
    $args['before'] = '<div class="bbp-breadcrumb"><p><span class="bold">'.__('You Are In:','superfine').'</span>';
    return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'it_modify_breadcrumb_args' );

