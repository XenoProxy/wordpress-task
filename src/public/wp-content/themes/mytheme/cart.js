// jQuery(function($) {
//   var counter  = $('.cart-count').val();
//   var productId = $('.product-id').text();
//   $(".prod-cart-btn"). click (function(){
//     counter++;
//     $('.cart-count').val(counter);
// 	console.log(productId);
//     alert(`The ${productId} has been added to the cart!`);
//   });
// });

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
        const html = products.map(
		(product) =>
			`<div class="product-cart">` +
			`<div class="product-cart-name">${product["product_name"]}</div>` +
			`<div class="product-cart-count">${product["count"]}</div>` +
			`<div class="product-cart-price">${product["price"]}</div>` +
			`</div>`
		).join("");
        $(".products-total-count").text(total_count);
        $(".products-total-price").text(total_price);
        document.querySelector(".products-cart").innerHTML = html;
      },
    });
  });
});

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
