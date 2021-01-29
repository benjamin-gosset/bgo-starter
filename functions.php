<?php 

/**
 * Add post thumbnails support
 */ 
add_theme_support( 'post-thumbnails' );

/**
 * Add site title in theme header
 */ 
add_theme_support( 'title-tag' );

/**
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'script',
    'style',
) );

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support( 'custom-logo', array(
    'height'      => 50,
    'width'       => 250,
    'flex-width'  => true,
    'flex-height' => true,
) );

/**
 * Enqueue styles and scripts
 */ 
add_action( 'wp_enqueue_scripts', 'bgo_register_assets' );

function bgo_register_assets() {

    wp_enqueue_style( 'bgo', get_template_directory_uri() . '/dist/css/main.css', array(), '1.0');

    wp_enqueue_script( 'bgo', get_template_directory_uri() . 'dist/js/script.js', array(), '1.0', true);
}

/**
 * Register menus
 */ 
register_nav_menus( array(
	'menu-1'      => esc_html__( 'Primary menu', 'bgostarter' ),
	'topbar-menu' => esc_html__( 'Top bar menu', 'bgostarter' ),
	'social-menu' => esc_html__( 'Main menu social icons', 'bgostarter' ),
	'footer-menu' => esc_html__( 'Footer menu', 'bgostarter' ),
	'footer-social-menu' => esc_html__( 'Footer social icons', 'bgostarter' ),
) );
