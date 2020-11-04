<?php
/**
 * Plugin Name: Definitive Addons for Elementor
 * Description: Advanced Widgets for Elementor Page Builder.
 * Plugin URI:  https://softfirm.net/
 * Version:     1.3.7
 * Author:      Softfirm
 * Author URI:  https://softfirm.net/definitive-addons/
 * Text Domain: definitive-addons-for-elementor
 * contributor:khuda
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Elementor Test Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Definitive_Addons_Elementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.3.7';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Definitive_Addons_Elementor The single instance of the class.
	 */
	private static $_instance = null;
	
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Definitive_Addons_Elementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		
		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		
		add_action( 'init', [ $this, 'i18n' ] );
		
		add_action( 'plugins_loaded', [ $this, 'init' ] );
		
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_category' ] );
	
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_front_scripts_styles' ) );

	}
	
	

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'definitive-addons-for-elementor' );

	}
	
	function constants() {

		define( 'DAFE_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'DAFE_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		
	}
	
	
	
	 public function enqueue_front_scripts_styles()
     {
         
		wp_enqueue_style( 'slick-plug',  DAFE_URI . '/css/slick.css' );
		
		wp_enqueue_style( 'animate-css',  DAFE_URI . '/css/animate.css' );

		
		wp_enqueue_style( 'slick-themes',  DAFE_URI . '/css/slick-theme.css' );
		
		wp_enqueue_style( 'dafe-plug',  DAFE_URI . '/css/dafe_style.css' );
		wp_enqueue_script( 'countTo', DAFE_URI . '/js/jquery.countTo.js', array('jquery'),'', true );
		
		
        wp_enqueue_script( 'slick-plug-min',  DAFE_URI . '/js/slick.js', array('jquery'),'', true );
        wp_enqueue_script( 'custom-plug-min',  DAFE_URI . '/js/custom.js', array('jquery'),'', true );
		
	}
	 
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'definitive-addons-for-elementor' ),
			'<strong>' . esc_html__( 'Definitive Addon for Elementor', 'definitive-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'definitive-addons-for-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'definitive-addons-for-elementor' ),
			'<strong>' . esc_html__( 'Definitive Addon for Elementor', 'definitive-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'definitive-addons-for-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'definitive-addons-for-elementor' ),
			'<strong>' . esc_html__( 'Definitive Addon for Elementor', 'definitive-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'definitive-addons-for-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	
	public function register_widget_category( $elements_manager ) {

		$elements_manager->add_category(
		'definitive-addons',
		[
			'title' => __( 'Definitive Addons', 'definitive-addons-for-elementor' ),
			'icon' => 'fa fa-plug',
		]
		);

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		
		
		require_once( __DIR__ . '/inc/Elements/Testimonial.php' );
		require_once( __DIR__ . '/inc/Elements/Testimonial_Slider.php' );
		require_once( __DIR__ . '/inc/Elements/Subscription.php' );
		require_once( __DIR__ . '/inc/Elements/Promo-box.php' );
		require_once( __DIR__ . '/inc/Elements/Staff_Member.php' );
		require_once( __DIR__ . '/inc/Elements/Teaser_Box.php' );
		require_once( __DIR__ . '/inc/Elements/Icon_Box.php' );
		require_once( __DIR__ . '/inc/Elements/Icon_List.php' );
		
		require_once( __DIR__ . '/inc/Elements/Image_Overlay.php' );
		require_once( __DIR__ . '/inc/Elements/Counter.php' );
		require_once( __DIR__ . '/inc/Elements/Feature_list.php' );
		require_once( __DIR__ . '/inc/Elements/heading-with-separator.php' );
		require_once( __DIR__ . '/inc/Elements/Slider.php' );
		require_once( __DIR__ . '/inc/Elements/CTA.php' );
		require_once( __DIR__ . '/inc/Elements/Post_Grid.php' );
		require_once( __DIR__ . '/inc/Elements/Post_Carousel.php' );
		require_once( __DIR__ . '/inc/Elements/Category_List.php' );
		require_once( __DIR__ . '/inc/Elements/Skillbar.php' );
		require_once( __DIR__ . '/inc/Elements/Flip_Box.php' );
		require_once( __DIR__ . '/inc/Elements/Type.php' );
		require_once( __DIR__ . '/inc/Elements/Wording.php' );
		require_once( __DIR__ . '/inc/Elements/Creative_Button.php' );
		require_once( __DIR__ . '/inc/Elements/Pricing_Table.php' );
		require_once( __DIR__ . '/inc/Elements/WpForm.php' );
		require_once( __DIR__ . '/inc/Elements/Ninja_Forms.php' );
		
		
		
		if(class_exists('woocommerce')){
		require_once( __DIR__ . '/inc/Elements/Category_Box.php' );
		require_once( __DIR__ . '/inc/Elements/Products.php' );
		
		}
		require_once( __DIR__ . '/inc/Elements/Contact_form_7.php' );
		require_once( __DIR__ . '/inc/Elements/Popular_Post.php' );
		
		require_once( __DIR__ . '/inc/Reuses/Reuse.php' );
		
		
		
		
		// Register widget
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Popular_Post() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Skillbar() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Creative_Button() );
	
	
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Contact_Form7() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Flip_Box() );	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Testimonial() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Testimonial_Slider() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\CTA() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Pricing_Table() );
		

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Subscription() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Promo_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Image_Overlay() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Staff_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Icon_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Icon_List() );
		
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Feature_list() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Teaser_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Heading_With_Separator() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Post_Grid() );

	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Post_Carousel() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Category_List() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Type() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Wording() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Wp_Form() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Ninja_Forms() );
	
	
	if(class_exists('woocommerce')){
	
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Product_Category_Box() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Definitive_Addons_Elementor\Elements\Product_Slider() );
	
	}
	
	}

	

}

Definitive_Addons_Elementor::instance();
