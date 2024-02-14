<?php
/**
 * Theme functions and definitions
 *
 * @package Building Construction Lite
 */

//enque files
if ( ! function_exists( 'building_construction_lite_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function building_construction_lite_enqueue_styles() {
		wp_enqueue_style( 'construction-firm-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'building-construction-lite-style', get_stylesheet_directory_uri() . '/style.css', array( 'construction-firm-style-parent' ), '1.0.0' );

		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'building-construction-lite-style',$construction_firm_custom_style );

		// blocks css
        wp_enqueue_style( 'building-construction-lite-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'building-construction-lite-style' ), '1.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'building_construction_lite_enqueue_styles', 99 );

// theme setup
function building_construction_lite_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'building-construction-lite-featured-image', 2000, 1200, true );
	add_image_size( 'building-construction-lite-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'building-construction-lite' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', construction_firm_fonts_url() ) );
}
add_action( 'after_setup_theme', 'building_construction_lite_setup' );

// widgets
function building_construction_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'building-construction-lite' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'building-construction-lite' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'building-construction-lite' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'building-construction-lite' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'building-construction-lite' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'building-construction-lite' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'building-construction-lite' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'building-construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'building_construction_lite_widgets_init' );

// remove sections
function building_construction_lite_customize_register() {
  	global $wp_customize;

  	$wp_customize->remove_section( 'construction_firm_pro' );

  	$wp_customize->remove_setting( 'construction_firm_footer_text' );
	$wp_customize->remove_control( 'construction_firm_footer_text' );
}
add_action( 'customize_register', 'building_construction_lite_customize_register', 11 );

// sanitization dropdown
function building_construction_lite_sanitize_dropdown_pages( $building_construction_lite_page_id, $setting ) {
	$building_construction_lite_page_id = absint( $building_construction_lite_page_id );
	return ( 'publish' == get_post_status( $building_construction_lite_page_id ) ? $building_construction_lite_page_id : $setting->default );
}

// about customizer dropdown
function building_construction_lite_about_us_dropdown(){
	if(get_option('building_construction_lite_about_us_section') == true ) {
		return true;
	}
	return false;
}

// customizer
function building_construction_lite_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	require get_theme_file_path( 'inc/custom-control.php' );

	// pro section
	$wp_customize->add_section('building_construction_lite_pro', array(
		'title'    => __('UPGRADE BUILDING PREMIUM', 'building-construction-lite'),
		'priority' => 1,
	));
	$wp_customize->add_setting('building_construction_lite_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Building_Construction_Lite_Pro_Control($wp_customize, 'building_construction_lite_pro', array(
		'label'    => __('BUILDING CONSTRUCTION PREMIUM', 'building-construction-lite'),
		'section'  => 'building_construction_lite_pro',
		'settings' => 'building_construction_lite_pro',
		'priority' => 1,
	)));

	// About Us Section
	$wp_customize->add_section( 'building_construction_lite_about_us_section' , array(
    	'title'      => __( 'About Us Settings', 'building-construction-lite' ),
		'priority'   => 5,
		'panel' => 'construction_firm_custompage_panel',
	) );
	$wp_customize->add_setting( 'building_construction_lite_about_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Building_Construction_Lite_Customizer_Customcontrol_Section_Heading( $wp_customize, 'building_construction_lite_about_heading', array(
		'label'       => esc_html__( 'About Us Settings', 'building-construction-lite' ),	
		'section'     => 'building_construction_lite_about_us_section',
		'settings'    => 'building_construction_lite_about_heading',
	) ) );
	$wp_customize->add_setting(
		'building_construction_lite_about_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'construction_firm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Building_Construction_Lite_Customizer_Customcontrol_Switch(
			$wp_customize,
			'building_construction_lite_about_show_hide',
			array(
				'settings'        => 'building_construction_lite_about_show_hide',
				'section'         => 'building_construction_lite_about_us_section',
				'label'           => __( 'Check To Show services', 'building-construction-lite' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'building-construction-lite' ),
					'off'    => __( 'Off', 'building-construction-lite' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('building_construction_lite_about_us_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('building_construction_lite_about_us_title',array(
		'label' => esc_html__('Section Title','building-construction-lite'),
		'section' => 'building_construction_lite_about_us_section',
		'setting' => 'building_construction_lite_about_us_title',
		'type'    => 'text',
		'active_callback' => 'building_construction_lite_about_us_dropdown',
	));
	$wp_customize->selective_refresh->add_partial( 'building_construction_lite_about_us_title', array(
		'selector' => '#about-us h4',
		'render_callback' => 'construction_firm_customize_partial_building_construction_lite_about_us_title',
	) );
	$wp_customize->add_setting('building_construction_lite_about_us_settigs',array(
		'sanitize_callback' => 'building_construction_lite_sanitize_dropdown_pages',
	));
	$wp_customize->add_control('building_construction_lite_about_us_settigs',array(
		'type'    => 'dropdown-pages',
		'label' => __('Select Page','building-construction-lite'),
		'section' => 'building_construction_lite_about_us_section',
		'active_callback' => 'building_construction_lite_about_us_dropdown',
	));

	$wp_customize->add_setting('building_construction_lite_footer_text',array(
			'default'	=> 'Building WordPress Theme',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('building_construction_lite_footer_text',array(
			'label'	=> esc_html__('Copyright Text','building-construction-lite'),
			'section'	=> 'construction_firm_footer_copyright',
			'type'		=> 'textarea'
	));
	$wp_customize->selective_refresh->add_partial( 'building_construction_lite_footer_text', array(
			'selector' => '.site-info a',
			'render_callback' => 'construction_firm_customize_partial_building_construction_lite_footer_text',
	) );
}
add_action( 'customize_register', 'building_construction_lite_customize' );

// comments
function building_construction_lite_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'building_construction_lite_enqueue_comments_reply' );

// Footer Text
function building_construction_lite_copyright_link() {
    $footer_text = get_theme_mod('building_construction_lite_footer_text', esc_html__('Building WordPress Theme', 'building-construction-lite'));
    $credit_link = esc_url('https://www.ovationthemes.com/wordpress/free-building-wordpress-theme/');

    echo '<a href="' . $credit_link . '" target="_blank">' . esc_html($footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'building-construction-lite') . '</span></a>';
}

define('BUILDING_CONSTRUCTION_LITE_PRO_LINK',__('https://www.ovationthemes.com/wordpress/building-construction-wordpress-theme/','building-construction-lite'));

if ( ! defined( 'CONSTRUCTION_FIRM_SUPPORT' ) ) {
define('CONSTRUCTION_FIRM_SUPPORT',__('https://wordpress.org/support/theme/building-construction-lite','building-construction-lite'));
}
if ( ! defined( 'CONSTRUCTION_FIRM_REVIEW' ) ) {
define('CONSTRUCTION_FIRM_REVIEW',__('https://wordpress.org/support/theme/building-construction-lite/reviews/#new-post','building-construction-lite'));
}
if ( ! defined( 'CONSTRUCTION_FIRM_LIVE_DEMO' ) ) {
define('CONSTRUCTION_FIRM_LIVE_DEMO',__('https://www.ovationthemes.com/demos/building-construction/','building-construction-lite'));
}
if ( ! defined( 'CONSTRUCTION_FIRM_BUY_PRO' ) ) {
define('CONSTRUCTION_FIRM_BUY_PRO',__('https://www.ovationthemes.com/wordpress/building-construction-wordpress-theme/','building-construction-lite'));
}
if ( ! defined( 'CONSTRUCTION_FIRM_PRO_DOC' ) ) {
define('CONSTRUCTION_FIRM_PRO_DOC',__('https://ovationthemes.com/docs/ot-building-construction-pro-doc/','building-construction-lite'));
}
if ( ! defined( 'CONSTRUCTION_FIRM_FREE_DOC' ) ) {
define('CONSTRUCTION_FIRM_FREE_DOC',__('https://ovationthemes.com/docs/ot-building-construction-lite-free-doc','building-construction-lite'));
}
if ( ! defined( 'CONSTRUCTION_FIRM_THEME_NAME' ) ) {
define('CONSTRUCTION_FIRM_THEME_NAME',__('Premium Building Construction Theme','building-construction-lite'));
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Building_Construction_Lite_Pro_Control')):
    class Building_Construction_Lite_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( BUILDING_CONSTRUCTION_LITE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BUILDING PREMIUM','building-construction-lite');?> </a>
            </div>
            <div class="col-md">
                <img class="building_construction_lite_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('BUILDING PREMIUM - Features', 'building-construction-lite'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'building-construction-lite');?> </li>
                    <li class="upsell-building_construction_lite"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'building-construction-lite');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( BUILDING_CONSTRUCTION_LITE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BUILDING PREMIUM','building-construction-lite');?> </a>
            </div>
        </label>
    <?php } }
endif;
