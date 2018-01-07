<?php
global $chrimbo_panels;
/*creating panel for fonts-setting*/
$chrimbo_panels['chrimbo-home-about'] =
    array(
        'title'          => __( 'Home/About-Section', 'chrimbo' ),
        'priority'       => 220
    );

/*about event selection fro enable options*/
require get_template_directory().'/inc/customizer/home-about/options.php';