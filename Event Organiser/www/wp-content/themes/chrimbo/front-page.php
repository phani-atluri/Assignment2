<?php
/**
 * The template for displaying home page.
 * @package Chrimbo
 */
global $chrimbo_customizer_all_values;
get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
	include( get_home_template() );
    }

else{
	if ( ( $chrimbo_customizer_all_values['chrimbo-feature-banner-enable'] != 1 ) && ($chrimbo_customizer_all_values['chrimbo-activities-enable'] != 1 ) && ($chrimbo_customizer_all_values['chrimbo-call-to-action-enable'] != 1 )) 
	{
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section class="wrapper display-info">
				<div class="container">
				<?php echo sprintf(
					__( 'All Section are based on page. Enable each Section from customizer for </br> slider: Home/Front Main Banner Section -> Setting Options -> Enable. likewise to other sections </br> %s', 'chrimbo' ),
					'<a class="button" href="' . esc_url( admin_url( 'customize.php' ) ) . '">' . __( 'click here', 'chrimbo' ) . '</a>'
					); ?>
				</div>
			</section>
		<?php }
	}	
	else{
		
		/**
		 * chrimbo_action_front_page hook
		 * @since chrimbo 1.0.0
		 *
		 * @hooked chrimbo_action_front_page -  10
		 * @hooked chrimbo_home_event_feature - 15
		 * @sub_hooked chrimbo_action_front_page -  30
		 * @hooked chrimbo book-event-ticket -25
		 * @hooked chrimbo_about_home_event-17
		 */
		do_action( 'chrimbo_action_front_page' );
	}
	
}
get_footer();