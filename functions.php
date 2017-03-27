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
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	load_theme_textdomain( 'thinthreadwp', get_template_directory() . '/languages' );

}

/**
 * Load theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'thinthreadwp_theme_scripts' );
function thinthreadwp_theme_scripts() {

	// Fonts - comment out or change
	wp_enqueue_style( 'googlefonts_css', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,700italic' );

	// Main styles - Toggle the commenting on these and adjust gulpfile to switch between normal and minified
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/assets/css/main.css' );
	//wp_enqueue_style( 'mainmin_css', get_template_directory_uri() . '/assets/css/main.min.css' );

	// Main scripts - Toggle the commenting on these and adjust gulpfile to switch between normal and minified
	//wp_enqueue_script( 'app_js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '', true );
	wp_enqueue_script( 'appmin_js', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), '', true );

	// Comment reply and threading script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

/**
 * Registers an editor stylesheet for the theme.
 */
add_action( 'admin_init', 'thinthreadwp_add_editor_styles' );
function thinthreadwp_add_editor_styles() {
	add_editor_style( '/assets/css/editor-styles.css' );
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
 * Widgets - Sidebars
 */
add_action( 'widgets_init', 'thinthreadwp_widgets_init' );
function thinthreadwp_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'thinthreadwp' ),
		'id'            => 'primary',
		'description'   => __( 'Default sidebar. Displays on the side of content.', 'thinthreadwp' ),
		'before_widget' => '<div class="widget primary-sidebar-widget sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title-primary">',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'thinthreadwp' ),
		'id'            => 'page',
		'description'   => __( 'Displays on the side of pages with a sidebar.', 'thinthreadwp' ),
		'before_widget' => '<div class="widget page-sidebar-widget sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title-page">',
		'after_title'   => '</h4>'
	) );

}

if ( ! function_exists( 'thinthreadwp_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function thinthreadwp_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'thinthreadwp' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'thinthreadwp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the categories, tags and comments. From _s.
 */
if ( ! function_exists( 'thinthreadwp_entry_footer' ) ) :
	function thinthreadwp_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'thinthreadwp' ) );
			if ( $categories_list && thinthreadwp_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'thinthreadwp' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'thinthreadwp' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'thinthreadwp' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'thinthreadwp' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'thinthreadwp' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category. From _s.
 *
 * @return bool
 */
function thinthreadwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'thinthreadwp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'thinthreadwp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so thinthreadwp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so thinthreadwp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in thinthreadwp_categorized_blog. From _s.
 */
add_action( 'edit_category', 'thinthreadwp_category_transient_flusher' );
add_action( 'save_post',     'thinthreadwp_category_transient_flusher' );
function thinthreadwp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'thinthreadwp_categories' );
}
