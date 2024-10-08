// добавить в корзину
jQuery(function ($) {
  var productName = $(".product-title").text();
  $(".product-actions").on("click", ".prod-cart-btn", function (e) {
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

// добавить товар в корзину
jQuery(document).ready(function ($) {
  $("#cartModal").on("click", ".extra-product", function (e) {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "add_extra_product",
        product_id: $(this).val(),
        nonce: myajax.nonce,
      },
      success: function (response) {},
    });
  });
});

// убрать товар
jQuery(document).ready(function ($) {
  $("#cartModal").on("click", ".excess-product", function (e) {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "remove_excess_product",
        product_id: $(this).val(),
        nonce: myajax.nonce,
      },
      success: function (response) {},
    });
  });
});

// добавить товар в корзину (страница товара)
jQuery(document).ready(function ($) {
  $(".product-actions").on("click", ".extra-product", function (e) {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "add_extra_product",
        product_id: $(this).val(),
        nonce: myajax.nonce,
      },
      success: function (response) {},
    });
  });
});

// убрать товар (страница товара)
jQuery(document).ready(function ($) {
  $(".product-actions").on("click", ".excess-product", function (e) {
    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "remove_excess_product",
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
              `<div hidden class="product-cart-id">${product["id"]}</div>` +
              `<div class="product-cart-name">${product["product_name"]}</div>` +
              `<div class="cart-count-container">` +
              `<button class="excess-product btn btn-info" value="${product["id"]}">-</button>` +
              `<div class="product-cart-count">${product["count"]}</div>` +
              `<button class="extra-product btn btn-info" value="${product["id"]}">+</button>` +
              `</div>` +
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
    type: "GET",
    data: {
      action: "get_cart_count",
      nonce: myajax.nonce,
    },
    success: function (response) {
      $(".cart-count").text(response);
    },
  });
});

// отображение добавления в корзину на странице товара
jQuery(document).ready(function ($) {
  $.ajax({
    url: myajax.url,
    type: "POST",
    data: {
      action: "check_product",
      product_id: $(".product-id").text(),
      nonce: myajax.nonce,
    },
    success: function (response) {
      const product = JSON.parse(response);
      var html = `<button type="button" class="btn btn-warning prod-cart-btn">To the cart</button>`;
      if (response != 0) {
        html =
          `<button class="excess-product btn btn-info" value="${product["id"]}"">-</button>` +
          `<div class="product-cart-count">${product["count"]}</div>` +
          `<button class="extra-product btn btn-info" value="${product["id"]}">+</button>`;
      }
      document.querySelector(".product-actions").innerHTML = html;
    },
  });
});

// оформить заказ
jQuery(document).ready(function ($) {
  $("#orderModal").on("click", ".make-order", function (e) {
    var cart_data = new Map([]);
    $(".product-cart").each(function (index, data) {
      var id = $(data).contents().filter(".product-cart-id").text();
      var count = $(data).contents()
        .filter(".cart-count-container").contents()
        .filter(".product-cart-count").text();
      var price = $(data).contents().filter(".product-cart-price").text();
      cart_data.set(id, [count, price.slice(0, -1)]);
    });

    const map_to_json = (map) => {
      return JSON.stringify(Object.fromEntries(map));
    };
    var json_cart_data = map_to_json(cart_data);

    $.ajax({
      url: myajax.url,
      type: "POST",
      data: {
        action: "make_order",
        fullname: $("#fullname").val(),
        email: $("#email").val(),
        products: json_cart_data,
        nonce: myajax.nonce,
      },
      success: function (response) {
        alert(`Your order №${response} has been created!`);
      },
    });
  });
});
