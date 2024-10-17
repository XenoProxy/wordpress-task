jQuery(function ($) {
  var email = $(".user-email > .user-info-value").text()
  $.ajax({
    url: "http://localhost/wp-json/mytheme/v1/orders/" + email,
    type: "GET",
    success: function (response) {      
      console.log(response)
      // const html = orders
      //   .map(
      //     (order) =>
      //       `<div class="user-orders">` +
      //       `<div hidden class="order-id">${order["ID"]}</div>` +
      //       `<div class="order-price">${order["post_type"]}$</div>` +
      //       `</div>`
      //   )
      //   .join("");
      // document.querySelector(".page-content").innerHTML = html;
    },
  });
});
