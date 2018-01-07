<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values call to action options*/
$chrimbo_customizer_defaults['chrimbo-call-to-action-single-words'] = 40;
$chrimbo_customizer_defaults['chrimbo-call-to-action-button-text'] = __('VIEW MORE','chrimbo');
$chrimbo_customizer_defaults['chrimbo-call-to-action-button-link'] = '';

/* Feature section Enable settings*/
$chrimbo_sections['chrimbo-call-to-section-section-settings'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Section Settings', 'chrimbo' ),
        'panel'          => 'chrimbo-call-action-panel',
    );


/*String in max to be appear as description on call to action*/
$chrimbo_settings_controls['chrimbo-call-to-action-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-call-to-action-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words', 'chrimbo' ),
            'description'           =>  __( 'Give number of words you wish to be appear on home page call to actionsection', 'chrimbo' ),
            'section'               => 'chrimbo-call-to-section-section-settings',
            'type'                  => 'number',
            'priority'              => 20,
            'active_callback'       => '',
            'input_attrs' => array( 'min' => 1, 'max' => 200),

        )
    );

/*String in max to be appear as description on call to action*/
$chrimbo_settings_controls['chrimbo-call-to-action-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-call-to-action-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Button Text', 'chrimbo' ),
            'section'               => 'chrimbo-call-to-section-section-settings',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => '',
            
        )
    ); 

/*call to action button url*/
$chrimbo_settings_controls['chrimbo-call-to-action-button-link'] =
array(
    'setting' =>     array(
        'default'              => $chrimbo_customizer_defaults['chrimbo-call-to-action-button-link']
    ),
    'control' => array(
        'label'                 =>  __( 'Call TO Action Button URL', 'chrimbo' ),
        'description'           =>  __( 'Will redirect to the costume URL ', 'chrimbo' ),
        'section'               => 'chrimbo-call-to-section-section-settings',
        'type'                  => 'url',
        'priority'              => 70,
        'active_callback'       => ''
    )
);
