<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-activities-enable'] = 0;
$chrimbo_customizer_defaults['chrimbo-activities-selection'] = 'from-page';
$chrimbo_customizer_defaults['chrimbo-activities-number'] = 3;
$chrimbo_customizer_defaults['chrimbo-activities-word-count'] = 30;


/*activities setting*/
$chrimbo_sections['chrimbo-activities-controll-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'News-Activities Options Settings', 'chrimbo' ),
        'panel'          => 'chrimbo-activities-section',
    );

// enable option for news slider
$chrimbo_settings_controls['chrimbo-activities-enable'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-activities-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable News-Activities Section On', 'chrimbo' ),
            'section'               => 'chrimbo-activities-controll-setting',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
                                                  
// select the number of page option
$chrimbo_settings_controls['chrimbo-activities-number'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-activities-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of News-Activities Section', 'chrimbo' ),
            'section'               => 'chrimbo-activities-controll-setting',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'chrimbo' ),
                2 => __( '2', 'chrimbo' ),
                3 => __( '3', 'chrimbo' ),
            ),
            'priority'              => 30,
            'active_callback'       => ''
        )
    );

// slect number of count in news activities
    $chrimbo_settings_controls['chrimbo-activities-word-count'] =
        array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-activities-word-count']
            ),
            'control' => array(
                'label'                 =>  __( 'Nesw-Activity-page- Number Of Words', 'chrimbo' ),
                'description'           =>  __( 'If you do not have selected from - Custom', 'chrimbo' ),
                'section'               => 'chrimbo-activities-controll-setting',
                'type'                  => 'number',
                'priority'              => 35,
                'input_attrs' => array( 'min' => 1, 'max' => 200),
                'active_callback'       => ''

            )
        );
