<?php
    if( class_exists( 'WP_Customize_Control' ) ):
        /** Select Page Control **/
        class WP_Customize_Select_Page_Control extends WP_Customize_Control {
            
            public function render_content() {
                $pages = $this->scrollme_get_par_pagelist();
                
                if ( empty( $pages ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $pages as $value => $label )
                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                    ?>
                    </select>
                </label>
                <?php
            }
            
            public function scrollme_get_par_pagelist() {
                $pglist = array();
                $pglist[0] = 'Select Page';
                
                $pages = get_pages(array('parent' => 0));
                foreach($pages as $page) {
                    $pglist[$page->ID] = $page->post_title;
                }
                
                return $pglist;
            }
        }
        
        /** Select Single Category Control **/
        class WP_Customize_Select_Single_Cat_Control extends WP_Customize_Control {
            public function render_content() {
                $cats = $this->scrollme_get_catlist();
                $values = $this->value();
                
                if ( empty( $cats ) )
                return;
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $cats as $id => $label )
                    echo '<option value="' . esc_attr( $id ) . '"' . selected( $this->value(), $id, false ) . '>' . $label . '</option>';
                    ?>
                    </select>   
                </label>
                <?php
            }
            
            public function scrollme_get_catlist() {
                $catlist = array();
                
                $catlist[0] = 'Select Category';
                $categories = get_categories( array('hide_empty' => 0) );
                
                foreach($categories as $cat){
                    $catlist[$cat->term_id] = $cat->name;
                }
                
                return $catlist;
            }
        }
        
        /** Exclude Multiple Category Control **/
        class WP_Customize_Select_Mul_Cat_Control extends WP_Customize_Control {
            public function render_content() {
                $cats = $this->scrollme_get_catlist();
                $values = $this->value();
                
                if ( empty( $cats ) )
                return;
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <div class="ex-cat-wrap">
                            <?php $cat_arr = explode(',', $values); array_pop($cat_arr); $count = 1; ?>
                            
                            <?php foreach($cats as $id => $label) : ?>
                                <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
                                    <input id="ex-cat-<?php echo $id; ?>" type="checkbox" value="<?php echo $id; ?>" <?php if(in_array($id,$cat_arr)){ echo "checked"; }; ?> />
                                    <label for="ex-cat-<?php echo $id; ?>"><?php echo $label; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                    <?php endif; ?>    
                </label>
                <?php
            }
            
            public function scrollme_get_catlist() {
                $catlist = array();
                $categories = get_categories( array('hide_empty' => 0) );
                
                foreach($categories as $cat){
                    $catlist[$cat->term_id] = $cat->name;
                }
                
                return $catlist;
            }
        }
        
        /** Select Widget Control **/
        class WP_Customize_Select_Widget_Control extends WP_Customize_Control {
            
            public function render_content() {
                $sidebars = $this->scrollme_get_registered_sidebars();
                
                if ( empty( $sidebars ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $sidebars as $sidebar )
                    echo '<option value="' . esc_attr( $sidebar['id'] ) . '"' . selected( $this->value(), $sidebar['id'], false ) . '>' . $sidebar['name'] . '</option>';
                    ?>
                    </select>
                </label>
                <?php
            }
            
            public function scrollme_get_registered_sidebars() {
                $sidebars = array();
                
                $sidebars['sidebar-none'] = array('name' => 'Select Widget', 'id' => 0);
                $rsidebars = $GLOBALS['wp_registered_sidebars'];
                
                if(!empty($rsidebars)) {
                    foreach($rsidebars as $rsidebar) {
                        $sidebars[$rsidebar['id']] = array('name' => $rsidebar['name'], 'id' => $rsidebar['id']);
                    }
                }
                
                return $sidebars;
            }
        }
        
        /** Help Info Control **/
        class WP_Customize_Help_Info_Control extends WP_Customize_Control {
            
            public function render_content() {
                $input_attrs = $this->input_attrs;
                $info = isset($input_attrs['info']) ? $input_attrs['info'] : '';
                ?>
                <div class="help-info">
                    <h4 class="help-info-title"><?php _e('Instruction', 'scrollme-pro'); ?></h4>
                    <div style="font-weight: bold;">
                        <?php echo $info; ?>
                    </div>
                </div>
                <?php
            }
        }        
        
        /** Select Post Control **/
        class WP_Customize_Select_Post_Control extends WP_Customize_Control {
            
            public function render_content() {
                $posts = $this->scrollme_get_posts();
                
                if ( empty( $posts ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $posts as $id => $label )
                    echo '<option value="' . $id . '"' . selected( $this->value(), $id, false ) . '>' . $label . '</option>';
                    ?>
                    </select>
                </label>
                <?php
            }
            
            public function scrollme_get_posts() {
                $postlist = array();
                $postlist[0] = 'Select Post';
                
                $posts = get_posts();
                
                foreach($posts as $post) {
                    $postlist[$post->ID] = $post->post_title;
                }
                
                return $postlist;
            }
        }

        class WP_Customize_Section_ReOrder extends WP_Customize_Control {
        public $type = 'dragndrop';
        /**
        * Render the content of the category dropdown
        *
        * @return HTML
        */
        public function render_content() {
            if ( empty( $this->choices ) ){
                return;
            }
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <ul class="controls" id ="tm-sections-reorder">
            <?php
            $default_short_array = array();
            foreach ( $this->choices as $value => $label ) {
                $default_short_array[$value] = $label;
            }
            $order_save_value = get_theme_mod( $this->id );
            
            if( !empty( $order_save_value ) ) {
                $order_save_array = explode( ',' , $order_save_value);
                $order_save_array_pop = array_pop( $order_save_array );
                foreach ($order_save_array as $key => $value) {
                ?>
                
                <li class="tm-section-element" data-section-name="<?php echo esc_attr( $value );?>" id="<?php echo esc_attr( $value ); ?>"><i class="fa fa-arrows-v"></i><?php echo esc_attr( $default_short_array[$value] ); ?></li>
                <?php      
                }
                $section_order_list = $order_save_value;
            
            } else {
            $order_array = array();
            foreach ( $this->choices as $value => $label ) {
            $order_array[] = $value;            
            ?>
            <li class="tm-section-element" data-section-name="<?php echo esc_attr( $value );?>" id="<?php echo esc_attr( $value ); ?>"><i class="fa fa-arrows-v"></i><?php echo esc_attr( $label ); ?></li>
            <?php
            }
            $section_order_list = implode ( "," , $order_array );
            }
            ?>
            <input id="shortui-order" type="hidden" <?php $this->link(); ?> value="<?php echo $section_order_list; ?>" />  
            </ul>        
            <?php
        }
    }

    /** Site Preloader **/
        class WP_Customize_Preloader_Control extends WP_Customize_Control {
            
            public function render_content() {
                $preloaders = array(
                    'default',
                    'coffee',
                    'grid',
                    'horizon',
                    'list',
                    'rhombus',
                    'setting',
                    'square',
                    'text'
                );
                
                if ( empty( $preloaders ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <div class="cmizer-preloader-container">    
                        <?php foreach($preloaders as $preloader) : ?>
                            <span class="cmizer-preloader <?php if($preloader == $this->value()){echo "active";} ?>" preloader="<?php echo $preloader; ?>">
                                <img src="<?php echo get_template_directory_uri().'/images/preloader/'.$preloader.'.gif'; ?>" />
                            </span>
                        <?php endforeach; ?>                        
                    </div>
                    <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                </label>
                <?php
            }
        }

    /** Datepicker Control **/
        class WP_Customize_Datepick_Control extends WP_Customize_Control {            
            public function render_content() {                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;

                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <input class="datepicker" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                </label>
                <?php
            }
        }

    /** Demo IMport **/
        class WP_Customize_Demo_Control extends WP_Customize_Control{            
            public function render_content() {
            ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif; ?>
                    <div class="">
                        <a href="#" id="demo_import">Import Demo</a>
                        <div class=""></div>
                        <div class="import-message">Click on 'Import Demo' button to import demo contents.</div>
                        <div class="import-msg">Make Sure you've Installed Pagebuilder plugin and activated it for the best result</div>
                    </div>
                </label>
            <?php
            }
        }
                
    endif;