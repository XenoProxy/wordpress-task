<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body>
  <header class="site-header">
    <div class="blogtitle"><?php bloginfo('name'); ?></div>
    <?php wp_nav_menu(['theme_location'  => 'header_menu']); ?>
    <button type="button" class="btn btn-info header-register-btn" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>

    <div class="header-cart">
      <p class="cart-count">0</p>
      <button type="button" class="btn btn-warning header-cart-btn" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</button>
    </div>
  </header>

  <!-- Модальное окно регистрации-->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <p>
              <label for="login">Your login:</label>
              <input type="text" name="login" id="login" required>
            </p>
            <p>
              <label for="email">Your email:</label>
              <input type="email" name="email" id="email" required>
            </p>
            <p>
              <label for="name">Your Fullname:</label>
              <input type="text" name="name" id="name" required>
            </p>
            <p>
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" required>
            </p>
            <button class="btn btn-success" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Модальное окно корзины-->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel">Your cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="products-cart"></div>
          <div class="products-cart-total">
            <div class="products-total"><b>Total:</b></div>
            <div class="products-total-count"><b></b></div>
            <div class="products-total-price"><b></b></div>
            <button class="modal-order btn btn-success" data-bs-toggle="modal" data-bs-target="#orderModal">Buy</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Модальное окно оформления заказа-->
  <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderModalLabel">Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body order">
          <form id="order-form" class="order-form" method="POST">
            <label>
              Full Name:
              <input type="text" name="fullname" id="fullname" placeholder="Your Full Name" required autofocus>
            </label>
            <label>
              Email:
              <input type="email" name="email" id="email" placeholder="Your Email" required autofocus>
            </label>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success make-order" data-bs-dismiss="modal">Make order</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>