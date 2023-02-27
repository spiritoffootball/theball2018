<?php
/**
 * Site Banner Template.
 *
 * @since 1.0.0
 * @package The_Ball_2018
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- assets/includes/site_banner.php -->
<div id="site_banner" class="clearfix">

	<div id="site_banner_inner">

		<?php $network_black = locate_template( 'assets/includes/network.php' ); ?>
		<?php if ( $network_black ) : ?>
			<?php load_template( $network_black ); ?>
		<?php endif; ?>

		<div id="splash">

			<a href="/2018/files/2017/03/hijab-girl-signs-ball.jpg"><img src="/2018/files/2017/03/hijab-girl-signs-ball.jpg" alt="<?php esc_attr_e( 'Girl signs The Ball', 'theball2018' ); ?>" title="<?php esc_attr_e( 'Girl signs The Ball', 'theball2018' ); ?>" width="200" height="150" class="alignnone size-medium wp-image-122" /></a>

		</div><!-- /splash -->

		<div id="banner_copy">

			<h2><?php echo sprintf( __( 'Welcome to %s', 'theball2018' ), get_bloginfo( 'title' ) ); ?></h2>

			<p><?php esc_html_e( 'The Ball 2018 kicked off from Battersea Park in London, where the first official game of football was played, and is travelling across Europe to the World Cup in Russia. The journey is showing how football can help displaced people find a new home and build new communities.', 'theball2018' ); ?></p>

			<?php if ( ! is_home() ) : ?>
				<p id="gotoblog"><a href="/2018/blog/"><?php echo sprintf( __( 'Read the blog %s', 'theball2018' ), '&rarr;' ); ?></a></p>
			<?php endif; ?>

		</div><!-- /banner_copy -->

	</div><!-- /site_banner_inner -->

</div><!-- /site_banner -->

<div id="cols" class="clearfix">
<div class="cols_inner">

	<?php $page_list = locate_template( 'assets/includes/page_list.php' ); ?>
	<?php if ( $page_list ) : ?>
		<?php load_template( $page_list ); ?>
	<?php endif; ?>
