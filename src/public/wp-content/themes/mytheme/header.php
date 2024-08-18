<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <!-- Bootstrap CSS (Cloudflare CDN) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <!-- jQuery (Cloudflare CDN) -->
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Bootstrap Bundle JS (Cloudflare CDN) -->
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <?php wp_head(); ?>
    </head>
    <body>
        <header class="site-header">     
            <div id="blogtitle"><?php bloginfo ('name'); ?></div>
        </header>