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
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $before_widget;
    if (!empty($instance['title'])) {
      echo $before_title . $title . $after_title;
    } else {
      echo $before_title . 'Products Rating' . $after_title;
    }

  
    echo $after_widget;
  }

  public function form($instance)
  {
  
  }

  public function update($new_instance, $old_instance)
  {
    $instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
  }
}
