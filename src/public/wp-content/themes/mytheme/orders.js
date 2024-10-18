jQuery(function ($) {
  var email = $(".user-email > .user-info-value").text()
  $.ajax({
    url: "http://localhost/wp-json/mytheme/v1/orders/" + email,
    type: "GET",
    success: function (response) {      
      console.log(response)
      const html = response
        .map(
          (order_data) =>
            `<tr>`+
            `<td>ID</td>` +
            `<td>type</td>` +
            `</tr>` +
            `<tr>`+
            `<td class="order-id">${order_data["order_id"]}</td>` +
            `<td class="order-product">${order_data['order_products_data']}</td>` +
            // `<td class="order-product">${order_data["post_type"]}</td>` +
            `</tr>`
        )
        .join("");
      document.querySelector(".user-orders").innerHTML = html;
    },
  });
});
