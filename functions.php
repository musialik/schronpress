<?php

/*
 * Add classes to page navigation
 */

add_filter('next_posts_link_attributes', 'next_posts_link_attributes');
function next_posts_link_attributes() {
	return 'class="btn-next"';
}

add_filter('previous_posts_link_attributes', 'previous_posts_link_attributes');
function previous_posts_link_attributes() {
	return 'class="btn-previous"';
}


/*
 * Short excerpt tag
 */
function the_short_excerpt( $number_of_words = 10 ) {
	global $post;
	echo implode( ' ', array_slice( explode( ' ', get_the_excerpt() ), 0, $number_of_words ) );
	echo ' [...]';
}



/*
 * Setup theme
 */
add_action( 'after_setup_theme', 'schronpress_setup' );
function schronpress_setup() {

	/* Thumbnails */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'img-small', 220, 145, true );
	add_image_size( 'img-medium', 300, 200, true );
	add_image_size( 'img-single', 700, 410, true );

	/* Menus */
	register_nav_menu( 'navbar', 'Menu górne' );

}


/*
 * Alternative thumbnail tag (DRY)
 */
function the_thumbnail_or_placeholder( $size = 'thumbnail', $class = '' ) {
	global $post;
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( $size, array( 'class' => $class ) );
	} else {
		echo "<div class=\"$class placeholder\"></div>";
	}
}


/*
 * Setup carousel
 */
add_action( 'wp_enqueue_scripts', 'carousel_load_scripts' );
function carousel_load_scripts() {
    wp_register_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), '6.2.1', true );
 
    wp_enqueue_script( 'schronpress-carousel', get_template_directory_uri() . '/js/carousel.js', array( 'caroufredsel' ), '', true );
}
?>