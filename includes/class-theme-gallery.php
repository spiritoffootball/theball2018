<?php
/**
 * The Ball 2018 Gallery Shortcode Filter Class.
 *
 * @since 1.0.3
 * @package The_Ball_2018
 */

/**
 * The Ball 2018 Gallery Shortcode Filter Class.
 *
 * A class that encapsulates the functionality required to replace the assets of
 * a gallery with those from a different blog.
 *
 * @since 1.0.3
 */
class The_Ball_2018_Gallery_Filter {

	/**
	 * Target Site ID from which assets should be pulled.
	 *
	 * @since 1.0.3
	 * @access public
	 * @var bool $site_id Target Site ID from which assets should be pulled.
	 */
	public $site_id;

	/**
	 * Gallery filter flag.
	 *
	 * @since 1.0.3
	 * @access public
	 * @var bool $gallery_filter True if currently filtering a gallery, false otherwise.
	 */
	public $gallery_filter = false;

	/**
	 * Initialises this object.
	 *
	 * @since 1.0.3
	 */
	public function __construct() {

		// Add a filter for the gallery shortcode.
		add_filter( 'post_gallery', [ $this, 'gallery_shortcode' ], 1010, 2 );

		// Add a filter for the above.
		add_filter( 'comments_open', [ $this, 'media_comment_status' ], 10, 2 );

	}

	/**
	 * Switch to target site for gallery shortcode assets.
	 *
	 * @since 1.0.3
	 *
	 * @param str $output The existing shortcode output.
	 * @param array $attr The shortcode attributes.
	 * @return str $output The modified shortcode output.
	 */
	public function gallery_shortcode( $output, $attr ) {

		// Check for our custom attribute.
		if ( empty( $attr['sof_site_id'] ) ) {
			return $output;
		}
		if ( ! is_numeric( $attr['sof_site_id'] ) ) {
			return $output;
		}

		// Set site ID.
		$this->site_id = absint( $attr['sof_site_id'] );

		// Set filter flag.
		$this->gallery_filter = true;

		// Prevent recursion.
		remove_filter( 'post_gallery', [ $this, 'gallery_shortcode' ], 1010 );

		// Switch to SOF eV site and rebuild shortcode.
		switch_to_blog( $this->site_id );
		$output = do_shortcode( '[gallery type="' . $attr['type'] . '" ids="' . $attr['ids'] . '"]' );
		restore_current_blog();

		// Reset filter.
		add_filter( 'post_gallery', [ $this, 'gallery_shortcode' ], 1010, 2 );

		// Reset filter flag.
		$this->gallery_filter = false;

		// --<
		return $output;

	}

	/**
	 * Remove comments from media attachments.
	 *
	 * This is done in order to remove the comments on the JetPack Carousel Slides.
	 * The class properties prevent
	 *
	 * @since 1.0.3
	 *
	 * @param bool $open The existing comment status.
	 * @param int $post_id The numeric ID of the post.
	 * @return bool $open The modified comment status.
	 */
	public function media_comment_status( $open, $post_id ) {

		// Bail if not filtering a gallery.
		if ( $this->gallery_filter === false ) {
			return $open;
		}

		// Bail if site ID is not properly set.
		if ( ! is_numeric( $this->site_id ) ) {
			return $open;
		}

		// --<
		return false;

	}

}
