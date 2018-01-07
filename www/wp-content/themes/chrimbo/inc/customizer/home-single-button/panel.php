<?php

global $chrimbo_panels;

/*creating panel for single button-setting*/
$chrimbo_panels['chrimbo-feature-single-button'] =
    array(
        'title'          => __( 'Home/Single-Button', 'chrimbo' ),
        'priority'       => 230
    );

/*slider selection from single button enable options */
require get_template_directory().'/inc/customizer/home-single-button/option.php';
/*slider selection fro single button setting */
require get_template_directory().'/inc/customizer/home-single-button/setting.php';
