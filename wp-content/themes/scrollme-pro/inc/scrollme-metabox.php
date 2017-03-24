<?php
/**
 * Scrollme Custom Metabox
 *
 * @package scrollme
 */

add_action('add_meta_boxes', 'scrollme_add_metabox');
function scrollme_add_metabox()
{
    add_meta_box(
        'scrollme_sidebar_layout', // $id
        'Sidebar Layout', // $title
        'scrollme_sidebar_layout_callback', // $callback
        'post', // $page
        'normal', // $context
        'high'); // $priority

    add_meta_box(
        'scrollme_sidebar_layout', // $id
        'Sidebar Layout', // $title
        'scrollme_sidebar_layout_callback', // $callback
        'page', // $page
        'normal', // $context
        'high'); // $priority

    /* Team */
    add_meta_box(
        'scrollme_team_options', // $id
        __('Team Member Details', 'scrollme-pro'), // $title
        'scrollme_team_options', // $callback
        'team', // $page
        'normal', // $context
        'high'
    ); // $priority

    /* Testimonial */
    add_meta_box(
        'scrollme_test_options', // $id
        __('Client Company & Designation', 'scrollme-pro'), // $title
        'scrollme_test_options', // $callback
        'testimonials', // $page
        'normal', // $context
        'high'
    ); // $priority

    /* Service Icons */
    add_meta_box(
        'scrollme_service_icons', // $id
        __('Service Icons', 'scrollme-pro'), // $title
        'scrollme_test_options', // $callback
        'services', // $page
        'normal', // $context
        'high'
    ); // $priority

    /* Portfolio Meta Options */
    add_meta_box(
        'scrollme_port_moptions', // $id
        __('Portfoliio Details', 'scrollme-pro'), // $title
        'scrollme_port_moptions', // $callback
        'portfolio', // $page
        'normal', // $context
        'high'
    ); // $priority

    /* Gallery Image Options */
    add_meta_box(
        'scrollme_gal_images', // $id
        __('Galleries', 'scrollme-pro'), // $title
        'scrollme_gal_images', // $callback
        'galleries', // $page
        'normal', // $context
        'high'
    ); // $priority

}


$scrollme_sidebar_layout = array(
    'right-sidebar' => array(
        'value' => 'right_sidebar',
        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
    ),
    'left-sidebar' => array(
        'value'     => 'left_sidebar',
        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
    ),
    'no-sidebar' => array(
        'value'     => 'no_sidebar',
        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
    )

);

