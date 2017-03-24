<?php
/**
 * Scrollme Number Counter Widgets
 *
 * @package scrollme
 */

add_action( 'widgets_init', 'register_number_counter_widgets' );
function register_number_counter_widgets() {
    register_widget( 'WP_Scrollme_Number_Counter' );
}

class WP_Scrollme_Number_Counter extends WP_Widget {

    /* Register Widget with Wordpress */
    function __construct() {
        parent::__construct(
            'scrollme-number-counter',
            __( 'AP: Number Counter', 'scrollme-pro' ),
            array( 'classname' => 'scrollme-number-counter', 'description' => __( 'Number Animation Conter', 'scrollme-pro' ) )
        );
    }
    
    /**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	 private function widget_fields() {
		$fields = array(
			'counter_title' => array(
                'scrollme_widgets_name' => 'counter_title',
                'scrollme_widgets_title' => __('Title','scrollme-pro'),
                'scrollme_widgets_field_type' => 'text'
            ),
            'counter' => array(
                'scrollme_widgets_name' => 'counter',
                'scrollmec_widgets_title' => __('Counter','scrollme-pro'),
                'scrollme_widgets_field_type' => 'number'
            ),
		);
		
		return $fields;
	 }


    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<div class="counter-container">';
        
        $title     = isset( $instance['counter_title'] ) ? esc_attr( $instance['counter_title'] ) : '';
        $counter     = isset( $instance['counter'] ) ? absint( $instance['counter'] ) : 0;
        $tpl_color = get_theme_mod('template_color', '#DF2C45');
        if($tpl_color == ''){$tpl_color = '#DF2C45';}
        ?>
            <div class="counter-wrap clearfix">
                <div class="counter-text"><?php echo sanitize_text_field($title); ?></div>
                <div class="counter-img clearfix">
                    <input type="text" data-width="100" data-fgColor="<?php echo $tpl_color; ?>" data-bgColor="#212c35" data-height="50" value="0" data-number="<?php echo $counter; ?>" min="0" max="100" class="ak-counter clearfix">
                </div>
            </div>
        <?php
        echo '</div>';
        echo $args['after_widget'];
    }


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title     = isset( $instance['counter_title'] ) ? esc_attr( $instance['counter_title'] ) : '';
        $counter     = isset( $instance['counter'] ) ? absint( $instance['counter'] ) : 0;
        ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'counter_title' ); ?>">
            <?php _e('Counter Title', 'scrollme-pro'); ?>
            </label>
            
            <input class="widefat" id="<?php echo $this->get_field_id( 'counter_title' ); ?>" name="<?php echo $this->get_field_name( 'counter_title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id( 'counter' ); ?>">
            <?php _e('Counter Number', 'scrollme-pro'); ?>
            </label>
            
            <input class="widefat" id="<?php echo $this->get_field_id( 'counter' ); ?>" name="<?php echo $this->get_field_name( 'counter' ); ?>" type="number" value="<?php echo $counter; ?>" />
            </p>

            <div class="startKnob" style="display: none;"><?php _e( 'start', 'scrollme-pro' ); ?></div>

    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        
        $instance['counter_title']= sanitize_text_field( $new_instance['counter_title']);
        $instance['counter']= absint($new_instance['counter']);
        return $instance;
    }

}