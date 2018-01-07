<?php
/**
 * evision themes Theme Customizer
 *
 * @package eVision themes
 * @subpackage Chrimbo
 * @since Chrimbo 1.0.0
 */
/*Define Url for including css and js*/
if ( !defined( 'EVISION_CUSTOMIZER_URL' ) ) {
    define( 'EVISION_CUSTOMIZER_URL', trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/evision-customizer/' );
}
/*Define path for including php files*/
if ( !defined( 'EVISION_CUSTOMIZER_PATH' ) ) {
    define( 'EVISION_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'inc/frameworks/evision-customizer/' );
}

/*define constant for evision customizer name*/
if(!defined('EVISION_CUSTOMIZER_NAME')){
    define( 'EVISION_CUSTOMIZER_NAME', 'chrimbo_options' );
}


/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since chrimbo 1.0
 */
if ( ! function_exists( 'chrimbo_reset_options' ) ) :
    function chrimbo_reset_options( $reset_options ) {
        set_theme_mod( EVISION_CUSTOMIZER_NAME, $reset_options );
    }
endif;
/**
 * Customizer framework added.
 */
require get_template_directory() . '/inc/frameworks/evision-customizer/evision-customizer.php';

global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/******************************************
Modify Site Identity sections
 *******************************************/
require get_template_directory().'/inc/customizer/site-identity/site-identity.php';

/******************************************
Modify Site Color sections
 *******************************************/
require get_template_directory() . '/inc/customizer/colors/general.php';

/******************************************
Modify Site Font sections
 *******************************************/
require get_template_directory() . '/inc/customizer/fonts/font-family.php';

/******************************************
Modify Site Slider sections
 *******************************************/
require get_template_directory() . '/inc/customizer/home-banner/panel.php';

/******************************************
Modify Site Activities sections
 *******************************************/
require get_template_directory() . '/inc/customizer/news-activities/panel.php';

/******************************************
Modify Site Donate sections
 *******************************************/
require get_template_directory() . '/inc/customizer/home-call-to-action/panel.php';

/******************************************
Modify Site Theme Options sections
 *******************************************/
require get_template_directory() . '/inc/customizer/theme-options/panel.php';

/******************************************
Modify Acitivity Section
 *******************************************/
require get_template_directory() . '/inc/customizer/home-event-section/panel.php';

/******************************************
Modify Event-Ticket Section
*******************************************/
require get_template_directory() . '/inc/customizer/home-single-button/panel.php';

/******************************************
Modify about-Event
*******************************************/
require get_template_directory() . '/inc/customizer/home-about/panel.php';

/*Resetting all Values*/
/**
 * Reset color settings to default
 * @param  $input
 *
 * @since chrimbo 1.0
 */
global $chrimbo_customizer_defaults;
$chrimbo_customizer_defaults['chrimbo-customizer-reset'] = '';
if ( ! function_exists( 'chrimbo_customizer_reset' ) ) :
    function chrimbo_customizer_reset( ) {
        global $chrimbo_customizer_saved_values;
        $chrimbo_customizer_saved_values = chrimbo_get_all_options();
        if ( $chrimbo_customizer_saved_values['chrimbo-customizer-reset'] == 1 ) {
            global $chrimbo_customizer_defaults;

            $chrimbo_customizer_defaults['chrimbo-customizer-reset'] = '';
            /*resetting fields*/
            chrimbo_reset_options( $chrimbo_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','chrimbo_customizer_reset' );



$chrimbo_sections['chrimbo-customizer-reset'] =
    array(
        'priority'       => 999,
        'title'          => __( 'Reset All Options', 'chrimbo' )
    );
$chrimbo_settings_controls['chrimbo-customizer-reset'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-customizer-reset'],
            'sanitize_callback'    => 'chrimbo_customizer_reset',
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  __( 'Reset All Options', 'chrimbo' ),
            'description'           =>  __( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects. ', 'chrimbo' ),
            'section'               => 'chrimbo-customizer-reset',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/******************************************
Removing / Arranging section setting control
 *******************************************/

$chrimbo_sections['custom_css'] =
    array(
        'title'          => __( 'Additional CSS', 'chrimbo' ),
        'priority'       => 400,
    );

$chrimbo_remove_sections =
    array(
        'header_image'
    );
$chrimbo_remove_settings_controls =
    array(
        'header_textcolor','display_header_text'
    );
$chrimbo_customizer_args = array(
    'panels'            => $chrimbo_panels, /*always use key panels */
    'sections'          => $chrimbo_sections,/*always use key sections*/
    'settings_controls' => $chrimbo_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $chrimbo_repeated_settings_controls,/*always use key sections*/
    'remove_sections'   => $chrimbo_remove_sections,/*always use key remove_sections*/
    'remove_settings_controls' => $chrimbo_remove_settings_controls/*always use key remove_settings_controls*/
);

/*registering panel section setting and control start*/
function chrimbo_add_panels_sections_settings() {
    global $chrimbo_customizer_args;
    return $chrimbo_customizer_args;
}
add_filter( 'evision_customizer_panels_sections_settings', 'chrimbo_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chrimbo_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'chrimbo_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chrimbo_customize_preview_js() {
    wp_enqueue_script( 'chrimbo_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'chrimbo_customize_preview_js' );


/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since chrimbo 1.0
 */
if ( ! function_exists( 'chrimbo_get_all_options' ) ) :
    function chrimbo_get_all_options( $merge_default = 0 ) {
        $chrimbo_customizer_saved_values = evision_customizer_get_all_values( EVISION_CUSTOMIZER_NAME );
        if( 1 == $merge_default ){
            global $chrimbo_customizer_defaults;
            if(is_array( $chrimbo_customizer_saved_values )){
                $chrimbo_customizer_saved_values = array_merge($chrimbo_customizer_defaults, $chrimbo_customizer_saved_values );
            }
            else{
                $chrimbo_customizer_saved_values = $chrimbo_customizer_defaults;
            }
        }
        return $chrimbo_customizer_saved_values;
    }
endif;