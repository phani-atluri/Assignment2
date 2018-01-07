<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values feature trip options*/
$chrimbo_customizer_defaults['chrimbo-feature-banner-enable'] = 1;
$chrimbo_customizer_defaults['chrimbo-feature-banner-enable-snow-effect'] = 1;


/*book event ticket slider enable setting*/
$chrimbo_sections['chrimbo-feature-section-options'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Setting Options', 'chrimbo' ),
        'panel'          => 'chrimbo-feature-banner',
    );

/*Feature section enable control*/
$chrimbo_settings_controls['chrimbo-feature-banner-enable'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-feature-banner-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Feature Banner', 'chrimbo' ),
            'section'               => 'chrimbo-feature-section-options',
        	'description'    		=> __( 'Enable "Feature Banner" on checked' , 'chrimbo' ),
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/*Feature section enable snow effect*/
$chrimbo_settings_controls['chrimbo-feature-banner-enable-snow-effect'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-feature-banner-enable-snow-effect']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Feature Banner Snow Fall', 'chrimbo' ),
            'section'               => 'chrimbo-feature-section-options',
            'description'           => __( 'Enable "Feature Banner Snow Fall" on checked' , 'chrimbo' ),
            'type'                  => 'checkbox',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

