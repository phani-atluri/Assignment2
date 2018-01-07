<?php

global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;
global $wp_version;

if (version_compare($wp_version, '4.5', '<')) {
    /*defaults values*/
    $chrimbo_customizer_defaults['chrimbo-logo'] = '';
    $chrimbo_customizer_defaults['chrimbo-title-tagline-message'] = sprintf( __( '%1$s If you do not have a logo %2$s', 'chrimbo' ), '<span class="customize-control-title">','</span>' );
    $chrimbo_customizer_defaults['chrimbo-enable-title'] = 1;
    $chrimbo_customizer_defaults['chrimbo-enable-tagline'] = 1;

    /*creating setting control*/
    $chrimbo_settings_controls['chrimbo-logo'] =
        array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-logo'],
            ),
            'control' => array(
                'label'                 =>  __( 'Logo', 'chrimbo' ),
                'section'               => 'title_tagline',
                'type'                  => 'image',
                'priority'              => 70,
                'description'           =>  __( 'Recommended logo size 165*50', 'chrimbo' ),
                'active_callback'       => ''
            )
        );

    /*enable option for enable tagline in header*/
    $chrimbo_settings_controls['chrimbo-title-tagline-message'] =
        array(
            'control' => array(
                'description'           =>  $chrimbo_customizer_defaults['chrimbo-title-tagline-message'],
                'section'               => 'title_tagline',
                'type'                  => 'message',
                'priority'              => 75,
                'active_callback'       => ''
            )
        );
    /*enable option for enable tagline in header*/
    $chrimbo_settings_controls['chrimbo-enable-title'] =
        array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-enable-title'],
            ),
            'control' => array(
                'label'                 =>  __( 'Enable Title', 'chrimbo' ),
                'section'               => 'title_tagline',
                'type'                  => 'checkbox',
                'priority'              => 80,
                'active_callback'       => ''
            )
        );
    $chrimbo_settings_controls['chrimbo-enable-tagline'] =
        array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-enable-tagline'],
            ),
            'control' => array(
                'label'                 =>  __( 'Enable Tagline', 'chrimbo' ),
                'section'               => 'title_tagline',
                'type'                  => 'checkbox',
                'priority'              => 90,
                'active_callback'       => ''
            )
        );
}
