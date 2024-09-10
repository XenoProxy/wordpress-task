<div id="sidebar-rating" class="sidebar">

  <?php do_action('before_sidebar'); ?>

  <?php if (!dynamic_sidebar('sidebar-primary')) : ?>

    <aside id="rating" class="widget">
      <h3 class="widget-title"><?php _e('Products\' rating', 'shape'); ?></h3>
      <ul>
        <?php wp_get_archives(array('type' => 'monthly')); ?>
      </ul>
    </aside>

  <?php else : ?>
    <?php dynamic_sidebar('rating_sidebar'); ?>
  <?php endif; ?>

</div>