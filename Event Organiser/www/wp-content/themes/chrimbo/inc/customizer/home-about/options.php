<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values feature about event options*/
$chrimbo_customizer_defaults['chrimbo-fs-single-words-about'] = 30;
$chrimbo_customizer_defaults['chrimbo-feature-about-event-enable'] = 0;
$chrimbo_customizer_defaults['chrimbo-fs-home-about-button-text'] = __('KNOW MORE','chrimbo');
$chrimbo_customizer_defaults['chrimbo-about-event-page'] = 0;

/*about event section*/
$chrimbo_sections['chrimbo-feature-about-event-section-options'] =
    array(
        'priority'       => 10,
        'title'          => __( 'About-Event Options', 'chrimbo' ),
        'panel'          => 'chrimbo-home-about',
    );

/*about event section enable control*/
$chrimbo_settings_controls['chrimbo-feature-about-event-enable'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-feature-about-event-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable About Event', 'chrimbo' ),
            'section'               => 'chrimbo-feature-about-event-section-options',
        	'description'    		=> __( 'Enable "About Event" on checked' , 'chrimbo' ),
            'type'                  => 'checkbox',
            'priority'              => 5,
            'active_callback'       => ''
        )
    );

/*about event section button text*/
$chrimbo_settings_controls['chrimbo-fs-home-about-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-home-about-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Botton text', 'chrimbo' ),
            'section'               => 'chrimbo-feature-about-event-section-options',
            'type'                  => 'text',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );

/*creating setting control for chrimbo-About-event-page start*/
    $chrimbo_settings_controls['chrimbo-about-event-page'] =
        array(
                'setting' =>     array(
                    'default'              => $chrimbo_customizer_defaults['chrimbo-about-event-page'],
                    ),
                'control' => array(
                    'label'                 =>  __( 'Select Page For About Event Section', 'chrimbo' ),
                    'description'           => '',
                    'section'               => 'chrimbo-feature-about-event-section-options',
                    'type'                  => 'dropdown-pages',
                    'priority'              => 20
                )
        );

// number single word's
$chrimbo_settings_controls['chrimbo-fs-single-words-about'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-single-words-about']
        ),
        'control' => array(
            'label'                 =>  __( 'Single Slider- Number Of Words', 'chrimbo' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'chrimbo' ),
            'section'               => 'chrimbo-feature-about-event-section-options',
            'type'                  => 'number',
            'priority'              => 10,
            'active_callback'       => '',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
        )
    );