<?php get_header(); ?>

<h2><?php the_archive_title(); ?></h2>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div><?php the_post_thumbnail(); ?></div>
    <div><?php the_excerpt(); ?></div>    
<?php endwhile;	endif; ?>

<?php the_posts_pagination(); ?>

<?php get_footer(); ?>