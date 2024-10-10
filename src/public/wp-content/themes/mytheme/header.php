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
    <?php
    if (is_user_logged_in()) {
      $user = wp_get_current_user();
      echo "
      <div class='dropdown'>
      <button type='button' class='btn btn-info dropdown-toggle' id='userBtn' aria-expanded='false' data-bs-toggle='dropdown'>Hello, $user->user_login</button>
      <ul class='dropdown-menu' aria-labelledby='userBtn'>
        <li><button type='button' class='dropdown-logout dropdown-item'>Log out</button></li>
      </ul>
      </div>
      ";
    } else {
      echo "<button type='button' class='btn btn-info header-register-btn' data-bs-toggle='modal' data-bs-target='#registerModal'>Register</button>";
    }
    ?>
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
              <label for="login">Login:</label>
              <input type="text" name="login" minlength="4" id="login" required>
            </p>
            <p>
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" required>
            </p>
            <p>
              <label for="first_name">First name:</label>
              <input type="text" name="first_name" id="first_name">
            </p>
            <p>
              <label for="last_name">Last name:</label>
              <input type="text" name="last_name" id="last_name">
            </p>
            <p>
              <label for="password">Password:</label>
              <input type="password" name="password" minlength="8" id="password" required>
            </p>
            <button class="btn btn-success register" type="button">Submit</button>
          </form>
          <div class="modal-footer">
            <span>Already have an account?</span>
            <button type="button" class="btn btn-info modal-login-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Модальное окно авторизации-->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Log in</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <p>
              <label for="login-email">Email:</label>
              <input type="text" name="login-email" id="login-email" required>
            </p>
            <p>
              <label for="login-password">Password:</label>
              <input type="password" name="login-password" id="login-password" required>
            </p>
            <button class="btn btn-success login" type="button">Submit</button>
            <div class='err-message'></div>
          </form>
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