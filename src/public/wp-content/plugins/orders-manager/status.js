// отображение статуса заказа
jQuery(document).ready(function ($) {
  $.ajax({
    url: ajax_order_manager.url,
    type: "GET",
    data: {
      action: "show_order_status",
      nonce_code: ajax_order_manager.nonce,
    },
    success: function (response) {
      var products = JSON.parse(response);
      $(".type-custom_order").each(function (index, data) {
        $(data).contents().find("#select").val(products[index]);
      });
    },
  });
});

// установить статус заказа
jQuery(document).ready(function ($) {
  $(".type-custom_order").each(function (index, data) {
    var id = $(data).contents().filter(".id").text();
    var select = $(data).contents().find("#select");
    $(select).on("change", function (e) {
      $.ajax({
        url: ajax_order_manager.url,
        type: "POST",
        data: {
          action: "update_order_status",
          order_id: id,
          order_status: select.val(),
          nonce_code: ajax_order_manager.nonce,
        },
        success: function (response) {},
      });
    });
  });
});
