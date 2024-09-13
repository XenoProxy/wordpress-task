jQuery(document).ready(function ($) {
  $(".star").each(function (index, data) {
    $(data).on("click", function (e) {
      $.ajax({
        url: rating_ajax.url,
        type: "POST",
        data: {
          action: "get_star",
          star: $(data).val(),
          nonce: rating_ajax.nonce,
        },
        success: function (response) {
          console.log(response)
        },
      });
    });
  });
});