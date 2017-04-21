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

  //Back-end display of widget
  public function form( $instance ) {
    echo '<p>This widget will display health update in the left column of the page.</p><p>You can change content of this widget by adding post with format of STATUS in your admin section (posts -> new -> format: status)</p>';
  }

  // Front-end display of widget
  public function widget( $args, $instance ) {

    echo $args['before_widget'];

      echo $args['before_title'] . 'health update' . $args['after_title'];
      $query = array(
      'post type' => 'post',
      'posts_per_page' => '1',
      'paged' => '1',
      'tax_query' => array(
                      array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => 'post-format-status',
                    ),
                ),
      );
      $status = new WP_Query($query);
      if($status->have_posts()) :
        while($status->have_posts()) : $status->the_post();
          ?> <p class="font-weight-bold text-center"> <?php the_time('F jS, Y'); ?> </p><?php
          the_content();


      endwhile;
      endif;
      wp_reset_postdata();
    echo $args['after_widget'];
  }

}

//Initialization of Health Update widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_health_status_widget' );
});

?>
