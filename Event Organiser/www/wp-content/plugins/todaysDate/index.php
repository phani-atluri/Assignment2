<?php
/*
Plugin Name: Today's Date is
*/
function todaysDate_shortcodes_init()
{
    function todaysDate_shortcode($atts = [], $content = null)
    {
        
        date_default_timezone_set('US/Eastern');
        $content .= date('l jS \of F Y h:i:s A');
        return $content;
    }
    add_shortcode('todaysDate', 'todaysDate_shortcode');
}
add_action('init', 'todaysDate_shortcodes_init');