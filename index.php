<?php get_header(); ?>

<!-- index.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory().'/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<?php if (have_posts()) : ?>

	<?php

	// Search Nav
	$pl = get_next_posts_link('&laquo; Older Posts');
	$nl = get_previous_posts_link('Newer Posts &raquo;');

	?>

	<?php if ( $nl != '' OR $pl != '' ) { ?>

	<ul class="blog_navigation clearfix">
		<?php if ( $nl != '' ) { ?><li class="alignright"><?php echo $nl; ?></li><?php } ?>
		<?php if ( $pl != '' ) { ?><li class="alignleft"><?php echo $pl; ?></li><?php } ?>
	</ul>

	<?php } ?>



	<div class="main_column_inner">

	<?php while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<?php

			// init
			$has_feature_image = false;
			$feature_image_class = '';

			// do we have a feature image?
			if ( has_post_thumbnail() ) {
				$has_feature_image = true;
				$feature_image_class = ' has_feature_image';
			}

			?>

			<div class="post_header<?php echo $feature_image_class; ?>">

				<div class="post_header_inner">

					<?php

					// show feature image when we have one
					if ( $has_feature_image ) {
						echo get_the_post_thumbnail( get_the_ID(), 'medium-640' );
					}

					?>

					<div class="post_header_text">

						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

					</div><!-- /post_header_text -->

				</div><!-- /post_header_inner -->

			</div><!-- /post_header -->

			<div class="entry clearfix">
				<?php the_excerpt(); ?>
			</div>

			<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

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

	<div class="main_column_inner">

	<div class="post">

	<h2>Page not found</h2>

	<p>Sorry, but you are looking for something that isn't here. Try a search?</p>

	<?php include ( get_template_directory() . '/searchform.php' ); ?>

	</div><!-- /post -->

	</div><!-- /main_column_inner -->

<?php endif; ?>



</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>
