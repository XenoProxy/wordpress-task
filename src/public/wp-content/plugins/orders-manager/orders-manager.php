<?php

/*
 * Plugin Name: Orders Manager
 */


register_activation_hook(__FILE__, 'check_order_status_meta');

wp_enqueue_script('jquery');
add_action('admin_enqueue_scripts', 'order_manager_admin', 25);

function order_manager_admin()
{
  wp_enqueue_script('status', plugin_dir_url(__FILE__) . '/status.js');
  $data = [
    'url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('order-status-nonce')
  ];
  wp_add_inline_script('status', 'const ajax_order_manager = ' . wp_json_encode($data), 'before');
}

add_action('wp_ajax_update_order_status', 'update_order_status');
add_action('wp_ajax_show_order_status', 'show_order_status');

function check_order_status_meta()
{
  if (!post_type_exists('custom_order')) {
    add_action('admin_init', 'plugin_off');
    add_action('admin_notices', 'plugin_notification');
  }

  if (!metadata_exists('post', 97, 'order_status')) {
    register_post_meta('custom_order', 'order_status', array(
      'type'              => 'array',
      'description'       => 'Order status',
      'single'            => true,
      'sanitize_callback' => null,
      'auth_callback'     => null,
      'show_in_rest'      => false,
    ));
  }
}

function plugin_off()
{
  deactivate_plugins('orders-manager/orders-manager.php');
}

function plugin_notification()
{
  echo '<div class="updated">Плагин <p><strong>Orders Manager</strong> был отключен, так как тип записи custom_order не существует</p></div>';
  if (isset($_GET['activate'])) {
    unset($_GET['activate']);
  }
}

add_filter('manage_custom_order_posts_columns', function ($columns) {
  $post_columns = [
    'id'    => 'ID',
    'order_status' => 'Status'
  ];
  return $columns + $post_columns;
});

add_action('manage_custom_order_posts_custom_column', function ($column_name) {
  if ($column_name === 'id') {
    the_ID();
  }

  if ($column_name === 'order_status') {
?>
    <select id="select">
      <option class="order-status" value="Cancelled">Cancelled</option>
      <option class="order-status" value="Pending">Pending</option>
      <option class="order-status" value="Completed">Completed</option>
    </select>
<?php
  }
});

function update_order_status()
{
  check_ajax_referer('order-status-nonce', 'nonce_code');
  $order_status = $_POST['order_status'];
  $order_id = $_POST['order_id'];
  update_post_meta($order_id, 'order_status', $order_status);
  echo $order_status;
  wp_die();
}

function show_order_status()
{
  $orders = get_posts(['post_type' => 'custom_order']);
  $order_data = [];
  foreach ($orders as $id => $order) {
    $order_data[$id] = get_post_meta($order->ID, 'order_status', true);
  }
  echo json_encode($order_data);
  wp_die();
}
