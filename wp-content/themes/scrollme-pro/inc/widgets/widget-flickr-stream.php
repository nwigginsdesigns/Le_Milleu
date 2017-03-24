<?php
/**
 * Flickr Stream Widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Flickr_Stream widget.
 */
add_action('widgets_init', create_function('', 'register_widget( "scrollme_flickr_stream" );'));

class scrollme_Flickr_Stream extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'scrollme_flickr_stream', 'AP : Flickr Stream', array(
            'description' => __('Displays your Flickr photos.', 'scrollme-pro')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            // Title
            'widget_title' => array(
                'scrollme_widgets_name' => 'widget_title',
                'scrollme_widgets_title' => __('Title', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text'
            ),
            // Other fields
            'flickr_id' => array(
                'scrollme_widgets_name' => 'flickr_id',
                'scrollme_widgets_title' => __('Flickr ID', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text'
            ),
            'photo_count' => array(
                'scrollme_widgets_name' => 'photo_count',
                'scrollme_widgets_title' => __('Number of Photos', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'select',
                'scrollme_widgets_field_options' => array(
                    '4' => '4',
                    '8' => '8',
                    '12' => '12',
                    '16' => '16',
                )
            ),
            'photo_type' => array(
                'scrollme_widgets_name' => 'photo_type',
                'scrollme_widgets_title' => __('Type (user or group)', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'select',
                'scrollme_widgets_field_options' => array(
                    'user' => 'User',
                    'group' => 'Group'
                )
            ),
            'photo_display' => array(
                'scrollme_widgets_name' => 'photo_display',
                'scrollme_widgets_title' => __('Display', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'select',
                'scrollme_widgets_field_options' => array(
                    'latest' => 'Latest',
                    'random' => 'Random'
                )
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

        $widget_title = apply_filters('widget_title', $instance['widget_title']);
        $flickr_id = strip_tags($instance['flickr_id']);
        $photo_count = $instance['photo_count'];
        $photo_type = $instance['photo_type'];
        $photo_display = $instance['photo_display'];

        echo $before_widget;

        // Show title
        if (isset($widget_title)) {
            echo $before_title . $widget_title . $after_title;
        }
        ?>
        <div class="clearfix widget-flickr-stream">
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $photo_count ?>&amp;display=<?php echo $photo_display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $photo_type ?>&amp;<?php echo $photo_type ?>=<?php echo $flickr_id ?>"></script>
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
     * @uses	scrollme_widgets_show_widget_field()		defined in widget-fields.php
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
     * @param array $instance Previously saved values from database.
     * <ins></ins>
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