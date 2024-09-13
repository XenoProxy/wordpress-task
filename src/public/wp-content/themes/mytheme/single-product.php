<?php get_header(); ?>

<div class="container">
  <div hidden class="product-id"><?php the_ID(); ?></div>
  <div class="main-product-info">
    <h1 class="product-title"><?php the_title(); ?></h1>
    <fieldset class="rating">
      <input type="radio" id="star5" name="rating" value="5" class="star"/><label class="full" for="star5"></label>
      <input type="radio" id="star4" name="rating" value="4" class="star"/><label class="full" for="star4"></label>
      <input type="radio" id="star3" name="rating" value="3" class="star"/><label class="full" for="star3"></label>
      <input type="radio" id="star2" name="rating" value="2" class="star"/><label class="full" for="star2"></label>
      <input type="radio" id="star1" name="rating" value="1" class="star"/><label class="full" for="star1"></label>
    </fieldset>
    <?php the_post_thumbnail(); ?>
    <div class="product-price"><?php echo get_field('price'); ?></div>
    <div>Size: <?php print_r(get_field('size')[0]); ?></div>
    <div>Color: <?php echo get_field('color'); ?></div>
  </div>
  <div class="product-actions"></div>
  <div><?php the_content(); ?></div>
  <?php comments_template(); ?>
</div>

<?php get_footer(); ?>