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
	wp_enqueue_script( 'app_js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '', true );
	//wp_enqueue_script( 'appmin_js', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), '', true );

}
