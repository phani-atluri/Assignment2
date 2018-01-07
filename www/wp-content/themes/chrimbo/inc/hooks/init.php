<?php
/**
 * Implement Editor Styles
 *
 * @since Chrimbo 1.0.0
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'chrimbo_add_editor_styles' );

if ( ! function_exists( 'chrimbo_add_editor_styles' ) ) :
    function chrimbo_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;