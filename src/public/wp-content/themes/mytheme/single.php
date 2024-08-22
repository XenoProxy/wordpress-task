<?php get_header(); ?>

<div class="post-heading">
	<h1><?php the_title(); ?></h1>
</div>

<img src="<?php echo get_field('image'); ?>" alt="<?php echo $image['alt']; ?>" />
<div><?php echo get_field('price'); ?></div>   
<div><?php the_content(); ?></div>

<?php get_footer(); ?>