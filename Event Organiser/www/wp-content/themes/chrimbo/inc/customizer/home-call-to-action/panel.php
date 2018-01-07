<?php
global $chrimbo_panels;
/*creating panel for call to action Section setting*/
$chrimbo_panels['chrimbo-call-action-panel'] =
    array(
        'title'          => __( 'Home/Call-To-Action Section', 'chrimbo' ),
        'priority'       => 250
    );


/*call to action section enable control */
require get_template_directory().'/inc/customizer/home-call-to-action/options.php';

/*call to action selection settings */
require get_template_directory().'/inc/customizer/home-call-to-action/settings.php';