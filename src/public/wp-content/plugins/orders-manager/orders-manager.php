<?php

/*
 * Plugin Name: Orders Manager
 */

if (!post_type_exists('custom_order')) {

    add_action('admin_init', 'plugin_off');
    function plugin_off()
    {
        // deactivate_plugins('orders-manager/orders-manager.php');
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

add_filter('manage_custom_order_posts_columns', function ($columns) {
    $post_columns['order_status'] = 'Status';
    return $columns + $post_columns;
});

add_action('manage_custom_order_posts_custom_column', function ($column_name) {
    if ($column_name === 'order_status') {
?>
        <select>
            <option class="order-status cancelled">Cancelled</option>
            <option class="order-status pending">Pending</option>
            <option class="order-status comleted">Comleted</option>
        </select>
<?php
    }
});
