<?php
global $chrimbo_panels;
/*creating panel for fonts-setting*/
$chrimbo_panels['chrimbo-theme-options'] =
    array(
        'title'          => __( 'Theme Options', 'chrimbo' ),
        'priority'       => 260
    );

/*layout options */
require get_template_directory().'/inc/customizer/theme-options/layout-options.php';

/*footer options */
require get_template_directory().'/inc/customizer/theme-options/footer.php';

/*custom css options */
require get_template_directory().'/inc/customizer/theme-options/custom-css.php';


