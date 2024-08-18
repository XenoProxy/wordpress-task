<?php

function register_my_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menus' );

wp_nav_menu([
    'theme_location'  => 'header_menu'
]);