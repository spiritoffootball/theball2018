<?php /*
================================================================================
The Ball 2018 Archive Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

This overrides the parent theme template because we only want excerpts.

--------------------------------------------------------------------------------
*/

get_header(); ?>

<!-- archive.php -->

<div id="content_wrapper" class="clearfix">

<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>

<div class="main_column clearfix">

	<?php if ( have_posts() ) : ?>

		<?php

		// Search Nav.
		$pl = get_next_posts_link( __( '&laquo; Older Posts', 'theball' ) );
		$nl = get_previous_posts_link( __( 'Newer Posts &raquo;', 'theball' ) );

		?>

		<?php if ( $nl != '' OR $pl != '' ) { ?>

		<ul class="blog_navigation clearfix">
			<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
			<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
		</ul>

		<?php } ?>



		<div class="main_column_inner">

			<div class="post">
			<div class="post_header archive_header">

				<?php the_archive_title( '<h2 class="pagetitle">', '</h2>' ); ?>

			</div>
			</div>

		</div><!-- /main_column_inner -->



		<div class="main_column_inner">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="post">

					<?php

					// Init.
					$has_feature_image = false;
					$feature_image_class = '';

					// Do we have a feature image?
					if ( has_post_thumbnail() ) {
						$has_feature_image = true;
						$feature_image_class = ' has_feature_image';
					}

					?>

					<div class="post_header<?php echo $feature_image_class; ?>">

						<div class="post_header_inner">

							<?php

							// Show feature image when we have one.
							if ( $has_feature_image ) {
								echo get_the_post_thumbnail( get_the_ID(), 'medium-640' );
							}

							?>

							<div class="post_header_text">

								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( [ 'before' => __( 'Permanent Link to: ', 'theball' ), 'after'  => '' ] ); ?>"><?php the_title(); ?></a></h2>

							</div><!-- /post_header_text -->

						</div><!-- /post_header_inner -->

					</div><!-- /post_header -->

					<div class="entry clearfix">
						<?php the_excerpt(); ?>
					</div>

					<p class="postmetadata"><?php the_tags( __( 'Tags: ', 'theball' ), ', ', '<br />' ); ?> <?php _e( 'Posted in ', 'theball' ) . the_category( ', ' ) ?> | <?php comments_popup_link( __( 'No Comments &#187;', 'theball' ), __( '1 Comment &#187;', 'theball' ), __( '% Comments &#187;', 'theball' ) ); ?></p>

				</div>

			<?php endwhile; ?>

		</div><!-- /main_column_inner -->



		<?php if ( $nl != '' OR $pl != '' ) { ?>

		<ul class="blog_navigation clearfix">
			<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
			<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
		</ul>

		<?php } ?>



	<?php else : ?>



		<div class="main_column_inner" id="main_column_splash">

			<div class="post">
			<div class="post_header archive_header">
				<h2 class="pagetitle"><?php _e( 'Nothing found', 'theball' ); ?></h2>
			</div>
			</div>

		</div><!-- /main_column_inner -->



		<div class="main_column_inner">

			<div class="post">

			<div class="entrytext clearfix">

				<p><?php _e( 'Try searching for something?', 'theball' ); ?></p>

				<?php include( get_template_directory() . '/searchform.php' ); ?>

			</div><!-- /entrytext -->

			</div><!-- /post -->

		</div><!-- /main_column_inner -->



	<?php endif; ?>



</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
