// оценить товар
jQuery(document).ready(function ($) {
  $(".star").each(function (index, data) {
    $(data).on('click', function (e) {
      $.ajax({
        url: rating_ajax.url,
        type: 'POST',
        data: {
          action: 'set_star',
          id: $('.product-id').text(),
          star: $(data).val(),
          nonce: rating_ajax.nonce,
        },
        success: function (response) {
        },
      });
    });
  });
});

// отображение рейтинга товара
jQuery(document).ready(function ($) {
  $.ajax({
    url: rating_ajax.url,
    type: 'POST',
    data: {
      action: 'get_star',
      id: $('.product-id').text(),
      nonce_code: rating_ajax.nonce,
    },
    success: function (response) {
      $('#average-rating').text(response);
    },
  });
});