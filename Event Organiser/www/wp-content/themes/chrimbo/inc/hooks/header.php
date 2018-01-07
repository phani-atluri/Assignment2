<?php
if ( ! function_exists( 'chrimbo_set_global' ) ) :
    /**
     * Setting global values for all saved customizer values
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_set_global() {
        /*Getting saved values start*/
        $GLOBALS['chrimbo_customizer_all_values'] = chrimbo_get_all_options(1);
    }
    endif;
add_action( 'chrimbo_action_before_head', 'chrimbo_set_global', 0 );

if ( ! function_exists( 'chrimbo_doctype' ) ) :
    /**
     * Doctype Declaration
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'chrimbo_action_before_head', 'chrimbo_doctype', 10 );

if ( ! function_exists( 'chrimbo_before_wp_head' ) ) :
    /**
     * Before wp head codes
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;
add_action( 'chrimbo_action_before_wp_head', 'chrimbo_before_wp_head', 10 );

if( ! function_exists( 'chrimbo_default_layout' ) ) :
    /**
     * chrimbo default layout function
     *
     * @since  chrimbo 1.0.0
     *
     * @param int
     * @return string
     */
    function chrimbo_default_layout(){
        global $chrimbo_customizer_all_values,$post;
        $chrimbo_default_layout = $chrimbo_customizer_all_values['chrimbo-default-layout'];
        return $chrimbo_default_layout;
    }
endif;

    if ( ! function_exists( 'chrimbo_body_class' ) ) :
    /**
     * add body class
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_body_class( $chrimbo_body_classes ) {
        if(!is_front_page()){
            $chrimbo_default_layout = chrimbo_default_layout();
            if( !empty( $chrimbo_default_layout ) ){
                if( 'left-sidebar' == $chrimbo_default_layout ){
                    $chrimbo_body_classes[] = 'evision-left-sidebar';
                }
                elseif( 'right-sidebar' == $chrimbo_default_layout ){
                    $chrimbo_body_classes[] = 'evision-right-sidebar';
                }
                elseif( 'no-sidebar' == $chrimbo_default_layout ){
                    $chrimbo_body_classes[] = 'evision-no-sidebar';
                }
                else{
                    $chrimbo_body_classes[] = 'evision-right-sidebar';
                }
            }
            else{
                $chrimbo_body_classes[] = 'chrimbo-right-sidebar';
            }
        }
        return $chrimbo_body_classes;

    }
endif;
add_action( 'body_class', 'chrimbo_body_class', 10, 1);

/*chrimbo_action_after_body*/

if ( ! function_exists( 'chrimbo_page_start' ) ) :
    /**
     * page start
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_page_start() {
    ?>
        <div id="page" class="hfeed site">
    <?php
    }
endif;
add_action( 'chrimbo_action_before', 'chrimbo_page_start', 15 );

/*chrimbo_action_after_body*/

