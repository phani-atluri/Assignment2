<?php
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-custom-css'] = '';
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
    $chrimbo_sections['chrimbo-custom-css'] =
        array(
            'priority'       => 120,
            'title'          => __( 'Custom CSS', 'chrimbo' ),
            'panel'          => 'chrimbo-theme-options'
        );

    $chrimbo_settings_controls['chrimbo-custom-css'] =
        array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-custom-css'],
            ),
            'control' => array(
                'label'                 =>  __( 'Custom CSS', 'chrimbo' ),
                'section'               => 'chrimbo-custom-css',
                'type'                  => 'textarea_css',
                'priority'              => 40,
            )
        );
}