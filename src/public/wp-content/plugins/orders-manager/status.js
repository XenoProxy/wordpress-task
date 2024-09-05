// установить статус заказа
jQuery(document).ready(function ($) {
  $.ajax({
    url: ajax_order_manager.url,
    type: "POST",
    data: {
      action: "update_order_status",
      order_status: '',
      nonce_code: ajax_order_manager.nonce,
    },
    success: function (response) {
        console.log(response)
    },
  });
});