function scrollme_sidebar_layout_callback()
{
    global $post , $scrollme_sidebar_layout;
    wp_nonce_field( 'scrollme_sidebar_layout_action', 'scrollme_sidebar_layout_nonce' );
    ?>

    <table class="form-table page-meta-box">
        <tr>
            <td colspan="4"><?php _e( 'Choose Sidebar Template', 'scrollme-pro' ); ?></td>
        </tr>

        <tr>
            <td>
                <?php
                foreach ($scrollme_sidebar_layout as $field) {
                    $scrollme_sidebar_metalayout = get_post_meta( $post->ID, 'scrollme_sidebar_layout', true ); 
                    if(!$scrollme_sidebar_metalayout){
                        $scrollme_sidebar_metalayout = 'right_sidebar';
                    }
                    ?>

                    <div style="float:left; margin-right:30px;">
                        <label>
                            <input id="<?php echo $field['value']; ?>" type="radio" name="scrollme_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked($field['value'], $scrollme_sidebar_metalayout ); ?>/>
                        
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function scrollme_save_sidebar_layout( $post_id ) {
    global $scrollme_sidebar_layout, $post;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'scrollme_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'scrollme_sidebar_layout_nonce' ], 'scrollme_sidebar_layout_action' ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
        return;

    if ('page' == $_POST['post_type']) {
        if (!current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }


    foreach ($scrollme_sidebar_layout as $field) {
        //Execute this saving function
        $old = get_post_meta( $post_id, 'scrollme_sidebar_layout', true);
        $new = sanitize_text_field($_POST['scrollme_sidebar_layout']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'scrollme_sidebar_layout', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'scrollme_sidebar_layout', $old);
        }
    } // end foreach

}
add_action('save_post', 'scrollme_save_sidebar_layout');

/** Team Post Meta Options **/
    function scrollme_team_options() {
        global $post;
        wp_nonce_field( 'scrollme_team_options_action', 'scrollme_team_options' );
        
        /* Designation */
        $sme_team_designation = get_post_meta($post->ID, 'sme_team_designation', true);
        if(empty($sme_team_designation)){$sme_team_designation = '';}

        /* Social Icons */
        $sme_team_fb = get_post_meta($post->ID, 'sme_team_fb', true);
        if(empty($sme_team_fb)){$sme_team_fb = '';}

        $sme_team_tw = get_post_meta($post->ID, 'sme_team_tw', true);
        if(empty($sme_team_tw)){$sme_team_tw = '';}

        $sme_team_skype = get_post_meta($post->ID, 'sme_team_skype', true);
        if(empty($sme_team_skype)){$sme_team_skype = '';}

        $sme_team_lnk = get_post_meta($post->ID, 'sme_team_lnk', true);
        if(empty($sme_team_lnk)){$sme_team_lnk = '';}

        $sme_team_skill1_label = get_post_meta($post->ID, 'sme_team_skill1_label', true);
        if(empty($sme_team_skill1_label)){$sme_team_skill1_label = '';}

        $sme_team_skill1_val = get_post_meta($post->ID, 'sme_team_skill1_val', true);
        if(empty($sme_team_skill1_val)){$sme_team_skill1_val = '';}

        $sme_team_skill2_label = get_post_meta($post->ID, 'sme_team_skill2_label', true);
        if(empty($sme_team_skill2_label)){$sme_team_skill2_label = '';}

        $sme_team_skill2_val = get_post_meta($post->ID, 'sme_team_skill2_val', true);
        if(empty($sme_team_skill2_val)){$sme_team_skill2_val = '';}

        $sme_team_skill3_label = get_post_meta($post->ID, 'sme_team_skill3_label', true);
        if(empty($sme_team_skill3_label)){$sme_team_skill3_label = '';}

        $sme_team_skill3_val = get_post_meta($post->ID, 'sme_team_skill3_val', true);
        if(empty($sme_team_skill3_val)){$sme_team_skill3_val = '';}

        $sme_team_skill4_label = get_post_meta($post->ID, 'sme_team_skill4_label', true);
        if(empty($sme_team_skill4_label)){$sme_team_skill4_label = '';}

        $sme_team_skill4_val = get_post_meta($post->ID, 'sme_team_skill4_val', true);
        if(empty($sme_team_skill4_val)){$sme_team_skill4_val = '';}

        /* */
        ?>
            <div class="mta-scme-desgn">
                <h2 class="scme_meta_head"><?php _e('Designation', 'scrollme-pro'); ?></h2>

                <p>
                <label for="sme_team_designation"></label>
                <input placeholder="CEO" id="sme_team_designation" type="text" name="sme_team_designation" value="<?php echo esc_attr($sme_team_designation); ?>">
                </p>

            </div>
            <div  class="mta-scme-slink">
                <h2 class="scme_meta_head"><?php _e('Social Links', 'scrollme-pro'); ?></h2>
                <p>
                <label for="sme_team_fb"><?php _e('Facebook', 'scrollme-pro'); ?></label>
                <input placeholder="http://www.facebook.com/username" id="sme_team_fb" type="text" name="sme_team_fb" value="<?php echo esc_url_raw($sme_team_fb); ?>">
                </p>

                <p>
                <label for="sme_team_tw"><?php _e('Twitter', 'scrollme-pro'); ?></label>
                <input placeholder="http://www.twitter.com/username" id="sme_team_tw" type="text" name="sme_team_tw" value="<?php echo esc_url_raw($sme_team_tw); ?>">
                </p>

                <p>
                <label for="sme_team_skype"><?php _e('Skype', 'scrollme-pro'); ?></label>
                <input placeholder="http://www.skype.com/username" id="sme_team_skype" type="text" name="sme_team_skype" value="<?php echo esc_url_raw($sme_team_skype); ?>">
                </p>

                <p>
                <label for="sme_team_lnk"><?php _e('Linkedin', 'scrollme-pro'); ?></label>
                <input placeholder="http://www.linkedin.com/username" id="sme_team_lnk" type="text" name="sme_team_lnk" value="<?php echo esc_url_raw($sme_team_lnk); ?>">
                </p>
            </div>
            <div class="mta-scme-skill">
                <h2 class="scme_meta_head"><?php _e('Skills', 'scrollme-pro'); ?></h2>
                <p>
                    <label for="sme_team_skill1_label"><?php _e('Skill 1', 'scrollme-pro'); ?></label>
                    <input placeholder="Programming" id="sme_team_skill1_label" type="text" name="sme_team_skill1_label" value="<?php echo esc_attr($sme_team_skill1_label); ?>">
                    <input placeholder="50" name="sme_team_skill1_val" type="number" step="1" min="1" max="100"  value="<?php echo $sme_team_skill1_val; ?>"  />
                </p>
                <p>
                    <label for="sme_team_skill2_label"><?php _e('Skill 2', 'scrollme-pro'); ?></label>
                    <input placeholder="Programming" id="sme_team_skill2_label" type="text" name="sme_team_skill2_label" value="<?php echo esc_attr($sme_team_skill2_label); ?>">
                    <input placeholder="50" name="sme_team_skill2_val" type="number" step="1" min="1" max="100"  value="<?php echo $sme_team_skill2_val; ?>"  />
                </p>
                <p>
                    <label for="sme_team_skill3_label"><?php _e('Skill 3', 'scrollme-pro'); ?></label>
                    <input placeholder="Programming" id="sme_team_skill3_label" type="text" name="sme_team_skill3_label" value="<?php echo esc_attr($sme_team_skill3_label); ?>">
                    <input placeholder="50" name="sme_team_skill3_val" type="number" step="1" min="1" max="100"  value="<?php echo $sme_team_skill3_val; ?>"  />
                </p>
                <p>
                    <label for="sme_team_skill4_label"><?php _e('Skill 3', 'scrollme-pro'); ?></label>
                    <input placeholder="Programming" id="sme_team_skill4_label" type="text" name="sme_team_skill4_label" value="<?php echo esc_attr($sme_team_skill4_label); ?>">
                    <input placeholder="50" name="sme_team_skill4_val" type="number" step="1" min="1" max="100"  value="<?php echo $sme_team_skill4_val; ?>"  />
                </p>
            </div>
        <?php 
    }
    
    function scrollme_save_team_options( $post_id ) {
        global $post;
        
        if ( !isset( $_POST[ 'scrollme_team_options' ] ) || !wp_verify_nonce( $_POST[ 'scrollme_team_options' ], 'scrollme_team_options_action' ) )
            return;
        
        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
        
        if ('team' == $_POST['post_type']) {
            if (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;
            }
        }
        
        /** Sanitize **/
            /* Designation */
            $sme_team_designation = sanitize_text_field($_POST['sme_team_designation']);

            /* Social Links */
            $sme_team_fb = esc_url_raw($_POST['sme_team_fb']);
            $sme_team_tw = esc_url_raw($_POST['sme_team_tw']);
            $sme_team_skype = esc_url_raw($_POST['sme_team_skype']);
            $sme_team_lnk = esc_url_raw($_POST['sme_team_lnk']);

            /* Skills */
            $sme_team_skill1_label = sanitize_text_field($_POST['sme_team_skill1_label']);
            $sme_team_skill1_val = absint($_POST['sme_team_skill1_val']);
            $sme_team_skill2_label = sanitize_text_field($_POST['sme_team_skill2_label']);
            $sme_team_skill2_val = absint($_POST['sme_team_skill2_val']);
            $sme_team_skill3_label = sanitize_text_field($_POST['sme_team_skill3_label']);
            $sme_team_skill3_val = absint($_POST['sme_team_skill3_val']);
            $sme_team_skill4_label = sanitize_text_field($_POST['sme_team_skill4_label']);
            $sme_team_skill4_val = absint($_POST['sme_team_skill4_val']);

        /** Update **/
            /* Designation */
            update_post_meta($post_id, 'sme_team_designation', $sme_team_designation);

            /* Social Links */
            update_post_meta($post_id, 'sme_team_fb', $sme_team_fb);
            update_post_meta($post_id, 'sme_team_tw', $sme_team_tw);
            update_post_meta($post_id, 'sme_team_skype', $sme_team_skype);
            update_post_meta($post_id, 'sme_team_lnk', $sme_team_lnk);

            /* Skills */
            update_post_meta($post_id, 'sme_team_skill1_label', $sme_team_skill1_label);
            update_post_meta($post_id, 'sme_team_skill1_val', $sme_team_skill1_val);
            update_post_meta($post_id, 'sme_team_skill2_label', $sme_team_skill2_label);
            update_post_meta($post_id, 'sme_team_skill2_val', $sme_team_skill2_val);
            update_post_meta($post_id, 'sme_team_skill3_label', $sme_team_skill3_label);
            update_post_meta($post_id, 'sme_team_skill3_val', $sme_team_skill3_val);
            update_post_meta($post_id, 'sme_team_skill4_label', $sme_team_skill4_label);
            update_post_meta($post_id, 'sme_team_skill4_val', $sme_team_skill4_val);
    }
    
    add_action('save_post', 'scrollme_save_team_options');


    /** Testimonial Post Meta Options **/
    function scrollme_test_options() {
        global $post;
        wp_nonce_field( 'scrollme_test_options_action', 'scrollme_test_options' );
        
        /* Company */
        $sme_test_company = get_post_meta($post->ID, 'sme_test_company', true);
        if(empty($sme_test_company)){$sme_test_company = '';}

        /* Designation */
        $sme_test_designation = get_post_meta($post->ID, 'sme_test_designation', true);
        if(empty($sme_test_designation)){$sme_test_designation = '';}
        ?>
            <div class="compdesing-meta-wrap">
                <p>
                <label for="sme_test_company"><?php _e('Company Name : ', 'scrollme-pro'); ?></label>
                <input placeholder="ABC & Corp" id="sme_test_company" type="text" name="sme_test_company" value="<?php echo esc_attr($sme_test_company); ?>">
                </p>

                <p>
                <label for="sme_test_designation"><?php _e('Designation : ', 'scrollme-pro'); ?></label>
                <input placeholder="CEO" id="sme_test_designation" type="text" name="sme_test_designation" value="<?php echo esc_attr($sme_test_designation); ?>">
                </p>
            </div>
        <?php 
    }
    
    function scrollme_save_test_options( $post_id ) {
        global $post;
        
        if ( !isset( $_POST[ 'scrollme_test_options' ] ) || !wp_verify_nonce( $_POST[ 'scrollme_test_options' ], 'scrollme_test_options_action' ) )
            return;
        
        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
        
        if ('testimonials' == $_POST['post_type']) {
            if (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;
            }
        }
        
        /** Sanitize **/
            /* Designation */
            $sme_test_company = sanitize_text_field($_POST['sme_test_company']);
            $sme_test_designation = sanitize_text_field($_POST['sme_test_designation']);

            
        /** Update **/
            /* Designation */
            update_post_meta($post_id, 'sme_test_company', $sme_test_company);
            update_post_meta($post_id, 'sme_test_designation', $sme_test_designation);
    }
    
    add_action('save_post', 'scrollme_save_test_options');

    /** Scrollme Service Icons Options **/
    function scrollme_service_icons() {
        global $post;
        wp_nonce_field( 'scrollme_service_icons_nonce', 'scrollme_service_icons' );
        
        /* Company */
        $sme_service_icon = get_post_meta($post->ID, 'sme_service_icon', true);
        if(empty($sme_service_icon)){$sme_service_icon = '';}

        /* Designation */
        $sme_test_designation = get_post_meta($post->ID, 'sme_test_designation', true);
        if(empty($sme_test_designation)){$sme_test_designation = '';}
        ?>
            <div class="service-icon-wrapper">
                    
            </div>
            <input id="sme_test_designation" type="text" name="sme_test_designation" value="<?php echo esc_attr($sme_test_designation); ?>">
        <?php 
    }
    
    function scrollme_save_service_icons( $post_id ) {
        global $post;
        
        if ( !isset( $_POST[ 'scrollme_test_options' ] ) || !wp_verify_nonce( $_POST[ 'scrollme_test_options' ], 'scrollme_service_icons_nonce' ) )
            return;
        
        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
        
        if ('testimonials' == $_POST['post_type']) {
            if (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;
            }
        }
        
        /** Sanitize **/
            /* Designation */
            $sme_test_company = sanitize_text_field($_POST['sme_test_company']);
            $sme_test_designation = sanitize_text_field($_POST['sme_test_designation']);

            
        /** Update **/
            /* Designation */
            update_post_meta($post_id, 'sme_test_company', $sme_test_company);
            update_post_meta($post_id, 'sme_test_designation', $sme_test_designation);
    }
    
    add_action('save_post', 'scrollme_save_test_options');

    /** Scrollme Meta Options **/
    function scrollme_port_moptions( $post_id ) {
        global $post;
        wp_nonce_field( 'scrollme_port_moptions_action', 'scrollme_port_moptions' );
        
        /* Portfolio Details */
        $sme_port_details = get_post_meta($post->ID, 'sme_port_details', true);
        if(empty($sme_port_details)){$sme_port_details = '';}

        /* Portfolio Fields */
            // Labels
            $sme_port_field1_label = get_post_meta($post->ID, 'sme_port_field1_label', true);
            if(empty($sme_port_field1_label)){$sme_port_field1_label = '';}

            $sme_port_field2_label = get_post_meta($post->ID, 'sme_port_field2_label', true);
            if(empty($sme_port_field2_label)){$sme_port_field2_label = '';}

            $sme_port_field3_label = get_post_meta($post->ID, 'sme_port_field3_label', true);
            if(empty($sme_port_field3_label)){$sme_port_field3_label = '';}

            $sme_port_field4_label = get_post_meta($post->ID, 'sme_port_field4_label', true);
            if(empty($sme_port_field4_label)){$sme_port_field4_label = '';}

            $sme_port_field5_label = get_post_meta($post->ID, 'sme_port_field5_label', true);
            if(empty($sme_port_field5_label)){$sme_port_field5_label = '';}

            // Values
            $sme_port_field1_val = get_post_meta($post->ID, 'sme_port_field1_val', true);
            if(empty($sme_port_field1_val)){$sme_port_field1_val = '';}

            $sme_port_field2_val = get_post_meta($post->ID, 'sme_port_field2_val', true);
            if(empty($sme_port_field2_val)){$sme_port_field2_val = '';}

            $sme_port_field3_val = get_post_meta($post->ID, 'sme_port_field3_val', true);
            if(empty($sme_port_field3_val)){$sme_port_field3_val = '';}

            $sme_port_field4_val = get_post_meta($post->ID, 'sme_port_field4_val', true);
            if(empty($sme_port_field4_val)){$sme_port_field4_val = '';}

            $sme_port_field5_val = get_post_meta($post->ID, 'sme_port_field5_val', true);
            if(empty($sme_port_field5_val)){$sme_port_field5_val = '';}

        /* */
        ?>
            <div class="mta-scme-port_details">
                <h2 class="mta-scme-port-details-heading"><?php _e('Project Details', 'scrollme-pro'); ?></h2>
                <p>
                    <label for="sme_port_details"><?php _e('Details :', 'scrollme-pro'); ?></label>
                    <textarea placeholder="Write a short details on the project..." id="sme_port_details" name="sme_port_details"><?php echo esc_textarea($sme_port_details); ?></textarea>
                </p>
            </div>
            <div class="mta-scme-port_fields">
                <h2 class="mta-scme-port-details-heading"><?php _e('Portfolio Fields', 'scrollme-pro'); ?></h2>
                <p>
                    <label for="sme_port_field1_label"><?php _e('Field 1 :', 'scrollme-pro'); ?></label>
                    <input placeholder="e.g. Project Type" id="sme_port_field1_label" type="text" name="sme_port_field1_label" value="<?php echo sanitize_text_field($sme_port_field1_label); ?>">
                    <input placeholder="e.g. Web, Design" id="sme_port_field1_val" type="text" name="sme_port_field1_val" value="<?php echo sanitize_text_field($sme_port_field1_val); ?>">
                </p>

                <p>
                    <label for="sme_port_field2_label"><?php _e('Field 2 :', 'scrollme-pro'); ?></label>
                    <input placeholder="e.g. Client" id="sme_port_field2_label" type="text" name="sme_port_field2_label" value="<?php echo sanitize_text_field($sme_port_field2_label); ?>">
                    <input placeholder="e.g. Mrs. JK Shally" id="sme_port_field2_val" type="text" name="sme_port_field2_val" value="<?php echo sanitize_text_field($sme_port_field2_val); ?>">
                </p>

                <p>
                    <label for="sme_port_field3_label"><?php _e('Field 3 :', 'scrollme-pro'); ?></label>
                    <input placeholder="e.g. Range" id="sme_port_field3_label" type="text" name="sme_port_field3_label" value="<?php echo sanitize_text_field($sme_port_field3_label); ?>">
                    <input placeholder="e.g. International" id="sme_port_field3_val" type="text" name="sme_port_field3_val" value="<?php echo sanitize_text_field($sme_port_field3_val); ?>">
                </p>

                <p>
                    <label for="sme_port_field4_label"><?php _e('Field 4 :', 'scrollme-pro'); ?></label>
                    <input placeholder="e.g. Cost" id="sme_port_field4_label" type="text" name="sme_port_field4_label" value="<?php echo sanitize_text_field($sme_port_field4_label); ?>">
                    <input placeholder="e.g. $4,000 US" id="sme_port_field4_val" type="text" name="sme_port_field4_val" value="<?php echo sanitize_text_field($sme_port_field4_val); ?>">
                </p>

                <p>
                    <label for="sme_port_field5_label"><?php _e('Field 5 :', 'scrollme-pro'); ?></label>
                    <input placeholder="e.g. Duration" id="sme_port_field5_label" type="text" name="sme_port_field5_label" value="<?php echo sanitize_text_field($sme_port_field5_label); ?>">
                    <input placeholder="e.g. 6-8 Months" id="sme_port_field5_val" type="text" name="sme_port_field5_val" value="<?php echo sanitize_text_field($sme_port_field5_val); ?>">
                </p>
            </div>
        <?php
    }

    function scrollme_save_port_moptions( $post_id ) {
        global $post;
        
        if ( !isset( $_POST[ 'scrollme_port_moptions' ] ) || !wp_verify_nonce( $_POST[ 'scrollme_port_moptions' ], 'scrollme_port_moptions_action' ) )
            return;
        
        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
        
        if ('portfolio' == $_POST['post_type']) {
            if (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;
            }
        }
        
        /** Sanitize **/
            /* Portfolio Details */
            $sme_port_details = sanitize_text_field($_POST['sme_port_details']);

            /* Portfolio Fields */
                // Labels
                $sme_port_field1_label = sanitize_text_field($_POST['sme_port_field1_label']);
                $sme_port_field2_label = sanitize_text_field($_POST['sme_port_field2_label']);
                $sme_port_field3_label = sanitize_text_field($_POST['sme_port_field3_label']);
                $sme_port_field4_label = sanitize_text_field($_POST['sme_port_field4_label']);
                $sme_port_field5_label = sanitize_text_field($_POST['sme_port_field5_label']);

                // Values
                $sme_port_field1_val = sanitize_text_field($_POST['sme_port_field1_val']);
                $sme_port_field2_val = sanitize_text_field($_POST['sme_port_field2_val']);
                $sme_port_field3_val = sanitize_text_field($_POST['sme_port_field3_val']);
                $sme_port_field4_val = sanitize_text_field($_POST['sme_port_field4_val']);
                $sme_port_field5_val = sanitize_text_field($_POST['sme_port_field5_val']);               

            
        /** Update **/
            /* Portfolio Details */
            update_post_meta($post_id, 'sme_port_details', $sme_port_details);

            /* Portfolio Fields */
                // Label
                update_post_meta($post_id, 'sme_port_field1_label', $sme_port_field1_label);
                update_post_meta($post_id, 'sme_port_field2_label', $sme_port_field2_label);
                update_post_meta($post_id, 'sme_port_field3_label', $sme_port_field3_label);
                update_post_meta($post_id, 'sme_port_field4_label', $sme_port_field4_label);
                update_post_meta($post_id, 'sme_port_field5_label', $sme_port_field5_label);

                // Value
                update_post_meta($post_id, 'sme_port_field1_val', $sme_port_field1_val);
                update_post_meta($post_id, 'sme_port_field2_val', $sme_port_field2_val);
                update_post_meta($post_id, 'sme_port_field3_val', $sme_port_field3_val);
                update_post_meta($post_id, 'sme_port_field4_val', $sme_port_field4_val);
                update_post_meta($post_id, 'sme_port_field5_val', $sme_port_field5_val);
    }
    
    add_action('save_post', 'scrollme_save_port_moptions');

    /** Scrollme Gallery Options **/
    function scrollme_gal_images( $post_id ) {
        global $post;
        wp_nonce_field( 'scrollme_gal_images_action', 'scrollme_gal_images' );
        
        /* Gallery Images */
        $galimg_ar = get_post_meta($post->ID, 'galimg', false);
        $galimg = array();
        if(!empty($galimg_ar)) {
            $galimg = $galimg_ar[0];    
        }
        //var_dump($galimg);
        ?>
        <ol class="scme_add_galimg">
            <?php if(empty($galimg)) {
            ?>
                <li index="1">
                    <input type="text" name="galimg[0][title]" placeholder="Image Title" value="">
                    <input type="text" name="galimg[0][image]" placeholder="http://path/to/image.png" value="">
                    <span class="sme_galimg_ctrl">
                        <a class="sme_add_galimg" href="#"><i class="fa fa-plus"></i></a>
                        <a class="sme_rem_galimg" href="#"><i class="fa fa-minus"></i></a>
                        <a class="sme_prev_galimg" href="#"><i class="fa fa-eye"></i></a>
                    </span>
                </li>
            <?php
            } else{
                foreach($galimg as $index => $gal) {
                ?>
                    <li index="<?php echo $index; ?>">
                        <input type="text" name="galimg[<?php echo $index; ?>][title]" value="<?php echo sanitize_text_field( $gal['title'] ); ?>">
                        <input size="60" type="text" name="galimg[<?php echo $index; ?>][image]" value="<?php echo esc_url_raw( $gal['image'] ); ?>">
                        <span class="sme_galimg_ctrl">
                            <a class="sme_add_galimg" href="#"><i class="fa fa-plus"></i></a>
                            <a class="sme_rem_galimg" href="#"><i class="fa fa-minus"></i></a>
                            <a class="sme_prev_galimg" href="#"><i class="fa fa-eye"></i></a>
                            <span class="scme_prev_gal"><img src="<?php echo esc_url_raw( $gal['image'] ); ?>"></span>
                        </span>
                    </li>
                <?php
                }
            }
        ?>
        </ol>
        <a class="scme_add_img" href="#">Add Image</a>
        <?php
    }

    function scrollme_save_gal_images($post_id) {

        global $post;
        
        if ( !isset( $_POST[ 'scrollme_gal_images' ] ) || !wp_verify_nonce( $_POST[ 'scrollme_gal_images' ], 'scrollme_gal_images_action' ) )
            return;
        
        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
        
        if ('galleries' == $_POST['post_type']) {
            if (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;
            }
        }

        /** Sanitization **/
        $galimg = array();
        if(!empty($_POST['galimg'])) {
            $galimg = $_POST['galimg'];
            foreach($galimg as $index => $gal) {
                if($gal['title'] == '' || $gal['image'] == '') {
                    unset($galimg[$index]);
                } else {
                    $galimg[$index]['title'] = sanitize_text_field($galimg[$index]['title']);
                    $galimg[$index]['image'] = esc_url_raw($galimg[$index]['image']);
                }
            }
        }

        /** Update **/
        update_post_meta($post_id,'galimg', $galimg);
    }

    add_action('save_post', 'scrollme_save_gal_images');