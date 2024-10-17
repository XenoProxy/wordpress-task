<?php
/*
Template Name: My Personal Account Page
*/
?>

<?php get_header(); ?>

<div class="page-heading">
  <h2><?php the_title(); ?></h2>
</div>

<div class="page-content">
  <div class="user-personal-info">
    <div class="user-name">
      <span class="user-info-label">Fullname:</span>
      <span class="user-info-value"><?php echo wp_get_current_user()->user_login ?></span>
    </div>
    <div class="user-email">
      <span class="user-info-label">Email:</span>
      <span class="user-info-value"><?php echo wp_get_current_user()->user_email ?></span>
    </div>
  </div>
</div>

<?php get_footer(); ?>