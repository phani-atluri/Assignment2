<?php
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-default-banner-image'] = get_template_directory_uri().'/assets/img/callup-banner.png';
$chrimbo_customizer_defaults['chrimbo-default-layout'] = 'right-sidebar';
$chrimbo_customizer_defaults['chrimbo-archive-layout'] = 'thumbnail-and-excerpt';
$chrimbo_customizer_defaults['chrimbo-archive-image-align'] = 'full';
$chrimbo_customizer_defaults['chrimbo-number-of-archive-words'] = 30;
$chrimbo_customizer_defaults['chrimbo-single-post-image-align'] = 'full';


$chrimbo_sections['chrimbo-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Layout Options', 'chrimbo' ),
        'panel'          => 'chrimbo-theme-options',
    );

$chrimbo_settings_controls['chrimbo-default-banner-image'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-default-banner-image'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Banner Image', 'chrimbo' ),
            'description'           =>  __( 'Please note that if you remove this image default banner image will appear', 'chrimbo' ),
            'section'               => 'chrimbo-layout-options',
            'type'                  => 'image',
            'priority'              => 10,
        )
    );

/*layout-options option responsive lodader start*/
$chrimbo_settings_controls['chrimbo-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-default-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Layout', 'chrimbo' ),
            'description'           =>  __( 'Layout for all archives, single posts and pages', 'chrimbo' ),
            'section'               => 'chrimbo-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'chrimbo' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'chrimbo' ),
                'no-sidebar' => __( 'No Sidebar', 'chrimbo' )
            ),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$chrimbo_settings_controls['chrimbo-number-of-archive-words'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-number-of-archive-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words For Excerpt', 'chrimbo' ),
            'description'           =>  __( 'This will controll the excerpt length on listing page', 'chrimbo' ),
            'section'               => 'chrimbo-layout-options',
            'type'                  => 'number',
            'priority'              => 40,
            'input_attrs' => array( 'min' => 1, 'max' => 2000),
            'active_callback'       => ''
        )
    );


$chrimbo_settings_controls['chrimbo-single-post-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-single-post-image-align'],
        ),
        'control' => array(
            'label'                 =>  __( 'Alignment Of Image In Single Post/Page', 'chrimbo' ),
            'section'               => 'chrimbo-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => __( 'Full', 'chrimbo' ),
                'right' => __( 'Right', 'chrimbo' ),
                'left' => __( 'Left', 'chrimbo' ),
                'no-image' => __( 'No image', 'chrimbo' )
            ),
            'priority'              => 50,
            'description'           =>  __( 'Please note that this setting can be override form individual post/page', 'chrimbo' ),
        )
    );