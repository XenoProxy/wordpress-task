<?php

function register_my_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

wp_nav_menu([
  'theme_location'  => 'header_menu'
]);
 
function theme_add_bootstrap() {
  wp_enqueue_style( 'bootstrap-cdn-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' );
  wp_enqueue_script( 'bootstrap-cdn-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js' );
  wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
}
  
add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );
