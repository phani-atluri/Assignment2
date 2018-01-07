<?php 
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-event-featured-event-title'] = '';
$chrimbo_customizer_defaults['chrimbo-event-featured-event-content'] = '';
$chrimbo_customizer_defaults['chrimbo-event-featured-event-icon'] = 'fa-desktop';
$chrimbo_customizer_defaults['chrimbo-event-featured-location-title'] = '';
$chrimbo_customizer_defaults['chrimbo-event-featured-location-content'] = '';
$chrimbo_customizer_defaults['chrimbo-event-featured-location-icon'] = 'fa-desktop';
$chrimbo_customizer_defaults['chrimbo-event-featured-time-title'] = '';
$chrimbo_customizer_defaults['chrimbo-event-featured-time-content'] = '';
$chrimbo_customizer_defaults['chrimbo-event-featured-time-icon'] = 'fa-desktop';

/*acivity section options-setting*/
$chrimbo_sections['chrimbo-fs-acitivity-section-setting'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Main-Event-Setting', 'chrimbo' ),
        'panel'          => 'chrimbo-feature-event-section',
    );

// acitivity -section for event 
$chrimbo_settings_controls['chrimbo-event-featured-event-title'] =
    array(
        'setting' =>     array(
            'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-event-title'] 
        ),
        'control' => array(
            'label'                 =>  __( 'Title For event', 'chrimbo' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 5,
            'active_callback'       => '',
        )
    );

$chrimbo_settings_controls['chrimbo-event-featured-event-content'] =
    array(
        'setting' =>     array(
            'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-event-content'] 
        ),
        'control' => array(
            'label'                 =>  __( 'Content For event', 'chrimbo' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 10,
            'active_callback'       => '',
        )
    );

$chrimbo_settings_controls['chrimbo-event-featured-event-icon'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-event-icon']
        ),
        'control' => array(
            'label'                 =>  __( 'Icon for event', 'chrimbo' ),
            'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'chrimbo' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 15,
            'active_callback'       => '',
        )
    ); 

// acitivity -section for location
$chrimbo_settings_controls['chrimbo-event-featured-location-title'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-location-title'] 
        ),
        'control' => array(
            'label'                 =>  __( 'Title For location', 'chrimbo' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => '',
        )
    );


$chrimbo_settings_controls['chrimbo-event-featured-location-content'] =
    array(
        'setting' =>     array(
            'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-location-content'] 
        ),
        'control' => array(
            'label'                 =>  __( 'Content For location', 'chrimbo' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 25,
            'active_callback'       => '',
        )
    );

$chrimbo_settings_controls['chrimbo-event-featured-location-icon'] =
    array(
        'setting' =>     array(
            'default'              =>  $chrimbo_customizer_defaults['chrimbo-event-featured-location-icon'] 
        ),
        'control' => array(
            'label'                 =>  __( 'Icon For location', 'chrimbo' ),
            'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'chrimbo' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 30,
            'active_callback'       => '',
        )
    );

// acitivity -section for time
$chrimbo_settings_controls['chrimbo-event-featured-time-title'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-time-title'] 
        ),
        'control' => array(
            'label'                 =>  __( 'Title For time', 'chrimbo' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 35,
            'active_callback'       => '',
        )
    );

$chrimbo_settings_controls['chrimbo-event-featured-time-content'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-time-content']
        ),
        'control' => array(
            'label'                 =>  __( 'Content For time', 'chrimbo' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 40,
            'active_callback'       => '',
        )
    );    

$chrimbo_settings_controls['chrimbo-event-featured-time-icon'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-event-featured-time-icon']
        ),
        'control' => array(
            'label'                 =>  __( 'Content For icon', 'chrimbo' ),
            'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'chrimbo' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            'section'               => 'chrimbo-fs-acitivity-section-setting',
            'type'                  => 'text',
            'priority'              => 45,
            'active_callback'       => '',
        )
    ); 