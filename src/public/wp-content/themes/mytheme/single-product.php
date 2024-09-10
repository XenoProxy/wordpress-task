<?php get_header(); ?>

<div class="container">
  <div hidden class="product-id"><?php the_ID(); ?></div>
  <h1 class="product-title"><?php the_title(); ?></h1>
  <!-- <div class="product-rating"> -->
    <ul class="star-scale">
      <li class="star-scale-item" value="1"></li>
      <li class="star-scale-item" value="2"></li>
      <li class="star-scale-item" value="3"></li>
      <li class="star-scale-item" value="4"></li>
      <li class="star-scale-item" value="5"></li>
    </ul>
  <!-- </div> -->
  <?php the_post_thumbnail(); ?>
  <div class="product-price"><?php echo get_field('price'); ?></div>
  <div>Size: <?php print_r(get_field('size')[0]); ?></div>
  <div>Color: <?php echo get_field('color'); ?></div>
  <div class="product-actions"></div>
  <div><?php the_content(); ?></div>
  <?php comments_template(); ?>
</div>

<?php get_footer(); ?>