<?php
if( ! function_exists( 'chrimbo_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  Chrimbo 1.0.0
     *
     * @param null
     * @return int
     */
function chrimbo_excerpt_length( $length ){
    global $chrimbo_customizer_all_values;
    $excerpt_length = $chrimbo_customizer_all_values['chrimbo-number-of-archive-words'];
    if ( empty( $excerpt_length) ) {
        $excerpt_length = $length;
    }
    return esc_attr( $excerpt_length );

}

endif;
add_filter( 'excerpt_length', 'chrimbo_excerpt_length', 999 );