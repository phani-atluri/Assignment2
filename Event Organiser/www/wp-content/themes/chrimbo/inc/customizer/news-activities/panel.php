<?php
global $chrimbo_panels;
/*creating panel for fonts-setting*/
$chrimbo_panels['chrimbo-activities-section'] =
    array(
        'title'          => __( 'Home/News-Activity Section', 'chrimbo' ),
        'priority'       => 240
    );

/* activity section controll options */
require get_template_directory() . '/inc/customizer/news-activities/options.php';

/*from page  section setting option*/
require get_template_directory() . '/inc/customizer/news-activities/from-page.php';