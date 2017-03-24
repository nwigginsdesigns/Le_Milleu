<?php
class ap_import extends WP_Import
{    
    function set_theme_mods()
    {

    $import_code = 'YTo1Nzp7aTowO3M6MDoiIjtzOjE4OiJuYXZfbWVudV9sb2NhdGlvbnMiO2E6MTp7czo3OiJwcmltYXJ5IjtpOjExO31zOjI0OiJzY3JvbGxtZV9zbGlkZXJfY2F0ZWdvcnkiO2k6MztzOjE4OiJzY3JvbGxtZV9zZWN0aW9uXzEiO3M6NzoiYWJvdXR1cyI7czoyMzoic2Nyb2xsbWVfc2VjdGlvbl9wYWdlXzEiO3M6MjoiMzQiO3M6MTg6InNjcm9sbG1lX3NlY3Rpb25fMiI7czo4OiJzZXJ2aWNlcyI7czoyMzoic2Nyb2xsbWVfc2VjdGlvbl8yX3R5cGUiO3M6ODoicHJsYXlvdXQiO3M6MTg6InNjcm9sbG1lX3NlY3Rpb25fMyI7czo4OiJvdXJ3b3JrcyI7czoyMzoic2Nyb2xsbWVfc2VjdGlvbl8zX3R5cGUiO3M6ODoicHJsYXlvdXQiO3M6MjQ6InNjcm9sbG1lX3NlY3Rpb25fbGF5b3V0MyI7czo5OiJwb3J0Zm9saW8iO3M6MTg6InNjcm9sbG1lX3NlY3Rpb25fNCI7czo3OiJjbGllbnRzIjtzOjIzOiJzY3JvbGxtZV9zZWN0aW9uXzRfdHlwZSI7czo4OiJwcmxheW91dCI7czoyNDoic2Nyb2xsbWVfc2VjdGlvbl9sYXlvdXQ0IjtzOjc6ImNsaWVudHMiO3M6MTg6InNjcm9sbG1lX3NlY3Rpb25fNSI7czozOiJidXkiO3M6MjM6InNjcm9sbG1lX3NlY3Rpb25fcGFnZV81IjtzOjI6IjUyIjtzOjE4OiJzY3JvbGxtZV9zZWN0aW9uXzYiO3M6OToib3VyLWJsb2dzIjtzOjIzOiJzY3JvbGxtZV9zZWN0aW9uXzZfdHlwZSI7czo4OiJwcmxheW91dCI7czoyNDoic2Nyb2xsbWVfc2VjdGlvbl9sYXlvdXQ2IjtzOjQ6ImJsb2ciO3M6MTg6InNjcm9sbG1lX3NlY3Rpb25fNyI7czo5OiJjb250YWN0dXMiO3M6MjM6InNjcm9sbG1lX3NlY3Rpb25fN190eXBlIjtzOjg6InBybGF5b3V0IjtzOjI0OiJzY3JvbGxtZV9zZWN0aW9uX2xheW91dDciO3M6NzoiY29udGFjdCI7czoyMjoic2Nyb2xsbWVfc2VydmljZV90aXRsZSI7czo0NToiV2UgQXJlIEV4cGVydCDigJMgPHNwYW4+SW4gT3VyIFNlcnZpY2U8L3NwYW4+IjtzOjI5OiJzY3JvbGxtZV9zZXJ2aWNlX2Jsb2NrXzFfcGFnZSI7czozOiIyMzIiO3M6Mjk6InNjcm9sbG1lX3NlcnZpY2VfYmxvY2tfMl9wYWdlIjtzOjM6IjIzNCI7czoyOToic2Nyb2xsbWVfc2VydmljZV9ibG9ja18zX3BhZ2UiO3M6MzoiMjM3IjtzOjI5OiJzY3JvbGxtZV9zZXJ2aWNlX2Jsb2NrXzRfcGFnZSI7czozOiIyNTAiO3M6MjE6InNjcm9sbG1lX2NvbnRhY3RfcGFnZSI7czoyOiI2MiI7czoxOToic2Nyb2xsbWVfYmxvZ19leGNhdCI7czo4OiI2LDUsNCwxLCI7czoxOToic2Nyb2xsbWVfdGVhbV90aXRsZSI7czo0MjoiS25vdyBBYm91dCAtIDxzcGFuPk91ciBUZWFtIE1lbWJlcnM8L3NwYW4+IjtzOjE4OiJzY3JvbGxtZV9nYWxfdGl0bGUiO3M6MTE6Ik91ciBHYWxsZXJ5IjtzOjE2OiJibG9nX2V4Y2x1ZGVfY2F0IjtzOjg6IjYsNSw0LDEsIjtzOjE4OiJzY3JvbGxtZV9zZWN0aW9uXzgiO3M6OToiZ2FsbGVyaWVzIjtzOjIzOiJzY3JvbGxtZV9zZWN0aW9uXzhfdHlwZSI7czo4OiJwcmxheW91dCI7czoyNDoic2Nyb2xsbWVfc2VjdGlvbl9sYXlvdXQ4IjtzOjc6ImdhbGxlcnkiO3M6MTg6InNjcm9sbG1lX3NlY3Rpb25fOSI7czo5OiJvdXItdGVhbXMiO3M6MjM6InNjcm9sbG1lX3NlY3Rpb25fOV90eXBlIjtzOjg6InBybGF5b3V0IjtzOjI0OiJzY3JvbGxtZV9zZWN0aW9uX2xheW91dDkiO3M6NDoidGVhbSI7czo5OiJwcmVsb2FkZXIiO3M6NzoicmhvbWJ1cyI7czoxNDoidGVtcGxhdGVfY29sb3IiO3M6NzoiIzBiOWVkZCI7czoxODoic2Nyb2xsbWVfaG9tZV9sb2dvIjtzOjgyOiJodHRwOi8vYWNjZXNzcHJlc3N0aGVtZXMuY29tL2ltcG9ydC90ZXN0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE2LzA1LzIwMTYtMDUtMDIucG5nIjtzOjEzOiJzY3JvbGxtZV9sb2dvIjtzOjc2OiJodHRwOi8vYWNjZXNzcHJlc3N0aGVtZXMuY29tL2ltcG9ydC90ZXN0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE2LzA0L2xvZ28ucG5nIjtzOjE5OiJzY3JvbGxtZV9zZWN0aW9uXzEwIjtzOjk6InRlc3RpbW9ueSI7czoyNDoic2Nyb2xsbWVfc2VjdGlvbl8xMF90eXBlIjtzOjg6InBybGF5b3V0IjtzOjI1OiJzY3JvbGxtZV9zZWN0aW9uX2xheW91dDEwIjtzOjExOiJ0ZXN0aW1vbmlhbCI7czoyNzoic2Nyb2xsbWVfc2VjdGlvbjEwX2JnX2NvbG9yIjtzOjc6IiNmZmZmZmYiO3M6Mjc6InNjcm9sbG1lX3NlY3Rpb24xMF9iZ19pbWFnZSI7czo3ODoiaHR0cDovL2FjY2Vzc3ByZXNzdGhlbWVzLmNvbS9pbXBvcnQvdGVzdC93cC1jb250ZW50L3VwbG9hZHMvMjAxNi8wNC90ZXN0YmcucG5nIjtzOjE4OiJzY3JvbGxtZV9wcmVsb2FkZXIiO3M6MDoiIjtzOjE5OiJwb3J0X3NpbmdsZV9zaWRlYmFyIjtzOjEwOiJub19zaWRlYmFyIjtzOjIwOiJwb3J0X2Rpc2FibGVfZGV0YWlscyI7czowOiIiO3M6OToicG9ydF9zbHVnIjtzOjk6InBvcnRmb2xpbyI7czoyMjoic2Nyb2xsbWVfc2VjdGlvbl9vcmRlciI7czoyMToiMSwyLDMsOCw5LDQsNiwxMCw1LDcsIjtzOjE5OiJzY3JvbGxtZV90ZXN0X3RpdGxlIjtzOjMzOiJXaGF0IDxzcGFuPk91ciBDbGllbnRzPC9zcGFuPiBTYXkiO3M6MTY6InNjcm9sbG1lX2Zvb3RleHQiO3M6NzA6IsKpIDIwMTYgU2Nyb2xsTWUgUHJvIHwgU2Nyb2xsTWUgYnkgPGEgaHJlZj0iIyI+QWNjZXNzUHJlc3MgVGhlbWVzZTwvYT4iO3M6Mjc6InNjcm9sbG1lX2VuYWJsZV9jdGRvd25fcGFnZSI7czowOiIiO3M6MjA6InNjcm9sbG1lX2N0ZG93bl9sb2dvIjtzOjc2OiJodHRwOi8vYWNjZXNzcHJlc3N0aGVtZXMuY29tL2ltcG9ydC90ZXN0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE2LzA0L2xvZ28ucG5nIjtzOjIxOiJzY3JvbGxtZV9jdGRvd25fZGVzY3IiO3M6MTc4OiI8aDI+V2Vic2l0ZSBDb21pbmcgU29vbiAhITwvaDI+PHA+RXRpYW0gdXQgZW5pbSBleC4gQWxpcXVhbSB0dXJwaXMgbmliaCwgcHJldGl1bSBoZW5kcmVyaXQgbWFzc2EgZWdldCwgdGluY2lkdW50IGxvYm9ydGlzIGVsaXQuIFV0IGVsZW1lbnR1bSwgdmVsaXQgaWQgdWxsYW1jb3JwZXIgdWxsYW1jb3JwZXI8L3A+IjtzOjIwOiJzY3JvbGxtZV9jdGRvd25fZGF0ZSI7czoxMDoiMDUvMDkvMjAxNiI7fQ==';
    $import_code = base64_decode($import_code);
    $import_code = unserialize($import_code);
    $import_code = $this->recursive_array_replace('http://demo.accesspressthemes.com/scrollme-pro', get_site_url() , $import_code );
    update_option('theme_mods_scrollme-pro', $import_code);
    }

