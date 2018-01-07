<?php
if ( ! function_exists( 'chrimbo_home_about_event_section' ) ) :
    /**
    * about-event 
    *
    * @since Chrimbo 1.0.0
    *
    * @param null
    * @return null
    *
    */
function  chrimbo_home_about_event_section()
{
	global $chrimbo_customizer_all_values;
    $chrimbo_feature_slider_single_words_about = absint( $chrimbo_customizer_all_values['chrimbo-fs-single-words-about'] );
	$chrimbo_home_about_event_button_text = esc_html($chrimbo_customizer_all_values['chrimbo-fs-home-about-button-text']);
	$chrimbo_home_about_event_posts = absint($chrimbo_customizer_all_values['chrimbo-about-event-page']);

    // $chrimbo_home_abou_event_button = $chrimbo_customizer_all_values['chrimbo-feature-about-event-button'] ;
    if( 0 == $chrimbo_customizer_all_values['chrimbo-feature-about-event-enable'] )
	{
        return null;
    }
    ?>
    <?php
    if( !empty( $chrimbo_home_about_event_posts ))
    {
        $chrimbo_feature_about_event_args =    array(
            'post_type' => 'page',
            'p' => $chrimbo_home_about_event_posts,
            'posts_per_page' => 1

        );
        $chrimbo_fature_about_event_section_post_query = new WP_Query( $chrimbo_feature_about_event_args );
        if ( $chrimbo_fature_about_event_section_post_query->have_posts() ) :
        	while ( $chrimbo_fature_about_event_section_post_query->have_posts() ) : $chrimbo_fature_about_event_section_post_query->the_post();
        		if(has_post_thumbnail())
        		{
            		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        		}
        		else
        		{
            		$thumb[0] = get_template_directory_uri() .'/assets/img/s1.png';
        		}
        		?>

		        <section class="wrapper about-event-section clearfix">
	                <div class="container-wrap">
	                    <div class="row">
	                        <div class="col-md-6">
	                            <div class="about-text">
	                                <h2><?php the_title(); ?></h2>
	                                <p><?php echo wp_kses_post(chrimbo_words_count( $chrimbo_feature_slider_single_words_about ,get_the_content()));; ?></p>
	                                <div class="btn-holder">
	                                    <a href="<?php the_permalink();?>" class="button"><?php  echo esc_html(  $chrimbo_home_about_event_button_text); ?></a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="background-image col-md-6" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')";></div>
	                    </div>
	                </div>
		        </section>
        		<?php
            endwhile;
        endif;
    } 
  	if( empty( $chrimbo_home_about_event_posts ))
  	{
        $chrimbo_feature_about_event_args =    array(
            'post_type' => 'page',
            'posts_per_page' => 1,
            'orderby' => 'post__in',
        );
        $chrimbo_about_event_default_post_query = new WP_Query( $chrimbo_feature_about_event_args );
        if ( $chrimbo_about_event_default_post_query->have_posts() ) :
        	while ( $chrimbo_about_event_default_post_query->have_posts() ) : $chrimbo_about_event_default_post_query->the_post();
        		if(has_post_thumbnail())
        		{
            		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        		}
        		else
        		{
            		$thumb[0] = '';
        		}
        		?>
		        <section class="wrapper about-event-section clearfix">
		                <div class="container-wrap">
		                    <div class="row">
		                        <div class="col-md-6">
		                            <div class="about-text">
		                                <h2><?php the_title(); ?></h2>
		                                <p><?php the_content();?></p>
		                                <div class="btn-holder">
		                                    <a href="#" class="button"><?php echo esc_html( $chrimbo_home_about_event_button_text); ?></a>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="background-image col-md-6" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')";></div>
		                    </div>
		                </div>
		            </section>
        		<?php
            endwhile;
        endif;
    } 
}
endif;

add_action( 'chrimbo_action_front_page', 'chrimbo_home_about_event_section', 16 );
