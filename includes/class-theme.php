<?php
/**
 * The Ball 2018 Child Theme Class.
 *
 * @since 1.0.0
 * @package The_Ball_2018
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * The Ball 2018 Theme Class.
 *
 * A class that encapsulates this theme's functionality.
 *
 * @since 1.0.5
 */
class SOF_The_Ball_2018_Theme {

	/**
	 * Gallery Filter object.
	 *
	 * @since 1.0.5
	 * @access public
	 * @var object $gallery_filter The Gallery Filter object.
	 */
	public $gallery_filter;

	/**
	 * Constructor.
	 *
	 * @since 1.0.5
	 */
	public function __construct() {

		// Listen for parent theme class to be loaded.
		add_action( 'sof/theme/the_ball/loaded', [ $this, 'initialise' ] );

	}

	/**
	 * Initialises this object.
	 *
	 * @since 1.0.0
	 */
	public function initialise() {

		// Bootstrap class.
		$this->include_files();
		$this->setup_objects();
		$this->register_hooks();

		/**
		 * Broadcast that this instance is loaded.
		 *
		 * @since 1.0.5
		 */
		do_action( 'sof/theme/the_ball_2018/loaded' );

	}

	/**
	 * Include files.
	 *
	 * @since 1.0.5
	 */
	public function include_files() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && true === $done ) {
			return;
		}

		// Include global scope Theme Functions.
		//include get_template_directory() . '/includes/functions-theme.php';

		// Include class files.
		include get_stylesheet_directory() . '/includes/class-theme-gallery.php';

		// We're done.
		$done = true;

	}

	/**
	 * Set up this plugin's objects.
	 *
	 * @since 1.0.5
	 */
	public function setup_objects() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && true === $done ) {
			return;
		}

		// Initialse objects.
		$this->gallery_filter = new The_Ball_2018_Gallery_Filter();

		// We're done.
		$done = true;

	}

	/**
	 * Register hook callbacks.
	 *
	 * @since 1.0.5
	 */
	public function register_hooks() {

		// Set up this theme's defaults.
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );

		// Add CSS and JS with high priority so they are late in the queue.
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ], 1005 );

		// Filter the image of The Ball.
		add_filter( 'theball_image', [ $this, 'theball_image_filter' ] );

		// Filter the Supporters file.
		add_filter( 'theball_supporters', [ $this, 'supporters_file_filter' ] );

		// Filter the Team Members array.
		//add_filter( 'theball_team_members', [ $this, 'team_members_filter' ] );

	}

	/**
	 * Augment the Base Theme's setup function.
	 *
	 * @since 1.0.0
	 */
	public function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be added to the /languages/ directory of the child theme.
		 */
		load_child_theme_textdomain(
			'theball2018',
			get_stylesheet_directory() . '/languages'
		);

	}

	/**
	 * Add child theme's CSS file(s).
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		// Enqueue file.
		wp_enqueue_style(
			'theball2018_css',
			get_stylesheet_directory_uri() . '/assets/css/style-overrides.css',
			[ 'theball_screen_css' ],
			THEBALL2018_VERSION, // Version.
			'all' // Media.
		);

	}

	/**
	 * Override image of The Ball.
	 *
	 * @since 1.0.0
	 *
	 * @param str $default The existing markup for the image file.
	 * @return str $default The modified markup for the image file.
	 */
	public function theball_image_filter( $default ) {

		// Ignore default and set our own.
		return '<a href="' . get_home_url( null, '/' ) . '" title="' . __( 'Home', 'theball2018' ) . '" class="ball_image">' .
				'<img src="' . get_stylesheet_directory_uri() . '/assets/images/interface/the_ball_2018_200_sq.png" ' .
					'alt="' . esc_attr( __( 'The Ball 2018', 'theball2018' ) ) . '" ' .
					'title="' . esc_attr( __( 'The Ball 2018', 'theball2018' ) ) . '" ' .
					'style="width: 100px; height: 100px;" ' .
					'id="the_ball_header" />' .
				'</a>';

	}

	/**
	 * Override supporters footer template file.
	 *
	 * @since 1.0.0
	 *
	 * @param str $default The default path to the template file.
	 * @return str $default The modified path to the template file.
	 */
	public function supporters_file_filter( $default ) {

		// Override with 2018 file.
		return get_stylesheet_directory() . '/assets/includes/supporters_2018.php';

	}

	/**
	 * Override users in "Team" template file.
	 *
	 * @since 1.0.5
	 *
	 * @param array $default The default set of users.
	 * @return array $users The modified set of users.
	 */
	public function team_members_filter( $default ) {

		// 2018 users.
		return [ 3, 5, 8, 7, 2, 4 ];

	}

}
