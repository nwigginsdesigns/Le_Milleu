<?php
/**
 * Testimonial post/page widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Testimonial widget.
 */
add_action('widgets_init', 'register_testimonial_widget');

function register_testimonial_widget() {
    register_widget('scrollme_testimonial');
}

class scrollme_Testimonial extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'scrollme_testimonial', 'AP : Testimonial', array(
            'description' => __('A widget that shows Testimonial', 'scrollme-pro')
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
            'testimonial_upload' => array(
                'scrollme_widgets_name' => 'testimonial_upload',
                'scrollme_widgets_title' => __('Client Image', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'upload',
            ),
            'testimonial_client_name' => array(
                'scrollme_widgets_name' => 'testimonial_client_name',
                'scrollme_widgets_title' => __('Client Name', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'testimonial_client_position' => array(
                'scrollme_widgets_name' => 'testimonial_client_position',
                'scrollme_widgets_title' => __('Client Position', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'testimonial_client_company' => array(
                'scrollme_widgets_name' => 'testimonial_client_company',
                'scrollme_widgets_title' => __('Client Company', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'testimonial_detail' => array(
                'scrollme_widgets_name' => 'testimonial_detail',
                'scrollme_widgets_title' => __('Testimonial', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'textarea',
                'scrollme_widgets_row' => '6'
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

        $testimonial_client_name = $instance['testimonial_client_name'];
        $designation = $instance['testimonial_client_position'];
        $company = $instance['testimonial_client_company'];
        $testimonial_detail = $instance['testimonial_detail'];
        $testimonial_upload = $instance['testimonial_upload'];

        echo $before_widget;
        ?>
        <div class="test-wrap">
            <?php
                $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'scrollme-test-thumbnail'); $img_src = $img[0];
                $excerpt = get_scrollme_excerpt('', 330, false, '');
            ?>
            <div class="test-content">
                <i class='fa fa-quote-left'></i>
                <?php if(isset($testimonial_detail)) : ?>
                    <p><?php echo $testimonial_detail; ?></p>
                <?php endif; ?>
            </div><!--testimonial-content-->

            <div class="test-details">
                <div class="test-img">
                    <?php if(isset($testimonial_upload)) : ?>
                        <?php
                            $attachment_id = attachment_url_to_postid($testimonial_upload);
                            $img = wp_get_attachment_image_src($attachment_id, 'scrollme-test-thumbnail');
                            $img_src = $img[0];
                        ?>
                        <img src="<?php echo $img_src; ?>" />
                    <?php endif; ?>
                </div><!--img-right-->

                <div class="test-infos">
                    <p>
                        <?php echo $testimonial_client_name; ?>
                    </p>

                    <?php if($company != '' || $designation != '') : ?>
                        <span>
                            <?php if($company != '') : ?>
                                <?php echo esc_attr($company); ?>
                            <?php endif; ?>
                            <?php if($designation != '') : ?>
                                 - 
                                <?php echo esc_attr($designation); ?>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div><!--detail-sec-->
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