<?php

/*
 * Plugin Name: Orders Manager
 */

activate_plugin('orders-manager/orders-manager.php');
register_activation_hook(__FILE__, 'manage_posts_columns');

if (!post_type_exists('custom_order')) {

    add_action('admin_init', 'plugin_off');
    function plugin_off()
    {
        deactivate_plugins('orders-manager/orders-manager.php');
    }

    add_action('admin_notices', 'plugin_notification');
    function plugin_notification()
    {
        echo '<div class="updated">Плагин <p><strong>Orders Manager</strong> был отключен, так как тип записи custom_order не существует</p></div>';

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}

// фильтр manage_posts_columns, чтобы добавить новую колонку в таблицу заказов
function manage_posts_columns()
{
    if(!metadata_exists('post', 97, 'order_status')){
        echo 'Создано метаполе';
        add_post_meta(97, 'order_status', ['Canceled', 'Pending', 'Completed']);
    }    
}
apply_filters('add_order_status_column', 'manage_posts_columns');


// действие manage_posts_custom_column, чтобы отобразить значение мета поля order_status в новой колонке
function manage_posts_custom_column()
{
    get_post_meta(97, 'order_status', true);
}
do_action('display_order_status_column', 'manage_posts_custom_column');
