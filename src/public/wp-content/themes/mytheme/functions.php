<?php

function register_my_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

wp_nav_menu([
  'theme_location'  => 'header_menu'
]);
 
function my_theme_style() {
  wp_enqueue_style( 
    'my_theme', 
    get_stylesheet_directory_uri() . '/style.css',     
    array()
  );
}

add_action('wp_enqueue_scripts', 'my_theme_style');

