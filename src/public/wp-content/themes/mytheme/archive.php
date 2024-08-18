<?php get_header(); ?>

<h2><?php the_archive_title(); ?></h2>
<h1><?php the_title(); ?></h1>

<div><? echo get_the_content(); ?></div>

<?php get_footer(); ?>