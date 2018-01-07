<?php
global $chrimbo_sections;
global $chrimbo_settings_controls;
global $chrimbo_repeated_settings_controls;
global $chrimbo_customizer_defaults;

/*defaults values*/
$chrimbo_customizer_defaults['chrimbo-enable-breadcrumb'] = 1;
$chrimbo_customizer_defaults['chrimbo-enable-back-to-top'] = 1;
$chrimbo_customizer_defaults['chrimbo-enable-pre-loader'] = 1;

$chrimbo_customizer_defaults['chrimbo-footer-sidebar-number'] = 3;
$chrimbo_customizer_defaults['chrimbo-copyright-text'] = __('Copyright &copy; All right reserved.','chrimbo');
$chrimbo_customizer_defaults['chrimbo-enable-theme-name'] = 1;

$chrimbo_sections['chrimbo-footer-options'] =
    array(
        'priority'       => 60,
        'title'          => __( 'Footer Options', 'chrimbo' ),
        'panel'          => 'chrimbo-theme-options'
    );


    $chrimbo_settings_controls['chrimbo-footer-sidebar-number'] =
        array(
            'setting' =>     array(
                'default'              => $chrimbo_customizer_defaults['chrimbo-footer-sidebar-number'],
            ),
            'control' => array(
                'label'                 =>  __( 'Number of Sidebars In Footer Area', 'chrimbo' ),
                'section'               => 'chrimbo-footer-options',
                'type'                  => 'select',
                'choices'               => array(
                    0 => __( 'Disable footer sidebar area', 'chrimbo' ),
                    1 => __( '1', 'chrimbo' ),
                    2 => __( '2', 'chrimbo' ),
                    3 => __( '3', 'chrimbo' )
                ),
                'priority'              => 10,
                'description'           => '',
                'active_callback'       => ''
            )
        );


$chrimbo_settings_controls['chrimbo-copyright-text'] =
    array(
        'setting' =>     array(
            'default'              => $chrimbo_customizer_defaults['chrimbo-copyright-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Copyright Text', 'chrimbo' ),
            'section'               => 'chrimbo-footer-options',
            'type'                  => 'text_html',
            'priority'              => 20,
        )
    );