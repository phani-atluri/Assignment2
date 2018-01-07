<?php
if ( ! function_exists( 'chrimbo_featured_home_slider' ) ) :
    /**
     * Featured Slider
     *
     * @since Chrimbo 0.0.0.1
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_featured_home_slider() { 
        global $chrimbo_customizer_all_values;
        if( 0 == $chrimbo_customizer_all_values['chrimbo-feature-banner-enable'] )
        {
            return null;
        }
            $chrimbo_feature_slider_single_words = absint( $chrimbo_customizer_all_values['chrimbo-fs-single-words'] );
            $chrimbo_feature_title_text = $chrimbo_customizer_all_values['chrimbo-fs-title-text'];
            $chrimbo_feature_caption_content = $chrimbo_customizer_all_values['chrimbo-fs-content-text'];
            $chrimbo_feature_button_text = $chrimbo_customizer_all_values['chrimbo-fs-button-text'];
            $chrimbo_feature_button_url = $chrimbo_customizer_all_values['chrimbo-fs-button-url'];
            $chrimbo_feature_background_image = $chrimbo_customizer_all_values['chrimbo-fs-slider-background-image'];

            ?>
            <section class="wrapper wrapper-slider" style="background-image: url('<?php echo esc_url( $chrimbo_feature_background_image )?>');">
                <div class="overlay-background clearfix">
                    <div class="slide-item">
                        <?php if ( 1  == $chrimbo_customizer_all_values['chrimbo-feature-banner-enable-snow-effect'] ) {?>
                        <div id="snow"></div>
                        <?php } ?>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 banner-content">
                            <div class="banner-content-holder">
                                <div class="banner-content-inner">
                                    <h1 class="slider-title"><?php echo esc_html($chrimbo_feature_title_text);?></h1>
                                    
                                    <div class="text-content">
                                        <?php echo wp_kses_post(chrimbo_words_count( $chrimbo_feature_slider_single_words,$chrimbo_feature_caption_content));?>
                                    </div>
                                        
                                    <div class="btn-holder"><a href="<?php echo esc_url( $chrimbo_feature_button_url );?>" class="button"><?php echo esc_html( $chrimbo_feature_button_text );?></a></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
    <?php
        }
endif;
add_action( 'chrimbo_action_front_page', 'chrimbo_featured_home_slider', 10 );