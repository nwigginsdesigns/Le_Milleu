<?php
/**
 * scrollme Theme Customizer
 *
 * @package scrollme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scrollme_customize_register( $wp_customize ) {
         
	
}

/** Extra Controls **/
if(class_exists('WP_Customize_Control')) {
    class WP_Customize_Help_Control extends WP_Customize_Control{            
        public function render_content() {
            $input_attrs = $this->input_attrs;
            $info = isset($input_attrs['info']) ? $input_attrs['info'] : '';
            ?>
            <div class="help-info">
                <h4><?php _e('Instruction', 'scrollme-pro'); ?></h4>
                <div style="font-weight: bold;">
                    <?php echo $info; ?>
                </div>
            </div>
            <?php
        }
    }
}


add_action( 'customize_register', 'scrollme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scrollme_customize_preview_js() {
	wp_enqueue_script( 'scrollme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'scrollme_customize_preview_js' );