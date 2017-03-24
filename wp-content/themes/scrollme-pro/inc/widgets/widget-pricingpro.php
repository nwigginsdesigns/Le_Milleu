<?php
/**
 * Pricing Widget
 *
 * @package scrollme
 */

add_action('widgets_init', 'register_pricingpro_widget');

function register_pricingpro_widget() {
    register_widget('scrollme_pricingpro');
}

class Scrollme_Pricingpro extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'scrollme_pricingpro', 'AP : Pricing Table Pro', array(
                'description' => __('A widget that shows Pricing Table', 'scrollme-pro')
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
            'ppricing_plan' => array(
                'scrollme_widgets_name' => 'ppricing_plan',
                'scrollme_widgets_title' => __('Plan Name', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_price_currency' => array(
                'scrollme_widgets_name' => 'ppricing_price_currency',
                'scrollme_widgets_title' => __('Currency', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_price' => array(
                'scrollme_widgets_name' => 'ppricing_price',
                'scrollme_widgets_title' => __('Price', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_price_per' => array(
                'scrollme_widgets_name' => 'ppricing_price_per',
                'scrollme_widgets_title' => __('Price Per', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature1' => array(
                'scrollme_widgets_name' => 'ppricing_feature1',
                'scrollme_widgets_title' => __('Feature 1', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature2' => array(
                'scrollme_widgets_name' => 'ppricing_feature2',
                'scrollme_widgets_title' => __('Feature 2', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature3' => array(
                'scrollme_widgets_name' => 'ppricing_feature3',
                'scrollme_widgets_title' => __('Feature 3', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature4' => array(
                'scrollme_widgets_name' => 'ppricing_feature4',
                'scrollme_widgets_title' => __('Feature 4', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature5' => array(
                'scrollme_widgets_name' => 'ppricing_feature5',
                'scrollme_widgets_title' => __('Feature 5', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature6' => array(
                'scrollme_widgets_name' => 'ppricing_feature6',
                'scrollme_widgets_title' => __('Feature 6', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature7' => array(
                'scrollme_widgets_name' => 'ppricing_feature7',
                'scrollme_widgets_title' => __('Feature 6', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_feature7' => array(
                'scrollme_widgets_name' => 'ppricing_feature7',
                'scrollme_widgets_title' => __('Feature 7', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_button_text' => array(
                'scrollme_widgets_name' => 'ppricing_button_text',
                'scrollme_widgets_title' => __('Button Text', 'scrollme-pro'),
                'scrollme_widgets_desc' => __('Leave Empty not to show', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
            ),
            'ppricing_button_link' => array(
                'scrollme_widgets_name' => 'ppricing_button_link',
                'scrollme_widgets_title' => __('Button Link', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'url',
            ),
            'ppricing_button_color' => array(
                'scrollme_widgets_name' => 'ppricing_button_color',
                'scrollme_widgets_title' => __('Button Color', 'scrollme-pro'),
                'scrollme_widgets_field_type' => 'text',
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

        $ppricing_plan = isset( $instance['ppricing_plan'] ) ? esc_attr($instance['ppricing_plan']) : '';
        $ppricing_price_currency = isset( $instance['ppricing_price_currency'] ) ? esc_attr($instance['ppricing_price_currency']) : '';
        $ppricing_price = isset($instance['ppricing_price']) ? esc_attr($instance['ppricing_price']) : '';
        $ppricing_price_per = isset($instance['ppricing_price_per']) ? esc_attr($instance['ppricing_price_per']) : '';
        $ppricing_feature1 = isset($instance['ppricing_feature1']) ? esc_attr($instance['ppricing_feature1']) : '';
        $ppricing_feature2 = isset($instance['ppricing_feature2']) ? esc_attr($instance['ppricing_feature2']) : '';
        $ppricing_feature3 = isset($instance['ppricing_feature3']) ? esc_attr($instance['ppricing_feature3']) : '';
        $ppricing_feature4 = isset($instance['ppricing_feature4']) ? esc_attr($instance['ppricing_feature4']) : '';
        $ppricing_feature5 = isset($instance['ppricing_feature5']) ? esc_attr($instance['ppricing_feature5']) : '';
        $ppricing_feature6 = isset($instance['ppricing_feature6']) ? esc_attr($instance['ppricing_feature6']) : '';
        $ppricing_button_text = isset($instance['ppricing_button_text']) ? esc_attr($instance['ppricing_button_text']) : '';
        $ppricing_button_link = isset($instance['ppricing_button_link']) ? esc_attr($instance['ppricing_button_link']) : '';
        $ppricing_button_color = isset($instance['ppricing_button_color']) ? esc_attr($instance['ppricing_button_color']) : '#43BBD6';

        echo $before_widget;
        ?>
        <div class="wow fadeInUp app-pricing-table app-pricing-table-<?php echo $widget_id; ?>">
            <div class="app-pricing-head">
                <?php if (!empty($ppricing_plan)): ?>
                    <h2>
                        <?php echo $ppricing_plan; ?>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="app-price-box">
                <?php if (!empty($ppricing_price)): ?>
                    <div class="app-pricing-plan">
                        <?php if( !empty( $ppricing_price_currency )) : ?>
                            <span class="currency"><?php echo $ppricing_price_currency; ?></span>
                        <?php endif; ?>

                        <?php if( !empty( $ppricing_price )) : ?>
                            <?php echo $ppricing_price; ?>
                        <?php endif; ?>
                    </div>
                    <?php if( !empty($ppricing_price_per) ) : ?>
                        <div class="app-per"> / <?php echo $ppricing_price_per; ?></div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>

            <div class="app-pricing-features">
                <ul class="app-pricing-features-inner">
                    <?php if (!empty($ppricing_feature1)): ?>
                        <li><?php echo $ppricing_feature1; ?></li>
                    <?php endif; ?>
                    
                    <?php if (!empty($ppricing_feature2)): ?>
                        <li><?php echo $ppricing_feature2; ?></li>
                    <?php endif; ?>

                    <?php if (!empty($ppricing_feature3)): ?>
                        <li><?php echo $ppricing_feature3; ?></li>
                    <?php endif; ?>

                    <?php if (!empty($ppricing_feature4)): ?>
                        <li><?php echo $ppricing_feature4; ?></li>
                    <?php endif; ?>

                    <?php if (!empty($ppricing_feature5)): ?>
                        <li><?php echo $ppricing_feature5; ?></li>
                    <?php endif; ?>

                    <?php if (!empty($ppricing_feature6)): ?>
                        <li><?php echo $ppricing_feature6; ?></li>
                    <?php endif; ?>

                    <?php if (!empty($ppricing_feature7)): ?>
                        <li><?php echo $ppricing_feature7; ?></li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="app-pricing-foot">
                <?php if (!empty($ppricing_button_text)): ?>
                    <div class="app-pricing-readmore"><a class="bttn" href="<?php echo $ppricing_button_link; ?>"><?php echo $ppricing_button_text; ?><i class="fa fa-long-arrow-right"></i></a></div>
                <?php endif; ?>
            </div>
        </div>
        <style>
            .app-pricing-table-<?php echo $widget_id; ?> .app-pricing-foot .app-pricing-readmore{
                background: <?php echo $ppricing_button_color ?>;
            }

            .app-pricing-table-<?php echo $widget_id; ?> .app-pricing-foot .app-pricing-readmore::before {
                    border-left: 26px solid <?php echo $ppricing_button_color ?>;
                }
        </style>
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