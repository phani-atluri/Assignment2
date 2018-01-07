<?php
/**
 * evision themes init file
 *
 * @package eVision themes
 * @subpackage Chrimbo
 * @since Chrimbo 1.0.0
 */

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer/customizer.php';

/**
 * Additional functions.
 */
require get_template_directory() . '/inc/function/header-logo.php';

require get_template_directory() . '/inc/function/words-count.php';

require get_template_directory() . '/inc/function/feature-image-align.php';

/**
* Include sidebar widgets
*/
require get_template_directory().'/inc/sidebar-widget-init.php';


/**
 * Include Hooks
 */
require get_template_directory().'/inc/hooks/excerpt.php';

require get_template_directory().'/inc/hooks/init.php';

require get_template_directory().'/inc/hooks/header.php';

require get_template_directory().'/inc/hooks/home-main-banner.php';

require get_template_directory().'/inc/hooks/home-news-activity-section.php';

require get_template_directory().'/inc/hooks/home-call-to-action.php';

require get_template_directory().'/inc/hooks/footer.php';

require get_template_directory().'/inc/hooks/init.php';

require get_template_directory().'/inc/hooks/wp-head.php';

require get_template_directory().'/inc/hooks/home-event-section.php';

require get_template_directory().'/inc/hooks/home-single-button.php';

require get_template_directory().'/inc/hooks/home-about.php';




 /* 
 Layout additions
 */
 require get_template_directory() . '/inc/post-meta/layout-meta.php';
