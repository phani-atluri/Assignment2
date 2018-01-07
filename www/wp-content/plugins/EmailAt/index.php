<?php
/*
Plugin Name: Email Us at
*/
function name_EmailMe_init()
{
    function name_EmailMe($atts = [], $content = null)
    {
        
        $content .= "contact@ontarioevents.com";
        return $content;
    }
    add_shortcode('name_EmailMe_init', 'name_EmailMe');
}
add_action('init', 'name_EmailMe_init');