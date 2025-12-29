<?php
add_action('widgets_init', 'contact_widget_reg');

function contact_widget_reg(){
    register_widget('contact_widget');
}
class contact_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_contact',__('* Contact info', 'superfine'), array( 'description' => esc_html__( 'Contact us widget.', 'superfine' )));
    }
    
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Contact Us','superfine' ) : $instance['title'], $instance, $this->id_base );
    $langcode = '';
    if ( class_exists( 'SitePress' ) ) {
        $langcode = '-'.ICL_LANGUAGE_CODE;
    }
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    
    echo "<ul class='details'><li><i class='fa fa-map-marker shape'></i><span><span class='heavy-font'>";
    echo esc_html(theme_option('contact_address_title'.$langcode)); 
    echo "</span>".esc_html(theme_option('contact_address'.$langcode))."</span></li><li><i class='fa fa-envelope shape'></i><span><span class='heavy-font'>";
    echo esc_html(theme_option('contact_email_title'.$langcode));
    echo "</span><a href='mailto:".esc_html(theme_option('contact_email'))."'>".esc_html(theme_option('contact_email'))."</a></span></li>
    <li><i class='fa fa-phone shape'></i><span><span class='heavy-font'>";
    echo esc_html(theme_option('contact_phone_title'.$langcode));
    echo "</span>".esc_html(theme_option('contact_phone'))."</span></li></ul>";
                
    echo $args['after_widget'];
    }
            
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = esc_html__( 'Contact Us', 'superfine' );
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','superfine' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php 
    }
        
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
}