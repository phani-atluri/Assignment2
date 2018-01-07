<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chrimbo_widgets_init() {
	register_sidebar( array(
		'name'          =>  esc_html__( 'Sidebar', 'chrimbo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    $chrimbo_get_all_options = chrimbo_get_all_options(1);
    $chrimbo_footer_widgets_number = $chrimbo_get_all_options['chrimbo-footer-sidebar-number'];

    if( $chrimbo_footer_widgets_number > 0 ){
        register_sidebar(array(
            'name' => __('Footer Column One', 'chrimbo'),
            'id' => 'footer-col-one',
            'description' => __('Displays items on footer section.','chrimbo'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        if( $chrimbo_footer_widgets_number > 1 ){
            register_sidebar(array(
                'name' => __('Footer Column Two', 'chrimbo'),
                'id' => 'footer-col-two',
                'description' => __('Displays items on footer section.','chrimbo'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
        if( $chrimbo_footer_widgets_number > 2 ){
            register_sidebar(array(
                'name' => __('Footer Column Three', 'chrimbo'),
                'id' => 'footer-col-three',
                'description' => __('Displays items on footer section.','chrimbo'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
    }
}
add_action( 'widgets_init', 'chrimbo_widgets_init' );

