<?php

/*
 * Plugin Name: Orders Manager
 */


register_activation_hook(__FILE__, array('Akismet', 'plugin_activation'));
register_deactivation_hook(__FILE__, array('Akismet', 'plugin_deactivation'));

// Проверка, что тип записи Order существует
if (!post_type_exists('order')) {
    deactivate_plugins('orders-manager/orders-manager.php');
}

// фильтр manage_posts_columns, чтобы добавить новую колонку в таблицу заказов
// apply_filters()


// действие manage_posts_custom_column, чтобы отобразить значение мета поля order_status в новой колонке
// do_action()