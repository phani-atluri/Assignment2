<?php 
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-fs-slider-background-image'] = get_template_directory_uri().'/assets/img/callup-banner.png';
$chrimbo_customizer_defaults['chrimbo-fs-single-words'] = 30;
$chrimbo_customizer_defaults['chrimbo-fs-title-text'] = '';
$chrimbo_customizer_defaults['chrimbo-fs-content-text'] = '';
$chrimbo_customizer_defaults['chrimbo-fs-button-text'] = __('LEARN MORE','chrimbo');
$chrimbo_customizer_defaults['chrimbo-fs-button-url'] = '#';
/*fs options*/
$chrimbo_sections['chrimbo-fs-banner-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Feature Banner', 'chrimbo' ),
        'panel'          => 'chrimbo-feature-banner',
    );

// slider background image
$chrimbo_settings_controls['chrimbo-fs-slider-background-image'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-slider-background-image']
        ),
        'control' => array(
            'label'                 =>  __( 'Feature Banner Background Image', 'chrimbo' ),
            'description'           =>  __( 'Please note that if you remove this image default banner image will appear', 'chrimbo' ),
            'section'               => 'chrimbo-fs-banner-options',
            'type'                  => 'image',
            'priority'              => 5,
            'active_callback'       => '',
        )
    );

// number of word in slider section
$chrimbo_settings_controls['chrimbo-fs-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Banner- Number Of Words', 'chrimbo' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'chrimbo' ),
            'section'               => 'chrimbo-fs-banner-options',
            'type'                  => 'number',
            'priority'              => 10,
            'active_callback'       => '',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
        )
    );

// slider title text
$chrimbo_settings_controls['chrimbo-fs-title-text'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-title-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Feature Banner Title Text', 'chrimbo' ),
            'section'               => 'chrimbo-fs-banner-options',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => '',
        )
    );

// slider content text
$chrimbo_settings_controls['chrimbo-fs-content-text'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-content-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Feature Banner Content TextArea', 'chrimbo' ),
            'section'               => 'chrimbo-fs-banner-options',
            'type'                  => 'textarea',
            'priority'              => 20,
            'active_callback'       => '',
        )
    );

// slider button text
$chrimbo_settings_controls['chrimbo-fs-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Feature Banner Button text', 'chrimbo' ),
            'section'               => 'chrimbo-fs-banner-options',
            'type'                  => 'text',
            'priority'              => 40,
            'active_callback'       => '',
        )
    );

// slider button url
$chrimbo_settings_controls['chrimbo-fs-button-url'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-fs-button-url']
        ),
        'control' => array(
            'label'                 =>  __( 'Feature Banner Button url', 'chrimbo' ),
            'description'           =>  __( 'Will redirect to the costume URL ', 'chrimbo' ),
            'section'               => 'chrimbo-fs-banner-options',
            'type'                  => 'url',
            'priority'              => 50,
            'active_callback'       => '',
        )
    );





