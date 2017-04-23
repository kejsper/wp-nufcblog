<?php

// HEALTH UPDATE WIDGET
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

// AUTHOR WIDGET
class nufcblog_author_widget extends WP_Widget {
  //setup widget Description
  public function __construct() {
    $widget_ops = array(
      'classname' => 'author-widget',
      'description' => 'Short version of About Author Page',
    );
    parent::__construct( 'author_widget', 'Author', $widget_ops );
  }

  //Back-end display of widget
  public function form( $instance ) {
    echo '<p>This widget will display short version of Author Bio in the left column of the page.</p><p>You can change content of this widget by adding information in Pages -> Author.</p>';
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $slug = ! empty( $instance['slug'] ) ? $instance['slug'] : '';
     ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title (for example: Author):</label>
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'slug' ); ?>">Page <a href="<?php bloginfo('template_url'); ?>/img/whatisslug.png" target="_blank">Slug</a>:</label>
    <input type="text" id="<?php echo $this->get_field_id( 'slug' ); ?>" name="<?php echo $this->get_field_name( 'slug' ); ?>" value="<?php echo esc_attr( $slug ); ?>" />
    </p>
  <?php }


  //Updating back-end information of widget
  public function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title']);
    $instance['slug'] = strip_tags( $new_instance['slug']);
    return $instance;


  }

  // Front-end display of the widget
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'];

      echo $args['before_title'] . $title . $args['after_title'];
      $query = array(
        'pagename' => $instance['slug'],
        'posts_per_page' => '1',
        'paged' => '1',
      );
      $status = new WP_Query($query);
      if($status->have_posts()) :
        while($status->have_posts()) : $status->the_post();
          if(has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url(); ?>" class="img-thumbnail">
          <?php endif;
          echo content(64);?>
          <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block btn-read-more">read more...</a>
          <?php
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

//Initialization of Author widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_author_widget' );
});

?>
