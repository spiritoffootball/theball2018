<?php
/*
Template Name: Team
*/

get_header();

?>

<!-- team.php -->

<div id="content_wrapper" class="clearfix">



<?php include( get_stylesheet_directory() . '/assets/includes/site_banner.php' ); ?>



<div class="main_column clearfix">



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="main_column_inner" id="main_column_splash">

<div class="post">

<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

<?php edit_post_link( 'Edit this entry', '<p>', '</p>' ); ?>

<?php echo theball_multipager(); ?>

</div><!-- /post -->

</div><!-- /main_column_inner -->

<?php endwhile; endif; ?>



<?php

// include users that I want...
$_include_users = array( 3, 5, 8, 7, 2, 4 );

// get the users by ID
$_users = get_users();

//var_dump($_users); exit();

// did we get any?
if ( count( $_users ) > 0 ) {

	// loop through the ones we want
	foreach( $_include_users AS $_include_user ) {

		// loop
		foreach( $_users AS $_user ) {

			// exclude admin
			if ( $_user->ID == $_include_user ) {

				// add to array
				$_users_sorted[] = $_user;

			}

		}

	}

}



// did we get any?
if ( count( $_users_sorted ) > 0 ) {

	// loop
	foreach( $_users_sorted AS $_user ) {

?>
<div class="main_column_inner">

<div class="post">

<div class="entrytext">

<?php

		// get data
		$user_data = get_userdata( $_user->ID );

		// show display name
		echo  '<h3><a href="' . get_option( 'home' ) . '/blog/author/' . $_user->user_login . '/">' . $_user->display_name . '</a></h3>';

?>
<div id="author_avatar">
<?php echo get_avatar( $user_data->user_email, $size='200' ); ?>
</div>

<div id="author_desc">
<?php

		// show desc
		echo  '<p>' . nl2br( $user_data->description ) . '</p>';

		// if we're in WPMU
		if ( function_exists( 'is_super_admin' ) ) {

			// are they
			if ( is_super_admin() ) {

				// show link to profile
				echo '<p><a class="post-edit-link" href="' . get_option( 'siteurl' ) . '/wp-admin/user-edit.php?user_id=' . $_user->ID . '">Edit this profile</a></p>';

			}

		}

?>
</div>

</div><!-- /entrytext -->

</div><!-- /post -->

</div><!-- /main_column_inner -->



<?php

	} // end loop

}

?>



</div><!-- /main_column -->



<?php get_sidebar(); ?>



</div><!-- /cols -->



</div><!-- /content_wrapper -->



<?php get_footer(); ?>
