<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Chrimbo
 */

get_header(); ?>
<div class="wrapper page-inner-title">
	<div class="thumb-overlay">
		<div class="container">
		    <div class="row">
		        <div class="col-md-12 col-sm-12 col-xs-12">
					<header class="entry-header">
						<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'chrimbo' ); ?></h1>
					</header><!-- .entry-header -->
		        </div>
		    </div>
		</div>
	</div>
</div>
<?php 
/**
 * chrimbo_action_after_header hook
 * @since chrimbo 1.0.0
 *
 * @hooked null
 */
do_action( 'chrimbo_action_after_header' );
?>	
<section class="wrapper wrap-content">
	<div class= "site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
				   <div class="col-md-8 col-sm-8 col-xs-12">
					   	<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'chrimbo' ); ?></p>
							<?php
							get_search_form();
							?>
						</div>
				   </div>
					<div class="page-content col-md-4 col-sm-4 col-xs-12">				

						<?php

							the_widget( 'WP_Widget_Recent_Posts' );

							// Only show the widget if site has multiple categories.
							if ( chrimbo_categorized_blog() ) :
						?>

						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'chrimbo' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->

						<?php
							endif;

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'chrimbo' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
						?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</section>

<?php
get_footer();
