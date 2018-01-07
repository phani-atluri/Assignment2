<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values call-to-action options*/
$chrimbo_customizer_defaults['chrimbo-call-to-action-enable'] = 1;
$chrimbo_customizer_defaults['chrimbo-call-to-action-page'] = 0;

/* Feature section Enable settings*/
$chrimbo_sections['chrimbo-call-action-options'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Section Options', 'chrimbo' ),
        'panel'          => 'chrimbo-call-action-panel',
    );

/*call-to-action section enable control*/
$chrimbo_settings_controls['chrimbo-call-to-action-enable'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-call-to-action-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Call-To-Action Section', 'chrimbo' ),
            'description'           =>  __( 'Enable "Call-To-Action Section" on checked', 'chrimbo' ),
            'section'               => 'chrimbo-call-action-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


    /*creating setting control for chrimbo-call-to-action-page start*/
    $chrimbo_settings_controls['chrimbo-call-to-action-page'] =
        array(
                'setting' =>     array(
                    'default'              => $chrimbo_customizer_defaults['chrimbo-call-to-action-page'],
                    ),
                'control' => array(
                    'label'                 =>  __( 'Select Page For Call-to-ACtion Section', 'chrimbo' ),
                    'description'           => '',
                    'section'               => 'chrimbo-call-action-options',
                    'type'                  => 'dropdown-pages',
                    'priority'              => 20
                )
        );
