<?php
    /** ===== Active Callbacks ===== **/

    /** Home Slider Type **/
       function scrollme_home_slider_type_def( $control ) {
            if ( $control->manager->get_setting('scrollme_slider_type')->value() == 'default' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_home_slider_type_rev( $control ) {
            if ( $control->manager->get_setting('scrollme_slider_type')->value() == 'revolution' ) {
                return true;
            } else {
                return false;
            }
        }
    
    /** Section Page Layout **/
        function scrollme_section1_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_1_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section2_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_2_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section3_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_3_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section4_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_4_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section5_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_5_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section6_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_6_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section7_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_7_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_section8_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_8_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_section9_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_9_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_section10_pg_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_10_type')->value() == 'page' ) {
                return true;
            } else {
                return false;
            }
        }
    
    /** Section Predefined layout **/
        function scrollme_section1_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_1_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section2_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_2_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section3_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_3_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section4_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_4_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section5_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_5_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section6_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_6_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }
        
        function scrollme_section7_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_7_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_section8_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_8_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_section9_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_9_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }

        function scrollme_section10_pr_layout( $control ) {
            if ( $control->manager->get_setting('scrollme_section_10_type')->value() == 'prlayout' ) {
                return true;
            } else {
                return false;
            }
        }