    function set_menu() {
        
        global $wpdb;
        $table_db_name = $wpdb->prefix . "terms";
        $rows = $wpdb->get_results("SELECT * FROM $table_db_name where name='Main Menu'",ARRAY_A);
        $menu_ids = array();
        foreach($rows as $row) {
            $menu_ids[$row["name"]] = $row["term_id"] ;
        }
        /*
        if ( has_nav_menu( 'primary' ) ) {
             //Do something
        }
        else {
            set_theme_mod( 'nav_menu_locations', array_map( 'absint', array(   'primary' =>$menu_ids['Main Menu'] ) ) );
        }   
        */
        set_theme_mod( 'nav_menu_locations', array_map( 'absint', array(   'primary' =>$menu_ids['Main Menu'] ) ) );
    }

    function get_options() {
        global $wpdb;
        return $wpdb->get_results("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name = 'accesspress_parallax_pro' OR option_name = 'accesspress_parallax_count'");
    }

    function set_widgets() {
        $sidebars_widgets_code = 'YTo4OntzOjE5OiJ3cF9pbmFjdGl2ZV93aWRnZXRzIjthOjA6e31zOjIxOiJzY3JvbGxtZS1zaWRlYmFyLWxlZnQiO2E6Mzp7aTowO3M6ODoic2VhcmNoLTIiO2k6MTtzOjE0OiJyZWNlbnQtcG9zdHMtMiI7aToyO3M6MTI6ImNhdGVnb3JpZXMtMiI7fXM6MjI6InNjcm9sbG1lLXNpZGViYXItcmlnaHQiO2E6NDp7aTowO3M6ODoic2VhcmNoLTMiO2k6MTtzOjE0OiJyZWNlbnQtcG9zdHMtMyI7aToyO3M6MTI6ImNhdGVnb3JpZXMtMyI7aTozO3M6MjE6InNjcm9sbG1lX2N0YV9zaW1wbGUtMiI7fXM6MTM6InNjcm9sbG1lLWdtYXAiO2E6MTp7aTowO3M6NjoidGV4dC0yIjt9czoyNjoic2Nyb2xsbWUtaGVhZGVyLXNvY2lhbGljb24iO2E6MTp7aTowO3M6MTM6ImFwc2lfd2lkZ2V0LTIiO31zOjIyOiJjb3VudGRvd24tc29jaWFsLWljb25zIjthOjE6e2k6MDtzOjEzOiJhcHNpX3dpZGdldC00Ijt9czoxOToiY291bnRkb3duLXN1YnNjcmliZSI7YToxOntpOjA7czoxODoibmV3c2xldHRlcndpZGdldC0yIjt9czoxMzoiYXJyYXlfdmVyc2lvbiI7aTozO30=';
        $sidebars_widgets_code = base64_decode($sidebars_widgets_code);
        $sidebars_widgets_code = unserialize($sidebars_widgets_code);
        update_option('sidebars_widgets', $sidebars_widgets_code);

        $all_widgets_code = 'YToxOntpOjA7YTo0OntzOjk6Im9wdGlvbl9pZCI7czoyOiI5MiI7czoxMToib3B0aW9uX25hbWUiO3M6MTM6IndpZGdldF9zZWFyY2giO3M6MTI6Im9wdGlvbl92YWx1ZSI7czoxMDA6ImE6Mzp7aToyO2E6MTp7czo1OiJ0aXRsZSI7czo2OiJTZWFyY2giO31pOjM7YToxOntzOjU6InRpdGxlIjtzOjY6IlNlYXJjaCI7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9fQ==';
        $all_widgets_code = base64_decode($all_widgets_code);
        $all_widgets_code = unserialize($all_widgets_code);
        
        foreach ($all_widgets_code as $option) {
            $option_array = unserialize($option->option_value);
            $option_array = $this->recursive_array_replace('http://demo.accesspressthemes.com/scrollme-pro', get_site_url() , $option_array );
            update_option($option->option_name, $option_array);
        }
    }

    function set_home_page() {
        $fpage = get_page_by_path( 'front-page' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $fpage->ID);
    }

    function recursive_array_replace($find, $replace, $array){
        $newArray = array();
        foreach ($array as $key => $value) {
        
        if (!is_array($value)) {
        $newArray[$key] = str_replace($find, $replace, $value);
        }else{
        $newArray[$key] = $this->recursive_array_replace($find, $replace, $value);
        }
        }
        return $newArray;
    }
}

