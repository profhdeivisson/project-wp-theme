<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">
            <h1 class="logo"><?php bloginfo( 'name' ); ?></h1>
            <button class="hamburger-menu" aria-label="Menu" aria-controls="navigation">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
            
            <?php
            wp_nav_menu( 
                array('theme-location' => 'header-menu') 
                ); 
            ?>
        </div>
    </header>