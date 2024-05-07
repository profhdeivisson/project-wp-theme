<?php
function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action('init', 'register_my_menu');

// add_action( 'rest_api_init', function () {
//     register_rest_route( 'test-project/v1', '/menu/(?P<location>[a-zA-Z0-9_-]+)', array(
//         'methods' => 'GET',
//         'callback' => 'get_menu_items_by_location',
//     ) );
// });

// function get_menu_items_by_location( $data ) {
//     $locations = get_nav_menu_locations();
//     $menu = wp_get_nav_menu_object( $locations[ $data['location'] ] );
//     $menu_items = wp_get_nav_menu_items( $menu->term_id );

//     return $menu_items;
// }

function enqueue_custom_styles() {
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

function load_scripts(){
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// function register_project_post_type() {
//     $args = array(
//         'public' => true,
//         'label'  => 'Projetos',
//         'has_archive' => true,
//         // Outros argumentos aqui
//     );
//     register_post_type('project', $args);
// }
// add_action('init', 'register_project_post_type');
