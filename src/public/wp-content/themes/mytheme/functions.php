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

add_action( 'init', 'register_post_type_init' );

function register_post_type_init() {
// оставила комменты с руководства и добавила свои для усвоения и запоминания
	register_post_type( 'product', [
		'label'  => null,
		'labels' => [
			'name'               => 'Product', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый товар', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине\
      // 'parent_item_colon'  => '', // для родителей (у древовидных типов)
			// 'menu_name'          => '____', // Название меню. По умолчанию равен name.
		],
		'description'         => 'Товары, доступные для заказа',
		'public'              => true,
    // 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню админки
    // 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null, // Позиция где должно расположится меню нового типа записи
		'menu_icon'           => null, //Ссылка на картинку, которая будет использоваться для этого меню
    //'capability_type'   => 'post', // Строка которая будет маркером для установки прав для этого типа записи. Встроенные маркеры это: post и page
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [  // Поля на странице создания/редактирования типа записи
      'title', 
      'editor',
      'author', 
      'thumbnail', 
      'custom-fields',
      'comments',
    ], 
		'has_archive'         => false, // Включить поддержку страниц архивов для этого типа записей
		'rewrite'             => true, // Использовать ли ЧПУ для этого типа записи
		'query_var'           => true, // Устанавливает название параметра запроса для создаваемого типа записи. False, чтобы убрать возможность запросов
	] );
}
  

