<?php 

// Add post thumbnails support
add_theme_support( 'post-thumbnails' );

// Add site title in theme header
add_theme_support( 'title-tag' );

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'bgo_register_assets' );

function bgo_register_assets() {

    wp_enqueue_style( 'bgo', get_template_directory_uri() . '/dist/css/main.css', array(), '1.0');

    wp_enqueue_script( 'bgo', get_template_directory_uri() . 'dist/js/script.js', array(), '1.0', true);
}

// Register menus
register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );
