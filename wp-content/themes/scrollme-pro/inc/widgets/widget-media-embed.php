<?php
/**
 * oEmbed widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Media_Embed widget.
 */
add_action('widgets_init', create_function('', 'register_widget( "scrollme_media_embed" );'));

class scrollme_Media_Embed extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'scrollme_media_embed', 'AP : Media Embed', array(
            'description' => __('Display media (video/slideshow) widget, support many sites including YouTube, Vimeo, Flickr, etc.', 'scrollme-pro')
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
            'embed_url' => array(
                'scrollme_widgets_name' => 'embed_url',
                'scrollme_widgets_title' => __('Embed URL', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text'
            ),
            'embed_width' => array(
                'scrollme_widgets_name' => 'embed_width',
                'scrollme_widgets_title' => __('Embed width in pixels', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'number'
            ),
            'embed_description' => array(
                'scrollme_widgets_name' => 'embed_description',
                'scrollme_widgets_title' => __('Description', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'textarea',
                'scrollme_widgets_row' => '6',
                'scrollme_widgets_allowed_tags' => '<strong>'
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

        $widget_title = apply_filters('widget_title', $instance['widget_title']);
        $embed_url = $instance['embed_url'];
        $embed_width = $instance['embed_width'];
        $embed_description = $instance['embed_description'];

        echo $before_widget;
        ?>

        <div class="widget-oembed">
            <?php
            // Show title
            if (!empty($widget_title)) {
                echo $before_title . $widget_title . $after_title;
            }
            ?>

            <?php
            // Check if embed URL is entered
            if (!empty($embed_url)) {
                echo '<div class="widget-oembed-content">';
                // Check if user entered embed width
                if (!empty($embed_width) && $embed_width > 0) {
                    echo wp_oembed_get($embed_url, array('width' => $embed_width));
                } else {
                    echo wp_oembed_get($embed_url);
                }
                echo '<!-- .widget-oembed-content --></div>';
            }

            if (!empty($embed_description)) {
                echo '<div class="widget-oembed-description">' . $embed_description . '</div>';
            }
            ?>
            <!-- .widget-oembed --></div>

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