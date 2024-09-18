// отображение корзины
jQuery(document).ready(function ($) {
  $(".header-register-btn").click(function () {
    $.ajax({
      url: register_login_ajax.url,
      type: "POST",
      data: {
        action: "register_modal",
        nonce: register_login_ajax.nonce,
      },
      success: function (response) {
      },
    });
  });
});