<!-- page_list.php -->

<div class="sof_page_list">

<ul id="pages_ul">
<?php

// do we have a custom menu?
if ( has_nav_menu( 'theball_menu' ) ) {

	// try and use it
	wp_nav_menu( array(
		'theme_location' => 'theball_menu',
		'echo' => true,
		'container' => '',
		'items_wrap' => '%3$s',
	) );

} else {

	// our fallback is to show page list
	wp_list_pages( 'title_li=&depth=1' );

}

?>
</ul>

</div>



