<?php
/*
Plugin Name: Call Us at
*/
function name_callMe_init()
{
    function name_CallMe($atts = [], $content = null)
    {
        
        $content .= "+1(226) 123 1234";
        return $content;
    }
    add_shortcode('name_callMe_init', 'name_callMe');
}
add_action('init', 'name_callMe_init');