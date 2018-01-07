<?php
global $chrimbo_panels;
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*creating panel for fonts-setting*/
$chrimbo_panels['chrimbo-fonts'] =
    array(
        'title'          => __( 'Font Setting', 'chrimbo' ),
        'priority'       => 43
    );

/*font array*/
global $chrimbo_google_fonts;
$chrimbo_google_fonts = array(
    'Archivo+Narrow:400,400italic,700' => 'Archivo Narrow',
    'Bitter:400,400italic,700' => 'Bitter',
    'Cookie' => 'Cookie',
    'Exo:400,300,400italic,600,800' => 'Exo',
    'Kreon:400,300,700' => 'Kreon',
    'Lato:400,300,400italic,900,700' => 'Lato',
    'News+Cycle:400,700' => 'News Cycle',
    'Oxygen:400,300,700' => 'Oxygen',
    'Playball' => 'Playball',
    'Ropa+Sans:400,400italic' => 'Ropa Sans',
    'Squada+One' => 'Squada One',
    'Tangerine:400,700' => 'Tangerine',
    'Ubuntu:400,400italic,500,700' => 'Ubuntu',
    'Varela+Round' => 'Varela Round',
    'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz',
    'Playfair+Display:400,400i,700,700i,900'  => 'Playfair Display',
);

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-font-family-site-identity'] = 'Lato:400,300,400italic,900,700';
$chrimbo_customizer_defaults['chrimbo-font-family-title'] = 'Lato:400,300,400italic,900,700';


/*section*/
$chrimbo_sections['chrimbo-family'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Font Family', 'chrimbo' ),
        'panel'          => 'chrimbo-fonts',
    );

/*setting - controls*/
$chrimbo_settings_controls['chrimbo-font-family-site-identity'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-font-family-site-identity'],
            
        ),
        'control' => array(
            'label'                 => __( 'Site Identity/Logo', 'chrimbo' ),
            'description'           => __( 'Site Identity font family', 'chrimbo' ),
            'section'               => 'chrimbo-family',
            'type'                  => 'select',
            'choices'               => $chrimbo_google_fonts,
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$chrimbo_settings_controls['chrimbo-font-family-title'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-font-family-title'],
            
        ),
        'control' => array(
            'label'                 => __( 'H1-H6 Font Family)', 'chrimbo' ),
            'section'               => 'chrimbo-family',
            'type'                  => 'select',
            'choices'               => $chrimbo_google_fonts,
            'priority'              => 15,
            'active_callback'       => ''
        )
    );