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

jQuery( function( $ ){
	var productName = $('.product-title').text();
	$( '.prod-cart-btn' ).click(function(){
		$.ajax({
			url: myajax.url,
			type: 'POST',
			data: {
				action: 'product_to_cart',
				product_id: $('.product-id').text(),
				nonce_code : myajax.nonce
			}, 
			success: function( data ) {
				$( '.prod-cart-btn' ).text( 'Отправить' );
				alert(`The ${productName} has been added to the cart!`);
			}
		});
	});
});

