<?php
add_action('widgets_init', 'image_text_widget_reg');
function image_text_widget_reg(){
    register_widget('image_text_widget');
    wp_enqueue_style('thickbox');
}
class image_text_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_image_text', esc_html__('* Image & Text Widget', 'superfine'), array( 'description' => esc_html__( 'Image & Text Widget.', 'superfine' )));
    }
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $image = $instance['image'];
        $footer_text_image = $instance['footer_text_image'];
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ){
            if (function_exists ( 'icl_translate' )){
                $footer_text_image = icl_translate('Widgets', 'Image & Text Widget', esc_html($instance['footer_text_image']));
            }
            echo '<div class="margin-bottom-30 foot-image"><img alt="" src="'.esc_url($image).'" /></div>';
            echo '<p class="foot-txt">'.esc_html($footer_text_image).'</p>';
            echo $args['after_widget'];
        }
        
    }
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $image = $instance['image'];
            $footer_text_image = esc_textarea($instance['footer_text_image']);
        }else {
            $title = esc_html__( 'Image & Text', 'superfine' );
            $image = '';
            $footer_text_image = '';
        }
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','superfine' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'image:','superfine' ); ?></label> 
            <input class="regular-text txt-image" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />
        <input class="upload_image_button btn-image" type="button" value="Upload Image" />
        </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'footer_text_image' ); ?>"><?php _e( 'Footer text:','superfine' ); ?></label> 
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'footer_text_image' ); ?>" name="<?php echo $this->get_field_name( 'footer_text_image' ); ?>"><?php echo esc_attr( $footer_text_image ); ?></textarea>
    </p>
    <?php 
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
        $instance['footer_text_image'] = ( ! empty( $new_instance['footer_text_image'] ) ) ? strip_tags( $new_instance['footer_text_image'] ) : '';
        return $instance;
    }

}