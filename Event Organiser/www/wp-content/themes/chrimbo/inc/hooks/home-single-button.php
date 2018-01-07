<?php
if ( ! function_exists( 'chrimbo_book_event_ticket' ) ) :
    /**
    * Activity array creation
    *
    * @since Chrimbo 1.0.0
    *
    * @param string $from_activity
    * @return array
    */
    function chrimbo_book_event_ticket()
    {
    	global $chrimbo_customizer_all_values;
    	$chrimbo_home_featured_button_text = esc_html( $chrimbo_customizer_all_values['chrimbo-fs-single-button-text'] );
    	$chrimbo_home_featured_button_url = esc_url($chrimbo_customizer_all_values['chrimbo-fs-single-button-url'] );

    	if( 1 != $chrimbo_customizer_all_values['chrimbo-feature-single-buttton-enable'] )
    	{
            return null;
        }
        ?>
        <section class="wrapper book-now clearfix">
          <div class="book-now-btn">
              <div class="btn-holder">
                  <a href="<?php echo esc_url( $chrimbo_home_featured_button_url ); ?>" class="button"> <?php echo esc_html( $chrimbo_home_featured_button_text ); ?></a>
              </div>
          </div>
        </section>        
            <?php
    }
endif;    
add_action( 'chrimbo_action_front_page', 'chrimbo_book_event_ticket', 17 );