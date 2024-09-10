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
      'Products\' Rating',
    );
    add_action('widgets_init', function () {
      register_widget('Rating_Widget');
    });
  }

  public function widget($args, $instance)
  {
    echo $args['before_widget'];
    if (!empty($instance['title'])) {
      echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    }
    echo '<div class="textwidget">';
    echo esc_html__($instance['text'], 'text_domain');
    echo '</div>';
    echo $args['after_widget'];
  }

  public function form($instance)
  {
  }

  public function update($new_instance, $old_instance)
  {
  }
}

$rating_widget = new Rating_Widget();
