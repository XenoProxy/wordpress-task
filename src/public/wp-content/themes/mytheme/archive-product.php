<?php
    /* Template Name: Product Archive */
    get_header(); 
?>

<?php get_template_part( 'content', 'archive-product' ); ?>

<?php
$args = array(
	'post_type' => 'product',
	'posts_per_archive_page' => 4
);
query_posts( $args );
?>

<div id="container">

    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <div><?php the_post_thumbnail(); ?></div>
        <div><?php the_excerpt(); ?></div>    
        <a href="<?php the_permalink(); ?>" >Buy</a>
    <?php endwhile;	endif; ?>
    <?php wp_reset_query(); ?>

</div>

<?php get_footer(); ?>