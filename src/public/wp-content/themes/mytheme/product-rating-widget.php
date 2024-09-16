<?php

class Rating_Widget extends WP_Widget
{
  public $args = array(
    'before_title'  => '<h4 class="widgettitle">',
    'after_title'   => '</h4>',
    'before_widget' => '<div class="widget-wrap">',
    'after_widget'  => '</div></div>',
  );

  function __construct()
  {
    parent::__construct(
      'rating_widget',
      'Products Rating',
    );
  }

  public function widget($args, $instance)
  {
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    $query = new WP_Query;
    $products =  $query->query([
      'post_type' => 'product',
      'orderby' => 'meta_value',
      'meta_key' => 'product_rating',
      'order' => 'DESC'
    ]);

    echo $before_widget;
    if (!empty($instance['title'])) {
      echo $before_title . $title . $after_title;
    } else {
      echo $before_title . 'Top 5 Products' . $after_title;
    }
    echo '<div class="rating-list">';
    $i = 0;
    foreach ($products as $product) {
      echo '<div class="product-rating-row">
          <a href="' . get_post_permalink($product->ID) . '">' . $product->post_title . '</a>
          <span>' . $product->product_rating . '</span>
        </div>';
      $i++;
      if ($i == 5) break;
    }
    echo '</div>';
    echo $after_widget;
    wp_reset_postdata();
  }

  public function form($instance)
  {
  }

  public function update($new_instance, $old_instance)
  {
    $instance          = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    return $instance;
  }
}
