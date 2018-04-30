<?php /*
================================================================================
Site Banner Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

?><!-- assets/includes/site_banner.php -->

<div id="site_banner" class="clearfix">

	<div id="site_banner_inner">

	<?php include( get_template_directory() . '/assets/includes/network.php' ); ?>

	<div id="splash">

		<a href="/2018/files/2017/03/hijab-girl-signs-ball.jpg"><img src="/2018/files/2017/03/hijab-girl-signs-ball.jpg" alt="Girl signs The Ball" title="Girl signs The Ball" width="200" height="150" class="alignnone size-medium wp-image-122" /></a>

	</div><!-- /splash -->



	<div id="banner_copy">

		<h2>Welcome to <?php bloginfo( 'title' ); if ( is_home() ) { echo ' blog'; } ?></h2>

		<p>The Ball 2018 kicked off from Battersea Park in London, where the first official game of football was played, and is travelling across Europe to the World Cup in Russia. The journey is showing how football can help displaced people find a new home and build new communities.</p>

		<?php if ( ! is_home() ) { ?>
			<p id="gotoblog"><a href="/2018/blog/">Read the blog &rarr;</a></p>
		<?php } ?>

	</div><!-- /banner_copy -->

	</div><!-- /site_banner_inner -->

</div><!-- /site_banner -->



<div id="cols" class="clearfix">
<div class="cols_inner">

	<?php include( get_template_directory() . '/assets/includes/page_list.php' ); ?>



