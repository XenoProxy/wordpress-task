<?php get_header(); ?>

<div class="page-container">
	<div class="main-heading">
		<h1><?php the_title(); ?></h1>
	</div>

	<section>
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile;	endif; ?>
	</section>
</div>

<?php get_footer(); ?>