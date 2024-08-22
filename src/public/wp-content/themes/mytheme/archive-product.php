<?php get_header(); ?>

<?php get_template_part('content', 'archive-product'); ?>

<div class="product-row">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <img src="<?php echo get_field('image'); ?>" alt="<?php echo $image['alt']; ?>" />
                <div><?php echo get_field('price'); ?>$</div>
                <div><?php the_excerpt(); ?></div>
                <a class="btn btn-success" href="<?php the_permalink(); ?>">Buy</a>
            </article>
    <?php endwhile; endif; ?>

    <?php wp_reset_query(); ?>
</div>
<?php the_posts_pagination(array(
    'mid_size' => 2,
    'end_size' => 2,
)); ?>

<?php get_footer(); ?>