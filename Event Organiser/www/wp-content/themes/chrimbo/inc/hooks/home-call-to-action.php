<?php
if ( ! function_exists( 'chrimbo_home_call_to_action' ) ) :
    /**
     * Call-To-Action
     *
     * @since Chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_home_call_to_action()
    {
        global $chrimbo_customizer_all_values;
        if( 1 != $chrimbo_customizer_all_values['chrimbo-call-to-action-enable'] )
        {
            return null;
        }
        $chrimbo_home_donate_single_words = absint( $chrimbo_customizer_all_values['chrimbo-call-to-action-single-words'] );
        $chrimbo_home_donate_posts = absint($chrimbo_customizer_all_values['chrimbo-call-to-action-page']);
        $chrimbo_home_donate_button = esc_html($chrimbo_customizer_all_values['chrimbo-call-to-action-button-text'] );
        $chrimbo_home_donate_button_link = esc_url($chrimbo_customizer_all_values['chrimbo-call-to-action-button-link'] );
        ?>
        <?php
        if( !empty( $chrimbo_home_donate_posts ))
        {
            $chrimbo_feature_slider_args =    array(
                'post_type' => 'page',
                'p' => $chrimbo_home_donate_posts,
                'posts_per_page' => 1

            );
            $chrimbo_fature_section_post_query = new WP_Query( $chrimbo_feature_slider_args );
            if ( $chrimbo_fature_section_post_query->have_posts() ) :
                while ( $chrimbo_fature_section_post_query->have_posts() ) : $chrimbo_fature_section_post_query->the_post();
                    if(has_post_thumbnail())
                    {
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                    }
                    else
                    {
                        $thumb[0] = get_template_directory_uri() .'/assets/img/callup-banner.png';
                    }
                    ?>               

                    <section class="wrapper wrapper-callback" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')";>
                        <div class="thumb-overlay">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                                        <h2><?php the_title(); ?></h2>
                                        <div class="text-content">
                                            <?php echo wp_kses_post(chrimbo_words_count( $chrimbo_home_donate_single_words ,get_the_content()));; ?>
                                        </div>
                                        <div class="btn-holder"><a href="<?php 
                                        if (empty($chrimbo_home_donate_button_link))
                                        {
                                            the_permalink();
                                        }
                                        else
                                        {
                                            echo esc_url($chrimbo_home_donate_button_link);
                                        }
                                        ?>" class="button"> <?php echo esc_html($chrimbo_home_donate_button);?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                endwhile;
            endif;
        }
        if( empty( $chrimbo_home_donate_posts ))
        {
            $chrimbo_donet_Section_default_args =    array(
                'post_type' => 'page',
                'posts_per_page' => 1,
                'orderby' => 'post__in',
            );
        $chrimbo_donet_default_post_query = new WP_Query( $chrimbo_donet_Section_default_args );
        if ( $chrimbo_donet_default_post_query->have_posts() ) :
        while ( $chrimbo_donet_default_post_query->have_posts() ) : $chrimbo_donet_default_post_query->the_post();
        if(has_post_thumbnail())
        {
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        }
        else
        {
            $thumb[0] = '';
        }
        ?>               

        <section class="wrapper wrapper-callback" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')";>
            <div class="thumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                        <h2><?php the_title(); ?></h2>
                        <div class="text-content">
                            <?php echo wp_kses_post(chrimbo_words_count( $chrimbo_home_donate_single_words ,get_the_content()));; ?>
                        </div>
                        <div class="btn-holder"><a href="<?php 
                        if (empty($chrimbo_home_donate_button_link))
                        {
                            the_permalink();
                        }
                        else
                        {
                            echo esc_url($chrimbo_home_donate_button_link);
                        }
                        ?>" class="button"> <?php echo esc_html($chrimbo_home_donate_button);?></a></div>
                    </div>
                </div>
            </div>
        </section>         
        <?php
            endwhile;
        endif;
    }
}
endif;

add_action( 'chrimbo_action_front_page', 'chrimbo_home_call_to_action', 30 );