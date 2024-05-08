<?php
function custom_header() {
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    register_nav_menu('header-menu', __( 'Header Menu' ));
}

add_action('after_setup_theme', 'custom_header');

function my_theme_customize_register( $wp_customize ) {
    // Adiciona uma seção no personalizador para o logotipo
    $wp_customize->add_section('my_theme_logo_options', array(
        'title'    => __('Opções do Logotipo', 'my_theme'),
        'priority' => 30,
    ));

    // Adiciona uma configuração para o tamanho do logotipo
    $wp_customize->add_setting('my_theme_logo_size', array(
        'default'   => 'medium',
        'transport' => 'refresh',
    ));

    // Adiciona um controle para o tamanho do logotipo
    $wp_customize->add_control('my_theme_logo_size_control', array(
        'label'    => __('Tamanho do Logotipo', 'my_theme'),
        'section'  => 'my_theme_logo_options',
        'settings' => 'my_theme_logo_size',
        'type'     => 'select',
        'choices'  => array(
            'small'  => __('Pequeno', 'my_theme'),
            'medium' => __('Médio', 'my_theme'),
            'large'  => __('Grande', 'my_theme'),
        ),
    ));
}

add_action('customize_register', 'my_theme_customize_register');

// Aplica o tamanho do logotipo escolhido
function my_theme_custom_logo_size() {
    $logo_size = get_theme_mod('my_theme_logo_size', 'medium');
    ?>
    <style type="text/css">
        .custom-logo { 
            max-width: <?php echo $logo_size === 'small' ? '100px' : ($logo_size === 'large' ? '300px' : '200px'); ?>;
            height: auto;
        }
        @media (max-width: 768px) {
            .custom-logo {
                max-width: 150px; /* Tamanho para tablets */
            }
        }
        @media (max-width: 480px) {
            .custom-logo {
                max-width: 100px; /* Tamanho para telefones celulares */
            }
        }
    </style>
    <?php
}

add_action('wp_head', 'my_theme_custom_logo_size');

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