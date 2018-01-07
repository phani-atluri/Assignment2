<?php
if( ! function_exists( 'chrimbo_single_post_image_align' ) ) :
    /**
     * chrimbo default layout function
     *
     * @since  Chrimbo 1.0.0
     *
     * @param int
     * @return string
     */
    function chrimbo_single_post_image_align( $post_id = null ){
        global $chrimbo_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $chrimbo_single_post_image_align = $chrimbo_customizer_all_values['chrimbo-single-post-image-align'];
        $chrimbo_single_post_image_align_meta = get_post_meta( $post_id, 'chrimbo-single-post-image-align', true );

        if( false != $chrimbo_single_post_image_align_meta ) {
            $chrimbo_single_post_image_align = $chrimbo_single_post_image_align_meta;
        }
        return $chrimbo_single_post_image_align;
    }
endif;