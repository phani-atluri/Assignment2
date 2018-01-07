<?php
if ( ! function_exists( 'chrimbo_activity_array' ) ) :
    /**
     * Activity array creation
     *
     * @since Chrimbo 1.0.0
     *
     * @param string $from_activity
     * @return array
     */
    function chrimbo_activity_array( $from_activity )
    {
        global $chrimbo_customizer_all_values;
       
        $chrimbo_activities_number = absint( $chrimbo_customizer_all_values['chrimbo-activities-number'] );
        $chrimbo_activities_single_words = absint( $chrimbo_customizer_all_values['chrimbo-activities-word-count'] );
        $chrimbo_activity_section_default_args =    array(
            'post_type' => 'page',
            'posts_per_page' => 1,
            'orderby' => 'post__in'
        );
        $chrimbo_activity_section_default_post_query = new WP_Query( $chrimbo_activity_section_default_args );
            while ( $chrimbo_activity_section_default_post_query->have_posts() ) : $chrimbo_activity_section_default_post_query->the_post();
                $chrimbo_activities_contents_array[0]['chrimbo-activities-title'] = get_the_title();
                $chrimbo_activities_contents_array[0]['chrimbo-activities-content'] = chrimbo_words_count( $chrimbo_activities_single_words ,get_the_content());
                $chrimbo_activities_contents_array[0]['chrimbo-activities-link'] = get_the_permalink();
                $chrimbo_activities_contents_array[0]['chrimbo-activities-image'] = get_the_post_thumbnail( );
            endwhile;
        $repeated_page = array('chrimbo-activities-pages-ids');
        $chrimbo_activities_args = array();

        if ( 'from-category' ==  $from_activity )
        {
            $chrimbo_activities_category = $chrimbo_customizer_all_values['chrimbo-activities-category'];
            if( 0 != $chrimbo_activities_category )
            {
                $chrimbo_activities_args =    array(
                    'post_type' => 'post',
                    'cat' => $chrimbo_activities_category,
                    'ignore_sticky_posts' => true
                );
            }
        }
        else
        {
            $chrimbo_activities_posts = evision_customizer_get_repeated_all_value(8 , $repeated_page);
            $chrimbo_activities_posts_ids = array();
            if( null != $chrimbo_activities_posts ) {
                foreach( $chrimbo_activities_posts as $chrimbo_activities_post )
                {
                    if( 0 != $chrimbo_activities_post['chrimbo-activities-pages-ids'] )
                    {
                        $chrimbo_feature_section_posts_ids[] = $chrimbo_activities_post['chrimbo-activities-pages-ids'];
                    }
                }

                if( !empty( $chrimbo_feature_section_posts_ids ))
                {
                    $chrimbo_activities_args =    array(
                        'post_type' => 'page',
                        'post__in' => $chrimbo_feature_section_posts_ids,
                        'posts_per_page' => $chrimbo_activities_number,
                        'orderby' => 'post__in'
                    );
                }

            }
        }
        if( !empty( $chrimbo_activities_args ))
        {
            // the query
            $chrimbo_activities_post_query = new WP_Query( $chrimbo_activities_args );

            if ( $chrimbo_activities_post_query->have_posts() ) :
                $i = 0;
                while ( $chrimbo_activities_post_query->have_posts() ) : $chrimbo_activities_post_query->the_post();
                    $url ='';
                    if(has_post_thumbnail())
                    {
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'chrimbo-home-activities-image' );
                        $url = $thumb['0'];
                    }
                    $chrimbo_activities_contents_array[$i]['chrimbo-activities-title'] = get_the_title();
                    $chrimbo_activities_contents_array[$i]['chrimbo-activities-content'] = chrimbo_words_count( $chrimbo_activities_single_words ,get_the_content());
                    $chrimbo_activities_contents_array[$i]['chrimbo-activities-link'] = get_permalink();
                    $chrimbo_activities_contents_array[$i]['chrimbo-activities-image'] = $url;
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $chrimbo_activities_contents_array;
    }
endif;

if ( ! function_exists( 'chrimbo_activities_slider' ) ) :
    /**
     * Featured Slider
     *
     * @since Chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_activities_slider()
    { 
        global $chrimbo_customizer_all_values;
        $chrimbo_activities_main_title = esc_html( $chrimbo_customizer_all_values['chrimbo-activities-title'] );
        if( 0 == $chrimbo_customizer_all_values['chrimbo-activities-enable'] )
        {
            return null;
        }
        
        $chrimbo_activities_selection_options = $chrimbo_customizer_all_values['chrimbo-activities-selection'];
        $chrimbo_activities_slider_arrays = chrimbo_activity_array( $chrimbo_activities_selection_options );


        if( is_array( $chrimbo_activities_slider_arrays ))
        {
            $chrimbo_activities_number = absint( $chrimbo_customizer_all_values['chrimbo-activities-number'] );
            ?>
            
            <section id="wrapper-activity" class="wrapper wrapper-activity">
                <div class="evt-title">
                    <h2><?php echo esc_html( $chrimbo_activities_main_title ); ?></h2>
                </div>
                <div class="carousel-group">
                    <?php
                    $i = 1;
                    foreach( $chrimbo_activities_slider_arrays as $chrimbo_activities_slider_array )
                    {
                        if( $chrimbo_activities_number < $i)
                        {
                            break;
                        }
                        if(empty($chrimbo_activities_slider_array['chrimbo-activities-image']))
                        {
                            $chrimbo_feature_slider_image = get_template_directory_uri().'/assets/img/activity.png';
                        }
                        else
                        {
                            $chrimbo_feature_slider_image =$chrimbo_activities_slider_array['chrimbo-activities-image'];
                        }
                        ?>
                            <div class="carousel-item singlethumb pad0lr">
                                <a href="<?php echo esc_url( $chrimbo_activities_slider_array['chrimbo-activities-link'] );?>">

                                    <div class="thumb-holder">
                                        <img class="<?php 
                                        if( 1 == $chrimbo_customizer_all_values['chrimbo-activities-thumbnail-color-enable'] ){
                                            echo "desaturate";
                                        } ?>" src="<?php echo esc_url( $chrimbo_feature_slider_image )?>">
                                    </div>
                                    <div class="content-area">
                                        <h2><?php echo esc_html( $chrimbo_activities_slider_array['chrimbo-activities-title'] );?></h2>
                                        <span class="divider"></span>
                                        <div class="content-text">
                                            <?php echo wp_kses_post( $chrimbo_activities_slider_array['chrimbo-activities-content'] );?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </section>
            <?php
        }
    }
endif;
add_action( 'chrimbo_action_front_page', 'chrimbo_activities_slider', 20 );