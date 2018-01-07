<?php
global $chrimbo_panels;
/*creating panel for time-line*/
$chrimbo_panels['chrimbo-feature-event-section'] =
    array(
        'title'          => __( 'Home/Main-Event-Section', 'chrimbo' ),
        'priority'       => 210
    );

/*slider selection from time-line  setting */
require get_template_directory().'/inc/customizer/home-event-section/setting.php';
/*slider selection from time-line  option  */
require get_template_directory().'/inc/customizer/home-event-section/options.php';