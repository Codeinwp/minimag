<?php
 
if ( ! isset( $content_width ) )
	$content_width = 640; 
 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function minimag_setup() {
	
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );
	require( get_template_directory() . '/admin/functions.php' );
 
	load_theme_textdomain( 'minimag', get_template_directory() . '/languages' );
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' ); 
	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
		register_nav_menus(
			array(
				'main_nav' => 'Top Main Navigation Menu',
				'drop_nav' => 'Top Drop Down Navigation Menu',
				'bottom_nav' => 'Bottom Navigation Menu'
			)
		);
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
 
add_action( 'after_setup_theme', 'minimag_setup' );
 
/**
 * Register widgetized area and update sidebar with default widgets
 */
function minimag_widgets_init() {
	 
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'id' => 'right-sidebar',
        'before_widget' => ' <aside  class="widget sidebar-box clear">',
        'after_widget' => '</aside>', 
        'before_title' => '<header class="widget-title-sidebar-wrap"><h1 class="widget-title-sidebar">',
        'after_title' => '</h1></header>',
    ));
}
add_action( 'widgets_init', 'minimag_widgets_init' );
function minimag_excerpt($count){
	global $post;
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = strip_shortcodes($excerpt);
  return $excerpt;
}
/**
 * Enqueue scripts and styles
 */
function minimag_scripts() {
	wp_enqueue_style( 'minimag-style', get_stylesheet_uri() );
	wp_enqueue_style( 'Droid Serif', 'http://fonts.googleapis.com/css?family=Droid+Serif' );
	wp_enqueue_script( 'minimag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array('jquery'), '20130115', true );
	
	wp_enqueue_script( 'minimag-menu', get_template_directory_uri() . '/js/menu.js', array('jquery','tinynav'), '20130115', true );
	wp_enqueue_script( 'minimag-main-jquery', get_template_directory_uri() . '/js/jquery-main.js', array('jquery'), '20130115', true );
	 
	
	wp_enqueue_script( 'minimag-viewmore', get_template_directory_uri() . '/js/viewmore.js', array('jquery'), '20130115', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'minimag-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'minimag_scripts' );
function minimag_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'minimag_add_editor_styles' );

function minimag_empty_title($title, $id) {
    if(trim($title) == '')
		return '(no title)';
    return $title;
}
add_filter('the_title', 'minimag_empty_title', 10, 2);
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );