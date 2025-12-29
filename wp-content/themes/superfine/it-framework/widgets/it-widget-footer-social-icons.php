<?php
add_action('widgets_init', 'footer_socials_widget_reg');
function footer_socials_widget_reg(){
    register_widget('footer_socials_widget');
}
class footer_socials_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_footer_socials', esc_html__('* Footer Social icons', 'superfine'), array( 'description' => esc_html__( 'Footer Social icons widget.', 'superfine' )));
    }
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $footer_text = $instance['footer_text'];
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ){
            if (function_exists ( 'icl_translate' )){
                $footer_text = icl_translate('Widgets', 'Social Icons Footer Text', esc_html($instance['footer_text']));
            }
            echo '<label>'.esc_html($footer_text).'</label>';
            echo display_social_icons();
            echo $args['after_widget'];
        }
        
    }
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $footer_text = esc_textarea($instance['footer_text']);
        }else {
            $title = esc_html__( 'Social Icons', 'superfine' );
            $footer_text = '';
        }
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','superfine' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'footer_text' ); ?>"><?php _e( 'Footer text:','superfine' ); ?></label> 
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'footer_text' ); ?>" name="<?php echo $this->get_field_name( 'footer_text' ); ?>"><?php echo esc_attr( $footer_text ); ?></textarea>
    </p>
    <?php 
    }
    
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['footer_text'] = ( ! empty( $new_instance['footer_text'] ) ) ? strip_tags( $new_instance['footer_text'] ) : '';
    return $instance;
    }

}