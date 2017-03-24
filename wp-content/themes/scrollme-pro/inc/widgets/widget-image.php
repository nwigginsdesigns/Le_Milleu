<?php
/**
 * Testimonial post/page widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Testimonial widget.
 */
add_action('widgets_init', 'register_image_widget');

function register_image_widget() {
    register_widget('accesspress_image');
}

class Accesspress_Image extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'accesspress_image', 'AP : Image Upload', array(
            'description' => __('A widget that upload image', 'scrollme-pro')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'image_title' => array(
                'scrollme_widgets_name' => 'image_title',
                'scrollme_widgets_title' => __('Title', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'image_size' => array(
                'scrollme_widgets_name' => 'image_size',
                'scrollme_widgets_title' => __('Image Size', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'select',
                'scrollme_widgets_field_options' => array(
                    'thumbnail' => 'Thumbnail',
                    'medium' => 'Medium',
                    'large' => 'Large',
                    'full' => 'Full'
                )
            ),
            'image_align' => array(
                'scrollme_widgets_name' => 'image_align',
                'scrollme_widgets_title' => __('Image Align', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'select',
                'scrollme_widgets_field_options' => array(
                    'ap-align-none' => 'None',
                    'ap-align-left' => 'Left',
                    'ap-align-right' => 'Right',
                    'ap-align-center' => 'Center',
                )
            ),
            'image' => array(
                'scrollme_widgets_name' => 'image',
                'scrollme_widgets_title' => __('Upload Image', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'upload',
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
    public function widget($args, $instance) {
        extract($args);

        $image_title = $instance['image_title'];
        $image = $instance['image'];
        $image_size = $instance['image_size'];
        $image_align = $instance['image_align'];


        echo $before_widget;
        ?>
        <?php
        if (!empty($image_title)):
            echo $before_title . $image_title . $after_title;
        endif;
        ?>

        <div class="wow bounceIn <?php echo $image_align; ?>">
            <?php
            if (!empty($image)):
                $attachment_id = attachment_url_to_postid($image);
                $image_array = wp_get_attachment_image_src($attachment_id, $image_size);
                ?>
                <img src = "<?php echo $image_array[0]; ?>" />
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
            $scrollme_widgets_field_value = !empty($instance[$scrollme_widgets_name]) ? esc_attr($instance[$scrollme_widgets_name]) : '';
            scrollme_widgets_show_widget_field($this, $widget_field, $scrollme_widgets_field_value);
        }
    }

}