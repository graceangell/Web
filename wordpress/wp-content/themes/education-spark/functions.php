<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function education_spark_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'education-spark', get_stylesheet_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'education_spark_theme_setup', 100 );

function education_spark_styles() {
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_style( 'education-zone-style', get_template_directory_uri()  . '/style.css' );
    wp_enqueue_style( 'education-spark-style', get_stylesheet_directory_uri() . '/style.css', array( 'education-zone-style' ), $version );
    wp_enqueue_script( 'education-spark-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), $version, true );
}
add_action( 'wp_enqueue_scripts', 'education_spark_styles');

/**
 * Customize resgister settings and controls 
 */
function education_spark_customize_register( $wp_customize ){

    /** remove menu label */
    $wp_customize->remove_control( 'education_zone_top_menu_label' );

    // Modify default parent theme controls
    $wp_customize->get_setting( 'education_zone_slider_type' )->default   = 'static_banner';

    /** Address */
    $wp_customize->add_setting(
        'education_spark_address',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'education_spark_address',
        array(
            'label'   => __( 'Address', 'education-spark' ),
            'section' => 'education_zone_top_header_settings',
            'type'    => 'text',
        )
    );

    /** CTA Label */
    $wp_customize->add_setting(
        'education_spark_cta_label',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'education_spark_cta_label',
        array(
            'label'   => __( 'CTA Label', 'education-spark' ),
            'section' => 'education_zone_top_header_settings',
            'type'    => 'text',
        )
    );

    /** CTA Link */
    $wp_customize->add_setting(
        'education_spark_cta_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'education_spark_cta_link',
        array(
            'label'   => __( 'CTA Link', 'education-spark' ),
            'section' => 'education_zone_top_header_settings',
            'type'    => 'text',
        )
    );

    /** Enable/Disable Search Form */
    $wp_customize->add_setting( 
        'education_spark_ed_search_form', 
        array(
            'default'           => true,
            'sanitize_callback' => 'education_zone_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        'education_spark_ed_search_form',
        array(
            'section'     => 'education_zone_top_header_settings',
            'label'       => __( 'Enable Search Form', 'education-spark' ),
            'description' => __( 'Enable to show search form in header.', 'education-spark' ),
            'type'        => 'checkbox',
        )
    );

}
add_action( 'customize_register', 'education_spark_customize_register', 100 );

/**
 * Register custom fonts.
 */
function education_zone_fonts_url() {
    $fonts_url = '';

    /*
    * translators: If there are characters in your language that are not supported
    * by Albert Sans, translate this to 'off'. Do not translate into your own language.
    */
    $albert = _x( 'on', 'Albert Sans font: on or off', 'education-spark' );
    

    if( 'off' !== $albert ){
        $font_families[] = 'Albert Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
    }

    $query_args = array(
        'family'  => urlencode( implode( '|', $font_families ) ),
        'display' => urlencode( 'fallback' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    
    return esc_url( $fonts_url );
}

/**
 * Callback for Site Header
*/  
function education_zone_site_header(){
    $phone          = get_theme_mod( 'education_zone_phone' );
    $email          = get_theme_mod( 'education_zone_email' );
    $address        = get_theme_mod( 'education_spark_address' );
    $ed_search_form = get_theme_mod( 'education_spark_ed_search_form', true ); // From customizer
    $cta_label      = get_theme_mod( 'education_spark_cta_label' );
    $cta_links      = get_theme_mod( 'education_spark_cta_link' );
    ?>
    <header id="masthead" class="site-header header-two" role="banner" itemscope itemtype="https://schema.org/WPHeader">
        <div class="header-holder">
            <?php 
            if( has_nav_menu( 'secondary' ) ){ ?>
                <div class="header-top">
                    <div class="container">
                        <div class="top-links">
                            <nav id="secondary-navigation" class="secondary-nav" role="navigation">               
                                <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
                            </nav><!-- #site-navigation -->
                        </div>
                        <?php if( get_theme_mod('education_zone_ed_social') ) do_action('education_zone_social'); ?>
                    </div>
                </div>
            <?php 
            } ?>
            <div class="header-m">
                <div class="container">
                    <?php  
                    education_zone_site_branding(); 

                    if( $email || $phone ){
                        echo '<div class="site-info-wrap">';
                            echo '<div class="info-box-wrap">';   
                                if( $email || $phone ){ ?>
                                    <div class="info-box"> 
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <span>
                                            <?php if( $phone ){ ?><a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><?php } 
                                            if( $email ){ ?><a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo esc_html( $email ); ?></a><?php } ?>
                                        </span>
                                    </div>
                                <?php
                                } 
                                if( $address ){ ?>
                                    <div class="info-box">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span><?php echo esc_html( $address ); ?></span>
                                    </div>
                                <?php }
                            
                            echo '</div>';
                            if( $cta_label && $cta_links ){ ?>
                                <a href="<?php echo esc_url( $cta_links ); ?>" class="apply-btn"><?php echo esc_html( $cta_label ); ?></a>
                            <?php } 
                        echo '</div>';
                    } ?>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">                        
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->
                
                <?php
                if( $ed_search_form ){ ?>
                    <div class="form-section">
                        <a href="#" id="search-btn" class="search-toggle-btn" data-toggle-target=".header-search-modal" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".header-search-modal .search-field">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                        <div class="example head-search-form search header-searh-wrap header-search-modal cover-modal" data-modal-target-string=".header-search-modal">                       
                            <?php get_search_form(); ?>
                            <button class="btn-form-close" data-toggle-target=".header-search-modal" data-toggle-body-class="showing-search-modal" aria-expanded="false" data-set-focus=".header-search-modal">  </button>
                        </div>
                    </div>
                <?php 
                } ?>
            </div>
        </div>
    </header>
    <?php
}

// Site Footer
function education_zone_footer_bottom(){ ?>
    <div class="site-info">
        <?php 
        if( get_theme_mod('education_zone_ed_social') ) do_action('education_zone_social'); 

        $copyright_text = get_theme_mod( 'education_zone_footer_copyright_text' ); ?>
        <p> 
            <?php 
            if( $copyright_text ){
                echo '<span>' .wp_kses_post( $copyright_text ) . '</span>';
            }else{
                echo '<span>';
                    echo  esc_html__( 'Copyright &copy;', 'education-spark' ) . date_i18n( esc_html__( 'Y', 'education-spark' ) ); 
                echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.</span>';
            }?>
            <span class="by">
                <?php echo esc_html__( 'Education Spark | Developed By', 'education-spark' ); ?>
                <a rel="nofollow" href="<?php echo esc_url( 'https://rarathemes.com/' ); ?>" target="_blank"><?php echo esc_html__( 'Rara Themes', 'education-spark' ); ?></a>.
                <?php printf( esc_html__( 'Powered by %s.', 'education-spark' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'education-spark' ) ) .'" target="_blank">WordPress</a>' ); ?>
            </span>
            <?php 
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>
        </p>
    </div><!-- .site-info -->
    <?php
}