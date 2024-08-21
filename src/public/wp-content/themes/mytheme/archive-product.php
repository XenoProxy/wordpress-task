<?php
    /* Template Name: Product Archive */
    get_header(); 
?>

<?php get_template_part( 'content', 'archive-product' ); ?>

<h2><?php the_archive_title(); ?></h2>

<div id="container">

    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <div><?php the_post_thumbnail(); ?></div>
        <div><?php the_excerpt(); ?></div>    
        <a href="<?php the_permalink(); ?>" >Buy</a>
    <?php endwhile;	endif; ?>

</div>

<nav aria-label="Постраничная навигация">
    <ul class="pagination">
        <li class="page-item disabled">
            <span class="page-link">Предыдущая</span>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item active">
            <span class="page-link">2</span>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">Следующая</a>
        </li>
    </ul>
</nav>

<?php get_footer(); ?>