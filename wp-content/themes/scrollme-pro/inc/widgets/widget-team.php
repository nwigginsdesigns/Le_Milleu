<?php
/**
 * Team post/page widget
 *
 * @package Accesspress Pro
 */
/**
 * Adds scrollme_Team widget.
 */
add_action('widgets_init', 'register_team_widget');

function register_team_widget() {
    register_widget('scrollme_team');
}

class scrollme_Team extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'scrollme_team', 'AP : Team Member', array(
            'description' => __('A widget that shows Team Member', 'scrollme-pro')
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
            'team_upload' => array(
                'scrollme_widgets_name' => 'team_upload',
                'scrollme_widgets_title' => __('Team Member Image', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'upload',
            ),
            'team_member_name' => array(
                'scrollme_widgets_name' => 'team_member_name',
                'scrollme_widgets_title' => __('Team Member Name', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'team_member_position' => array(
                'scrollme_widgets_name' => 'team_member_position',
                'scrollme_widgets_title' => __('Team Member Position', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'team_detail' => array(
                'scrollme_widgets_name' => 'team_detail',
                'scrollme_widgets_title' => __('Team Member Detail', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'textarea',
                'scrollme_widgets_row' => '6'
            ),
            'team_social_facebook' => array(
                'scrollme_widgets_name' => 'team_social_facebook',
                'scrollme_widgets_title' => __('Team Member Facebook url', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'url',
            ),
            'team_social_twitter' => array(
                'scrollme_widgets_name' => 'team_social_twitter',
                'scrollme_widgets_title' => __('Team Member Twitter url', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'url',
            ),
            'team_social_skype' => array(
                'scrollme_widgets_name' => 'team_social_skype',
                'scrollme_widgets_title' => __('Team Member Skype', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'url',
            ),
            'team_social_linkedin' => array(
                'scrollme_widgets_name' => 'team_social_linkedin',
                'scrollme_widgets_title' => __('Team Member Linkedin url', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'url',
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

        $team_upload = $instance['team_upload'];
        $team_member_name = $instance['team_member_name'];
        $team_design = $instance['team_member_position'];
        $team_detail = $instance['team_detail'];
        $sme_team_fb = $instance['team_social_facebook'];
        $sme_team_tw = $instance['team_social_twitter'];
        $sme_team_skype = $instance['team_social_skype'];
        $sme_team_lnk = $instance['team_social_linkedin'];

        echo $before_widget;
        ?>
        <div class="team-member">
            <?php if(isset($team_upload)) : ?>
                <?php
                    $attachment_id = attachment_url_to_postid($team_upload);
                    $img = wp_get_attachment_image_src($attachment_id, 'scrollme-team-thumbnail');
                    $img_src = $img[0];
                ?>
                <img class="team-member-img" src="<?php echo $img_src; ?>" />
            <?php endif; ?>

            <div class="team-info">
                <p>
                    <?php if($team_member_name != '') : ?>
                        <?php echo $team_member_name; ?>
                    <?php endif; ?>
                    
                    <?php if($team_design != '') : ?>
                        <span> - <?php echo $team_design; ?></span>
                    <?php endif; ?>
                </p>

                <?php if($sme_team_fb != '' || $sme_team_tw != '' || $sme_team_skype != '' || $sme_team_lnk != '') : ?>
                    <div class="team-social-links">
                        <?php if($sme_team_fb != '') : ?>
                            <a href="<?php echo esc_url($sme_team_fb); ?>"><i class="fa fa-facebook-square fb1"></i></a>
                        <?php endif; ?>

                        <?php if($sme_team_tw != '') : ?>
                            <a href="<?php echo esc_url($sme_team_tw); ?>" ><i class="fa fa-twitter-square twt1"></i></a>
                        <?php endif; ?>

                        <?php if($sme_team_skype != '') : ?>
                            <a href="<?php echo esc_url_raw($sme_team_skype); ?>"><i class="fa fa-skype skyp1"></i></a>
                        <?php endif; ?>

                        <?php if($sme_team_lnk != '') : ?>
                            <a href="<?php echo esc_url_raw($sme_team_lnk); ?>"><i class="fa fa-linkedin-square lnk1"></i></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div><!--connect-to-->
        </div><!--team-1-->
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