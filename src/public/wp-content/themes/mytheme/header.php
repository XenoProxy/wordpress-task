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
        <p class="cart-count">0</p>
        <button type="button" class="btn btn-warning header-cart-btn" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</button>
    </header>

    <!-- Модальное окно -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="products-cart"></div>
                    <div class="products-cart-total">
                        <div class="products-total-empty"></div>
                        <div class="products-total-count"></div>
                        <div class="products-total-price"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>