<?php

function register_my_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

wp_nav_menu([
  'theme_location'  => 'header_menu'
]);

// add_action( 'init', 'register_my_menus' );
