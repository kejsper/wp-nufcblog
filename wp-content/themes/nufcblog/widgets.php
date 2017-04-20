<?php
class nufcblog_health_status_widget extends WP_Widget {
  //setup widget Description
  public function __construct() {
    $widget_ops = array(
      'classname' => 'health-status-widget',
      'description' => 'Health status update widget',
    );
    parent::__construct( 'health_update', 'Health Update', $widget_ops );
  }
}

//Initialization of Health Update widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_health_status_widget' );
});