if ( ! function_exists( 'chrimbo_social_menu' ) ) :
    /**
     * page start
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_social_menu() {
        global $chrimbo_customizer_all_values;
    ?>

            <div class="social-widget evision-social-section social-icon-only">
                <?php
                    wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span>',
                        'link_after'=>'</span>' , 'menu_id' => 'primary-menu','fallback_cb' => false, ) );
                ?>
            </div>
       
    

    <?php }
endif;
add_action( 'chrimbo_action_after_page_id', 'chrimbo_social_menu', 15 );


// loader


?>
<?php
if ( ! function_exists( 'chrimbo_pre_loader' ) ) :
    /**
     * Pre Loader to content
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_pre_loader() {
        global $chrimbo_customizer_all_values;

        if ( 1 == $chrimbo_customizer_all_values['chrimbo-enable-pre-loader']) { ?>
            <section id="wraploader" class="wraploader">
            <div id="loader" class="loader-outer">
              <svg id="wrapcircle" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="71.333px" height="12.667px" viewBox="0 0 71.333 12.667" enable-background="new 0 0 71.333 12.667" xml:space="preserve">
              <circle fill="#FFFFFF" cx="5" cy="6.727" r="5" id="firstcircle"></circle>
              <circle fill="#FFFFFF" cx="20" cy="6.487" r="5" id="secondcircle"></circle>
              <circle fill="#FFFFFF" cx="35" cy="6.487" r="5" id="thirthcircle"></circle>
              <circle fill="#FFFFFF" cx="50" cy="6.487" r="5" id="forthcircle"></circle>
              <circle fill="#FFFFFF" cx="65" cy="6.487" r="5" id="fifthcircle"></circle>
              </svg>
            </div>
            </section>
        <?php }
    }
endif;
add_action( 'chrimbo_action_pre_loader_header', 'chrimbo_pre_loader', 10 );

if ( ! function_exists( 'chrimbo_skip_to_content' ) ) :
    /**
     * Skip to content
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'chrimbo' ); ?></a>
    <?php
    }
endif;
add_action( 'chrimbo_action_before_header', 'chrimbo_skip_to_content', 10 );

if ( ! function_exists( 'chrimbo_header' ) ) :
    /**
     * Main header
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_header() {
        global $chrimbo_customizer_all_values;
        global $wp_version;
        ?>
            <div class="wrapper header-wrapper">
                <header id="masthead" class="site-header" role="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="site-branding">
                                    <?php if (version_compare($wp_version, '4.5', '<')) {
                                        if ( isset($chrimbo_customizer_all_values['chrimbo-logo']) && !empty($chrimbo_customizer_all_values['chrimbo-logo'])) :
                                            echo '<div class="site-title">';?>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <img class="header-logo" src="<?php echo esc_url($chrimbo_customizer_all_values['chrimbo-logo']); ?>" alt="<?php bloginfo( 'name' );?>">
                                            </a>
                                            <?php echo '</div>';?>
                                        <?php else :
                                            echo '<div class="site-title">';?>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <?php if ( 1 == $chrimbo_customizer_all_values['chrimbo-enable-title'] ) :
                                                    bloginfo( 'name' );
                                                endif;?>
                                            </a>
                                            <?php if ( 1 == $chrimbo_customizer_all_values['chrimbo-enable-tagline'] ) :
                                                echo '<p class="site-description">'. esc_html (get_bloginfo('description' )).'</p>';
                                            endif; ?>
                                            <?php echo '</div>';
                                        endif;
                                    } else {
                                        chrimbo_the_custom_logo();
                                        if ( is_front_page() && is_home() ) : ?>
                                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                        <?php else : ?>
                                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                        <?php endif;
                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                            <h2 class="site-description"><?php echo esc_html($description ); ?></h2>
                                        <?php endif;
                                    }?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <div class="row">
                                    <div class="nav-holder">
                                        <div class="col-xs-12 mb-device go-left">
                                            <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="fa fa-bars"></span><?php __('MENU','chrimbo') ?></button>
                                            <div id="site-header-menu" class="site-header-menu">
                                                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'chrimbo' ); ?>">
                                                    <?php
                                                        wp_nav_menu( array(
                                                            'theme_location' => 'primary',
                                                            'menu_id'        => 'primary-menu',
                                                            'menu_class'     => 'primary-menu',
                                                        ) );
                                                    ?>
                                                </nav><!-- #site-navigation -->
                                            </div><!-- site-header-menu -->
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>                
            </div>
    <?php
    }
endif;
add_action( 'chrimbo_action_header', 'chrimbo_header', 10 );

if( ! function_exists( 'chrimbo_add_breadcrumb' ) ) :
    /**
     * Breadcrumb
     *
     * @since chrimbo 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function chrimbo_add_breadcrumb(){
        global $chrimbo_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $chrimbo_customizer_all_values['chrimbo-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb"><div class="container"><div class="breadcrumb-inner">';
         chrimbo_simple_breadcrumb();
        echo '</div></div><!-- .container-fluid --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'chrimbo_action_after_header', 'chrimbo_add_breadcrumb', 20 );