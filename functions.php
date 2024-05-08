<?php
function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action('init', 'register_my_menu');

function enqueue_custom_styles() {
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

function load_scripts(){
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );