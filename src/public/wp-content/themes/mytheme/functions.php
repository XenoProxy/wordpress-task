<?php

function theme_add_bootstrap()
{
	wp_enqueue_style('bootstrap-cdn-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-cdn-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'theme_add_bootstrap');
wp_enqueue_script('jquery');

wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css');
// регистрируем и планируем скрипт на вывод
wp_enqueue_script('cart', get_template_directory_uri() . '/cart.js');

add_action('after_setup_theme', 'register_my_menu');

// добавляем данные к зарегистрированному скрипту
$data = [
	'url' => admin_url('admin-ajax.php'),
	'nonce' => wp_create_nonce('myajax-nonce')
];
wp_add_inline_script('cart', 'const myajax = ' . wp_json_encode($data), 'before');

add_action('wp_ajax_product_to_cart', 'add_product_to_cart');
add_action('wp_ajax_get_cart', 'get_cart');
add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_remove_from_cart', 'remove_from_cart');
add_action('wp_ajax_add_extra_product', 'add_extra_product');
add_action('wp_ajax_remove_excess_product', 'remove_excess_product');
add_action('wp_ajax_check_product', 'check_product');

function register_my_menu()
{
	register_nav_menu('header_menu', 'Header Menu');
}

add_action('init', 'register_post_type_init');

function register_post_type_init()
{
	// оставила комменты с руководства и добавила свои для усвоения и запоминания
	register_post_type('product', [
		'label'  => null,
		'labels' => [
			'name'               => 'Product', // основное название для типа записи
			'singular_name'      => 'Product', // название для одной записи этого типа
			'add_new'            => 'Add Product', // для добавления новой записи
			'add_new_item'       => 'Adding Product', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Product', // для редактирования типа записи
			'new_item'           => 'New Product', // текст новой записи
			'view_item'          => 'Show Product', // для просмотра записи этого типа.
			'search_items'       => 'Find Product', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in the cart', // если не было найдено в корзине
	
		],
		'description'         => 'Product for the shoping',
		'public'              => true,
		'show_in_menu'        => null, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null, // Позиция где должно расположится меню нового типа записи
		'menu_icon'           => null, //Ссылка на картинку, которая будет использоваться для этого меню
		'hierarchical'        => false,
		'supports'            => [  // Поля на странице создания/редактирования типа записи
			'title',
			'editor',
			'author',
			'thumbnail',
			'custom-fields',
			'comments',
		],
		'has_archive'         => true, // Включить поддержку страниц архивов для этого типа записей
		'rewrite'             => true, // Использовать ли ЧПУ для этого типа записи
		'query_var'           => true, // Устанавливает название параметра запроса для создаваемого типа записи. False, чтобы убрать возможность запросов
	]);	

	register_post_type('custom_order', [
		'label'  => null,
		'labels' => [
			'name'               => 'Order', // основное название для типа записи
			'singular_name'      => 'Order', // название для одной записи этого типа
			'add_new'            => 'Add Order', // для добавления новой записи
			'add_new_item'       => 'Adding Order', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Order', // для редактирования типа записи
			'new_item'           => 'New Order', // текст новой записи
			'view_item'          => 'Show Order', // для просмотра записи этого типа.
			'search_items'       => 'Find Order', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in the cart', // если не было найдено в корзине

		],
		'description'         => 'Your products',
		'public'              => true,
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null, // Позиция где должно расположится меню нового типа записи
		'menu_icon'           => null, //Ссылка на картинку, которая будет использоваться для этого меню
		'hierarchical'        => false,
		'supports'            => [  // Поля на странице создания/редактирования типа записи
			'fullname',
			'email',
			'product'
		],
		'has_archive'         => false, // Включить поддержку страниц архивов для этого типа записей
		'rewrite'             => true, // Использовать ли ЧПУ для этого типа записи
		'query_var'           => true, // Устанавливает название параметра запроса для создаваемого типа записи. False, чтобы убрать возможность запросов
	]);
}

add_action('pre_get_posts', 'hwl_home_pagesize', 1);
function hwl_home_pagesize($query)
{
	if (is_admin() || ! $query->is_main_query()) {
		return;
	}

	if ($query->is_post_type_archive('product')) {
		$query->set('posts_per_page', 8);
	}
}

/* Удаляем H2 из пагинации */
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
	return '
	<nav class="%1$s" role="navigation">
	<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function add_product_to_cart()
{
	// проверяем nonce код, если проверка не пройдена прерываем обработку
	check_ajax_referer('myajax-nonce', 'nonce_code');

	$product_id = $_POST['product_id'];
	$data = [
		'id' => $product_id,
		'product_name' => $_POST['product_name'],
		'price' => $_POST['product_price'],
		'origin_price' => $_POST['product_price'],
		'count' => 1
	];
	setcookie("cart-$product_id", json_encode($data), 0, "/");
	wp_die();
}

function get_cart()
{
	$cookie_arr = [];
	foreach ($_COOKIE as $cookie_name => $cookie_val) {
		if (preg_match("/cart-/", $cookie_name)) {
			$cookies = json_decode(stripslashes($cookie_val), true);
			$cookie_arr[] = $cookies;
		}
	}
	echo json_encode($cookie_arr);
	wp_die();
}

function get_cart_count()
{
	$cookie_count = 0;
	foreach ($_COOKIE as $cookie_name => $val) {
		if (preg_match("/cart-/", $cookie_name)) {
			$cookie_data = json_decode(stripslashes($val), true);
			$cookie_count += $cookie_data["count"];
		}
	}
	echo $cookie_count;
	wp_die();
}

function remove_from_cart()
{
	$product_id = $_POST['product_id'];
	unset($_COOKIE["cart-$product_id"]);
	setcookie("cart-$product_id", '', time() - 3600, '/');
	wp_die();
}

function add_extra_product()
{
	$product_id = $_POST['product_id'];
	$cookie = $_COOKIE["cart-$product_id"];
	$cookie_data = json_decode(stripslashes($cookie), true);
	define("OLD_PRICE", $cookie_data["price"]);
	$new_data = array();
	foreach ($cookie_data as $key => $val) {
		$new_data[$key] = $val;
		if ($key == "count") {
			$new_data["count"]++;
			$new_data["price"] = $cookie_data["price"] + $cookie_data["origin_price"];
		}
	}
	setcookie("cart-$product_id", json_encode($new_data), 0, "/");
	wp_die();
}

function remove_excess_product()
{
	$product_id = $_POST['product_id'];
	$cookie = $_COOKIE["cart-$product_id"];
	$cookie_data = json_decode(stripslashes($cookie), true);
	$new_data = array();
	foreach ($cookie_data as $key => $val) {
		$new_data[$key] = $val;
		if ($key == "count") {
			$new_data["count"]--;
			$new_data["price"] = $cookie_data["price"] - $cookie_data["origin_price"];
		}
	}
	setcookie("cart-$product_id", json_encode($new_data), 0, "/");
	if ($cookie_data["count"] == 1) {
		unset($_COOKIE["cart-$product_id"]);
		echo setcookie("cart-$product_id", '', time() - 3600, '/');
	}
	wp_die();
}

function check_product()
{
	$product_id = $_POST['product_id'];
	$cookie = $_COOKIE['cart-'.$product_id];
	if (isset($cookie)) {
		$cookie_data = json_decode(stripslashes($cookie), true);
		echo json_encode($cookie_data);
	} else {
		echo 0;
	}
	wp_die();
}
