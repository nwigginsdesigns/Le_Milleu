<?php
/**
 * Testimonial post/page widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Testimonial widget.
 */
add_action('widgets_init', 'register_toggle_widget');

function register_toggle_widget() {
    register_widget('scrollme_toggle');
}

class scrollme_Toggle extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'scrollme_accordion', 'AP : Toggle', array(
            'description' => __('A widget that shows Toggle', 'scrollme-pro')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $status = array(
            'close' => 'Close',
            'open' => 'Open',    
        );
        $fields = array(
            // This widget has no title
            // Other fields
            'toggle_title' => array(
                'scrollme_widgets_name' => 'toggle_title',
                'scrollme_widgets_title' => __('Toggle Title', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'textarea',
                'scrollme_widgets_row' => '3'
            ),
            'toggle_content' => array(
                'scrollme_widgets_name' => 'toggle_content',
                'scrollme_widgets_title' => __('Toggle Content', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'textarea',
                'scrollme_widgets_row' => '6'
            ),
            'toggle_status' => array(
                'scrollme_widgets_name' => 'toggle_status',
                'scrollme_widgets_title' => __('Toggle Status', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'select',
                'scrollme_widgets_field_options' => $status
            )
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
    public function widget($args, $instance) {
        extract($args);

        $toggle_title = $instance['toggle_title'];
        $toggle_content = $instance['toggle_content'];
        $toggle_status = $instance['toggle_status'];
        $toggle_class = '';

        if($toggle_status == 'open'){
            $toggle_class = 'active';
        }

        echo $before_widget;
        ?>
        <div class="ap_toggle <?php echo $toggle_class; ?>">
        <?php if (isset($toggle_title)): ?>
            <div class="ap_toggle_title"><?php echo $toggle_title; ?></div>
        <?php endif; ?>

        <?php if (isset($toggle_content)): ?>
            <div class="ap_toggle_content" <?php if($toggle_status == 'close'){ echo 'style="display: none";'; } ?> >
            <?php echo $toggle_content; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	scrollme_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$scrollme_widgets_name] = scrollme_widgets_updated_field_value($widget_field, $new_instance[$scrollme_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	scrollme_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $scrollme_widgets_field_value = isset($instance[$scrollme_widgets_name]) ? esc_attr($instance[$scrollme_widgets_name]) : '';
            scrollme_widgets_show_widget_field($this, $widget_field, $scrollme_widgets_field_value);
        }
    }

}