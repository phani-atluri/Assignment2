<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*creating panel for general*/
$chrimbo_panels['chrimbo-colors'] =
    array(
        'title'          => __( 'Colors', 'chrimbo' ),
        'description'    => __( 'Customize colors of you awesome site', 'chrimbo' ),
        'priority'       => 42,
    );

/*Default color*/
$chrimbo_sections['colors'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Basic Colors Options', 'chrimbo' ),
        'panel'          => 'chrimbo-colors',
    );
/*chrimbo colors*/
$chrimbo_sections['chrimbo-colors-reset'] =
    array(
        'priority'       => 60,
        'title'          => __( 'chrimbo Colors Reset', 'chrimbo' ),
        'panel'          => 'chrimbo-colors',
    );
/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-main-link-color'] = '#313131';
$chrimbo_customizer_defaults['chrimbo-banner-text-color'] = '#fff';
$chrimbo_customizer_defaults['chrimbo-site-identity-color'] = '#332e2b';
$chrimbo_customizer_defaults['chrimbo-primary-color'] = '#f75a5a';

$chrimbo_customizer_defaults['chrimbo-color-reset'] = '';


/**
 * Reset color settings to default
 * @param  $input
 *
 * @since chrimbo 1.0
 */
if ( ! function_exists( 'chrimbo_color_reset' ) ) :
    function chrimbo_color_reset( ) {
        
            global $chrimbo_customizer_saved_values;
           $chrimbo_customizer_saved_values = chrimbo_get_all_options();
        if ( $chrimbo_customizer_saved_values['chrimbo-color-reset'] == 1 ) {
            global $chrimbo_customizer_defaults;
            global $chrimbo_customizer_saved_values;

            /*setting fields */
            $chrimbo_customizer_saved_values['chrimbo-main-link-color'] = $chrimbo_customizer_defaults['chrimbo-main-link-color'];
            $chrimbo_customizer_saved_values['chrimbo-banner-text-color'] = $chrimbo_customizer_defaults['chrimbo-banner-text-color'];
            $chrimbo_customizer_saved_values['chrimbo-site-identity-color'] = $chrimbo_customizer_defaults['chrimbo-site-identity-color'];
            $chrimbo_customizer_saved_values['chrimbo-primary-color'] = $chrimbo_customizer_defaults['chrimbo-primary-color'];


            remove_theme_mod( 'background_color' );
            $chrimbo_customizer_saved_values['chrimbo-color-reset'] = '';
            /*resetting fields*/
            chrimbo_reset_options( $chrimbo_customizer_saved_values );

        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','chrimbo_color_reset' );





$chrimbo_settings_controls['chrimbo-site-identity-color'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-site-identity-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Site Identity Color', 'chrimbo' ),
            'description'           =>  __( 'Site title and tagline color', 'chrimbo' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$chrimbo_settings_controls['chrimbo-banner-text-color'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-banner-text-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Text Over Image Color', 'chrimbo' ),
            'description'           =>  __( 'This color is for title and content above image', 'chrimbo' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$chrimbo_settings_controls['chrimbo-main-link-color'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-main-link-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Link Color', 'chrimbo' ),
            'description'           =>  __( 'will effect all the link color', 'chrimbo' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$chrimbo_settings_controls['chrimbo-primary-color'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-primary-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Primary Color', 'chrimbo' ),
            'description'           =>  __( 'Primary Color For Site', 'chrimbo' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );    


$chrimbo_settings_controls['chrimbo-color-reset'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-color-reset'],
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  __( 'Reset', 'chrimbo' ),
            'description'           =>  __( 'Caution: Reset all above color settings to default. Refresh the page after save to view the effects. ', 'chrimbo' ),
            'section'               => 'chrimbo-colors-reset',
            'type'                  => 'checkbox',
            'priority'              => 220,
            'active_callback'       => ''
        )
    );