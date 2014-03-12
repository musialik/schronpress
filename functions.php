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
 * Custom template tags
 */
function the_short_excerpt( $number_of_words = 10 ) {
	global $post;
	echo implode( ' ', array_slice( explode( ' ', get_the_excerpt() ), 0, $number_of_words ) );
	echo ' [...]';
}
function total_pages() {
	global $wp_query;
	echo $wp_query->max_num_pages;
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

	register_sidebar( array(
		'name'          => __( 'Pasek Boczny', 'schronpress_textdomain' ),
		'id'            => 'sidebar-right',
		'description'   => '',
        'class'         => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="sidebar-header">',
		'after_title'   => '</h4>' 
	) );

	/*
	 * Override gallery shortcode.
	 * Ugly hack to make all gallery images link to image file, not attachment
	 * - this is to make sure that lightbox galleries don't break.
	 */
	require_once( 'includes/gallery_shortcode.php' );
}


/*
 * Alternative thumbnail tag (to keep things DRY)
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
 * Load theme scripts and stylesheets
 */
add_action( 'wp_enqueue_scripts', 'schronpress_scripts' );
function schronpress_scripts() {
	// Main stylesheet. Use wp's dashicons
    wp_enqueue_style( 'schronpress-style', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );

    // Carousel
    wp_register_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), '6.2.1', true );
    wp_enqueue_script( 'schronpress-carousel', get_template_directory_uri() . '/js/carousel.js', array( 'caroufredsel' ), '', true );
}


/*
 * Remove 10px margin from wp-caption and use html 5 tags for caption
 */
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);

function my_img_caption_shortcode_filter( $val, $attr, $content = null )
{
	extract(shortcode_atts( array (
		'id'	=> '',
		'align'	=> 'aligncenter',
		'width'	=> '',
		'caption' => ''
	), $attr ) );
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
	}

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
	. (int) $width . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
	. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
?>