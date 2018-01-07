<?php
/*
Plugin Name: Booking UI
*/
add_action('init', function() {
    add_shortcode('event-plugin',function($atts = [], $content = null){
        $content .= "<script>var atts = " .
        json_encode($atts) .
        "</script>";
        $content .= file_get_contents(dirname(__FILE__) . "/index.html");
        return $content;
    });

    wp_register_style('main_stylesheet', 
    plugins_url('main.css', __FILE__));
    wp_enqueue_style('main_stylesheet');
    

    wp_register_script('angular_script', 
    "https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.js", 
    true);
    
    wp_enqueue_script('angular_script');
    wp_register_script('mycontroller_script', 
    plugins_url('indexcontroller.js', __FILE__), 
    true);

    wp_enqueue_script('mycontroller_script');
   
});

include_once "backend.php";

register_activation_hook( __FILE__, function(){
    //ob_start(); //use this to debug
    global $wpdb, $table_prefix;
    $wpdb->show_errors();
    $sSQLInq = "CREATE TABLE " . 
    $table_prefix . "inquiry ('id' INTEGER PRIMARY KEY AUTOINCREMENT, 'event' TEXT, 'eventdate' TEXT)";
    $wpdb->query($sSQLInq);
    $sSQLEvent = "CREATE TABLE " . 
    $table_prefix . "inquirydetails ('id' INTEGER PRIMARY KEY AUTOINCREMENT, 'inquiryId' INTEGER, 'fullname' TEXT, 'email' TEXT, 'phoneNo' TEXT, 'guests' INTEGER)";
    $wpdb->query($sSQLEvent);
    //trigger_error(ob_get_contents(),E_USER_ERROR); // this goes with ob_start
} );
