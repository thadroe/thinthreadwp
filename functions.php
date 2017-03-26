<?php

/**
 * Theme setup and support
 */
add_action( 'after_setup_theme', 'thinthreadwp_theme_setup' );
function thinthreadwp_theme_setup() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	load_theme_textdomain( 'thinthreadwp', get_template_directory() . '/languages' );

}

/**
 * Load theme styles
 */
add_action( 'wp_enqueue_scripts', 'thinthreadwp_theme_styles' );
function thinthreadwp_theme_styles() {

	// Fonts - comment out or change
	wp_enqueue_style( 'googlefonts_css', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,700italic' );

	// Main styles - Toggle the commenting on these to switch between normal and minified
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/assets/css/main.css' );
	//wp_enqueue_style( 'mainmin_css', get_template_directory_uri() . '/assets/css/main.min.css' );

}

/**
 * Load theme scripts
 */
add_action( 'wp_enqueue_scripts', 'thinthreadwp_theme_js' );
function thinthreadwp_theme_js() {

	// Main scripts - Toggle the commenting on these to switch between normal and minified
	//wp_enqueue_script( 'app_js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '', true );
	wp_enqueue_script( 'appmin_js', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), '', true );

}

/**
 * Content width
 */
add_action( 'after_setup_theme', 'thinthreadwp_content_width', 0 );
function thinthreadwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thinthreadwp_content_width', 760 );
}

/**
 * Set how long excerpts should be
 */
add_filter( 'excerpt_length', 'thinthreadwp_excerpt_length', 999 );
function thinthreadwp_excerpt_length( $length ) {
	return 20;
}

/**
 * Set navigation menus
 */
add_action( 'init', 'thinthreadwp_register_theme_menus' );
function thinthreadwp_register_theme_menus() {

	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'thinthreadwp' )
		)
	);

	register_nav_menus(
		array(
			'footer-menu' => __( 'Footer Menu', 'thinthreadwp' )
		)
	);

}

/**
 * Widgets
 */
add_action( 'widgets_init', 'thinthreadwp_slug_widgets_init' );
function thinthreadwp_slug_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'thinthreadwp' ),
		'id'            => 'page',
		'description'   => __( 'Displays on the side of pages with a sidebar.', 'thinthreadwp' ),
		'before_widget' => '<div class="widget page-sidebar sidebar shadow">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'thinthreadwp' ),
		'id'            => 'blog',
		'description'   => __( 'Displays on the side of pages in the blog section.', 'thinthreadwp' ),
		'before_widget' => '<div class="widget blog-sidebar sidebar shadow">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

}