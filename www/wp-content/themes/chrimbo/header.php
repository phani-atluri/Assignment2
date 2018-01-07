<?php
/**
 * The default template for displaying header
 *
 * @package eVision themes
 * @subpackage chrimbo
 * @since Chrimbo 1.0.0
 */

/**
 * chrimbo_action_before_head hook
 * @since Chrimbo 1.0.0
 *
 * @hooked chrimbo_set_global -  0
 * @hooked chrimbo_doctype -  10
 */
do_action( 'chrimbo_action_before_head' );?>
<head>
	<?php
	/**
	 * chrimbo_action_before_wp_head hook
	 * @since Chrimbo 1.0.0
	 *
	 * @hooked chrimbo_before_wp_head -  10
	 */
	do_action( 'chrimbo_action_before_wp_head' );

	wp_head();

	/**
	 * chrimbo_action_after_wp_head hook
	 * @since chrimbo 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'chrimbo_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>


<?php
/**
 * chrimbo_action_before hook
 * @since Chrimbo 1.0.0
 *
 * @hooked chrimbo_page_start - 15
 */
do_action( 'chrimbo_action_before' );

/**
 * chrimbo_action_pre_loader_header hook
 * @since chrimbo 1.0.0
 *
 * @hooked chrimbo_action_pre_loader_header - 10
 */
do_action( 'chrimbo_action_pre_loader_header' );

/**
 * chrimbo_action_after_page_id hook
 * @since Chrimbo 1.0.0
 *
 * @hooked chrimbo_social_menu - 15
 */
do_action( 'chrimbo_action_after_page_id' );

/**
 * chrimbo_action_before_header hook
 * @since Chrimbo 1.0.0
 *
 * @hooked chrimbo_skip_to_content - 10
 */
do_action( 'chrimbo_action_before_header' );

/**
 * chrimbo_action_header hook
 * @since Chrimbo 1.0.0
 *
 * @hooked chrimbo_after_header - 10
 */
do_action( 'chrimbo_action_header' );


/**
 * chrimbo_action_after_header hook
 * @since Chrimbo 1.0.0
 *
 * @hooked null
 */
//do_action( 'chrimbo_action_after_header' );