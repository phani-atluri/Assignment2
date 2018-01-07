<?php
if ( ! function_exists( 'chrimbo_home_event_feature' ) ) :
    /**
    * Featured Slider
    *
    * @since Chrimbo 1.0.0
    *
    * @param null
    * @return null
    *
    */
    function chrimbo_home_event_feature()
    { 
    	global $chrimbo_customizer_all_values;
         $chrimbo_home_event_event_title = esc_html( $chrimbo_customizer_all_values['chrimbo-event-featured-event-title'] );
         $chrimbo_home_event_event_content = esc_html ($chrimbo_customizer_all_values['chrimbo-event-featured-event-content'] );
         $chrimbo_home_event_event_icon = esc_attr( $chrimbo_customizer_all_values['chrimbo-event-featured-event-icon'] );

         $chrimbo_home_event_location_title = esc_html( $chrimbo_customizer_all_values['chrimbo-event-featured-location-title'] );
         $chrimbo_home_event_location_content = esc_html( $chrimbo_customizer_all_values['chrimbo-event-featured-location-content'] );
         $chrimbo_home_event_location_icon = $chrimbo_customizer_all_values['chrimbo-event-featured-location-icon'];

          $chrimbo_home_event_time_title = esc_html( $chrimbo_customizer_all_values['chrimbo-event-featured-time-title'] );
         $chrimbo_home_event_time_content = esc_html( $chrimbo_customizer_all_values['chrimbo-event-featured-time-content'] );
         $chrimbo_home_event_time_icon = esc_attr( $chrimbo_customizer_all_values['chrimbo-event-featured-time-icon'] );

        if( 1 != $chrimbo_customizer_all_values['chrimbo-feature-event-section-enable'] )
        {
    		return null;
		}
        ?>    
            <section class="wrapper event-section clearfix">
                <div class="event-wrapper">
                    <div class="left-div what-section">
                       <i class="fa <?php echo esc_html( $chrimbo_home_event_event_icon ); ?>"></i>
                        <h2><?php echo esc_html( $chrimbo_home_event_event_title ); ?></h2>
                        <p><?php echo esc_html( $chrimbo_home_event_event_content ); ?></p>
                    </div>
                    <div class="left-div where-section">
                        <i class="fa <?php echo esc_html( $chrimbo_home_event_location_icon ); ?>"></i>
                        <h2><?php echo esc_html( $chrimbo_home_event_location_title ); ?></h2>
                        <p><?php echo esc_html( $chrimbo_home_event_location_content ); ?></p>                        
                    </div>
                    <div class="left-div when-section">
                        <i class="fa <?php echo esc_html( $chrimbo_home_event_time_icon ); ?>"></i>
                        <h2><?php echo esc_html( $chrimbo_home_event_time_title ); ?></h2>
                        <p><?php echo esc_html( $chrimbo_home_event_time_content ); ?></p>
                    </div>
                </div>
            </section> 
        <?php    
        }
    

endif; 
add_action( 'chrimbo_action_front_page', 'chrimbo_home_event_feature', 15 );   