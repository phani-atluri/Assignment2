<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values feature time line options*/
$chrimbo_customizer_defaults['chrimbo-feature-event-section-enable'] = 0;

/*time lilne section options*/
$chrimbo_sections['chrimbo-fs-event-options'] =
    array(
        'priority'       => 70,
        'title'          => __( 'Enable Option', 'chrimbo' ),
        'panel'          => 'chrimbo-feature-event-section',
    );

$chrimbo_settings_controls['chrimbo-feature-event-section-enable'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-feature-event-section-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable a Event Section', 'chrimbo' ),
            'section'               => 'chrimbo-fs-event-options',
            'type'                  => 'checkbox',
            'priority'              => 5,
            'active_callback'       => '',
        )
    );
