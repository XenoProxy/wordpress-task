// регистрация
jQuery(document).ready(function ($) {
  $("#registerModal").on("click", ".register", function () {
    $.ajax({
      url: register_login_ajax.url,
      type: "POST",
      data: {
        action: "register_modal",
        login: $("#login").val(),
        email: $("#email").val(),
        first_name: $("#first_name").val(),
        last_name: $("#last_name").val(),
        password: $("#password").val(),
        nonce: register_login_ajax.nonce,
      },
      success: function (response) {
        alert(`Успешно авторизован ${response}`)
      },
    });
  });
});

// авторизация
jQuery(document).ready(function ($) {
  $("#loginModal").on("click", ".login", function () {
    $.ajax({
      url: register_login_ajax.url,
      type: "POST",
      data: {
        action: "login_modal",
        email: $("#login-email").val(),
        password: $("#login-password").val(),
        nonce: register_login_ajax.nonce,
      },
      success: function (response) {
        var data = JSON.parse(response);
        if (data[0] == 1){
          $("#loginModal .err-message").html(data[1])
        } else{
          $(".site-header .header-register-btn").text(`Hello, ${data[1]}`)
        }
      },
    });
  });
});

// выход
jQuery(document).ready(function ($) {
  $(".dropdown-menu").on("click", ".dropdown-logout", function () {
    $.ajax({
      url: register_login_ajax.url,
      type: "POST",
      data: {
        action: "logout",
        nonce: register_login_ajax.nonce,
      },
      success: function () {
        alert(`Выход из аккаунта`)
      },
    });
  });
});