// добавить в корзину
jQuery(function ($) {
  var productName = $(".product-title").text();
  $(".prod-cart-btn").click(function () {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "product_to_cart",
        product_id: $(".product-id").text(),
        product_name: productName,
        product_price: $(".product-price").text(),
        nonce_code: myajax.nonce,
      },
      success: function (response) {
        alert(`The ${productName} has been added to the cart!`);
      },
    });
  });
});

// удалить товар из корзины
jQuery(document).ready(function ($) {
  $("#cartModal").on("click", ".remove-from-cart", function (e) {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "remove_from_cart",
        product_id: $(this).val(),
        nonce: myajax.nonce,
      },
      success: function (response) {},
    });
  });
});

// отображение корзины
jQuery(document).ready(function ($) {
  $(".header-cart-btn").click(function () {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "get_cart",
        nonce: myajax.nonce,
      },
      success: function (response) {
        const products = JSON.parse(response);
        var total_price = 0;
        var total_count = 0;
        products.forEach((product) => {
          total_price += Number(product["price"]);
          total_count += product["count"];
        });
        const html = products
          .map(
            (product) =>
              `<div class="product-cart">` +
              `<div class="product-cart-name">${product["product_name"]}</div>` +
              `<div class="product-cart-count">${product["count"]}</div>` +
              `<div class="product-cart-price">${product["price"]}$</div>` +
              `<button class="remove-from-cart btn btn-danger" value="${product["id"]}">Remove</button>` +
              `</div>`
          )
          .join("");
        $(".products-total-count>b").text(total_count);
        $(".products-total-price>b").text(total_price + "$");
        document.querySelector(".products-cart").innerHTML = html;
      },
    });
  });
});

// кол-во товаров в корзине (в хедере)
jQuery(document).ready(function ($) {
  $.ajax({
    url: myajax.url,
    type: "POST",
    data: {
      action: "get_cart_count",
      nonce: myajax.nonce,
    },
    success: function (response) {
      $(".cart-count").text(response);
    },
  });
});
