<?php
global $chrimbo_panels;
/*creating panel for fonts-setting*/
$chrimbo_panels['chrimbo-feature-banner'] =
    array(
        'title'          => __( 'Home/Main-Banner-Section', 'chrimbo' ),
        'priority'       => 200
    );

/*slider selection from slider options */
require get_template_directory().'/inc/customizer/home-banner/options.php';

/*slider selection from slider settings */
require get_template_directory().'/inc/customizer/home-banner/settings.php';


