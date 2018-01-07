<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-activities-pages'] = 0;
$chrimbo_customizer_defaults['chrimbo-activities-title'] = __('Events and Activity','chrimbo');


/*page selection*/
$chrimbo_sections['chrimbo-activities-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'News-Activities Form Page', 'chrimbo' ),
        'description'    => __( 'This option only work when you have selected "Page" in "Select Activities Section From" ', 'chrimbo' ),
        'panel'          => 'chrimbo-activities-section',
    );

/*creating setting control for chrimbo-news-activities-page start*/
$chrimbo_repeated_settings_controls['chrimbo-activities-pages'] =
    array(
        'repeated' => 3,
        'chrimbo-activities-pages-ids' => array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-activities-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Slide %s', 'chrimbo' ),
                'section'               => 'chrimbo-activities-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 20,
                'description'           => ''
            )
        ),
        'chrimbo-activities-pages-divider' => array(
            'control' => array(
                'section'               => 'chrimbo-activities-pages',
                'type'                  => 'message',
                'priority'              => 30,
                'description'           => '<br /><hr />'
            )
        )
    );

// mian titile option 
$chrimbo_settings_controls['chrimbo-activities-title'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-activities-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title Text', 'chrimbo' ),
            'section'               => 'chrimbo-activities-pages',
            'type'                  => 'text',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );