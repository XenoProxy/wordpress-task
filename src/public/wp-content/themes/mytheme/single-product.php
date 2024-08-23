<?php get_header(); ?>

<div class="container">
    <h1><?php the_title(); ?></h1>

    <?php the_post_thumbnail(); ?>
    <div>Price: <?php echo get_field('price'); ?></div>   
    <div>Size: <?php print_r(get_field('size')[0]); ?></div>   
    <div>Color: <?php echo get_field('color'); ?></div>   
    <div><?php the_content(); ?></div>

    <button type="button" class="btn btn-warning" id="prod-cart-btn">To the cart</button>

    <?php comments_template(); ?>
</div>


<?php get_footer(); ?>