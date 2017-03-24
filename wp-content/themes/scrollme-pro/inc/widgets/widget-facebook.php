<?php
/**
 * Facebook widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Testimonial widget.
 */
add_action('widgets_init', 'register_facebook_like_widgets');

function register_facebook_like_widgets() {
    register_widget('Facebook_Like_Widget');
}

class Facebook_Like_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'facebook_like_widget', 'AP : Facebook Like', array(
            'description' => __('A widget that shows Facebook Like Box', 'scrollme-pro')
                )
        );
    }


    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            // This widget has no title
            // Other fields
            'facebook_like_title' => array(
                'scrollme_widgets_name' => 'facebook_like_title',
                'scrollme_widgets_title' => __('Title', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'facebook_like_page_url' => array(
                'scrollme_widgets_name' => 'facebook_like_page_url',
                'scrollme_widgets_title' => __('Facebook Page URL', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'url',
            ),
            'facebook_like_width' => array(
                'scrollme_widgets_name' => 'facebook_like_width',
                'scrollme_widgets_title' => __('Width', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'number',
            ),
            'facebook_like_height' => array(
                'scrollme_widgets_name' => 'facebook_like_height',
                'scrollme_widgets_title' => __('Height', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'number',
            ),
            'facebook_small_header' => array(
                'scrollme_widgets_name' => 'facebook_small_header',
                'scrollme_widgets_title' => __('Use Small Header', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'checkbox'
            ),
            'facebook_show_face' => array(
                'scrollme_widgets_name' => 'facebook_show_face',
                'scrollme_widgets_title' => __('Show Friend Faces', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'checkbox'
            ),
            'facebook_tabs' => array(
                'scrollme_widgets_name' => 'facebook_tabs',
                'scrollme_widgets_title' => __('Tabs to render', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'title'
            ),
            'facebook_tab_timeline' => array(
                'scrollme_widgets_name' => 'facebook_tab_timeline',
                'scrollme_widgets_title' => __('Timeline', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'checkbox'
            ),
            'facebook_tab_message' => array(
                'scrollme_widgets_name' => 'facebook_tab_message',
                'scrollme_widgets_title' => __('Message', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'checkbox'
            ),
            'facebook_tab_events' => array(
                'scrollme_widgets_name' => 'facebook_tab_events',
                'scrollme_widgets_title' => __('Events', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'checkbox'
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

        $facebook_like_title = $instance['facebook_like_title'];
        $facebook_like_page_url = $instance['facebook_like_page_url'];
        $facebook_like_width = empty($instance['facebook_like_width']) ? '500' : $instance['facebook_like_width'];
        $facebook_like_height = empty($instance['facebook_like_height']) ? '500' : $instance['facebook_like_height'];
        $facebook_small_header = empty($instance['facebook_small_header']) ? 'false' : 'true';
        $facebook_show_face =  empty($instance['facebook_show_face']) ? 'false' : 'true';
        $adapt_container_width = 'true';
        $facebook_tab_timeline =  empty($instance['facebook_tab_timeline']) ? '' : 'timeline';
        $facebook_tab_message =  empty($instance['facebook_tab_message']) ? '' : 'messages';
        $facebook_tab_events =  empty($instance['facebook_tab_events']) ? '' : 'events';
        $facebook_tabs = array( $facebook_tab_timeline , $facebook_tab_message , $facebook_tab_events);
        $facebook_tabs = array_filter($facebook_tabs);
        $facebook_tabs = implode(",", $facebook_tabs);
        $facebook_hide_cover = 'false';

        echo $before_widget;
        ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1517901295152599";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <div class="ap-facebook-like-box">
            <?php
            if (!empty($facebook_like_title)):
                echo $before_title . $facebook_like_title . $after_title;
            endif;
            ?>
            <div class="fb-page" 
            data-href="<?php echo esc_url($facebook_like_page_url) ?>" 
            data-width = "<?php echo absint($facebook_like_width); ?>"
            data-height = "<?php echo absint($facebook_like_height); ?>"
            data-tabs = "<?php echo $facebook_tabs; ?>"
            data-small-header="<?php echo $facebook_small_header; ?>" 
            data-adapt-container-width="<?php echo $adapt_container_width; ?>" 
            data-hide-cover="<?php echo $facebook_hide_cover; ?>" 
            data-show-facepile="<?php echo $facebook_show_face; ?>">
            <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook">
            <a href="<?php echo esc_url($facebook_like_page_url) ?>">Facebook</a>
            </blockquote></div></div>
        </div>
        <?php
        echo $after_widget;
    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    scrollme_widgets_updated_field_value()       defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
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
     * @param   array $instance Previously saved values from database.
     *
     * @uses    scrollme_widgets_show_widget_field()     defined in widget-fields.php
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