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
 * Set custom excerpt length
 */

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
	return 8;
}


/*
 * Setup theme
 */
add_action( 'after_setup_theme', 'schronpress_setup' );
function schronpress_setup() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'img-small', 220, 145, true );
	add_image_size( 'img-medium', 300, 200, true );
	add_image_size( 'img-single', 700, 410, true );
}


?>