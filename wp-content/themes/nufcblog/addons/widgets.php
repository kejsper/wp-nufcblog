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
    echo '<p>This widget will display health update in the right column of the page.</p><p>You can change content of this widget by adding post with format of STATUS in your admin section (posts -> new -> format: status)</p>';
  }

  // Front-end display of widget
  public function widget( $args, $instance ) {

    echo $args['before_widget'];

      echo $args['before_title'] . 'health update' . $args['after_title'];
      $query = array(
      'post_type' => 'post',
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
      else: ?>
        <p>Unfortunately I was diagnosed with stage 4 prostate cancer in February and started hormone treatment back on 6th March</p>

        <p>My doctors have also recommended chemotherapy treatment be done at the same time.</p>

        <p>When the cancer has metastasized there's some evidence that both treatments done together may help longer term survival.</p>

        <p>The first chemotherapy treatment is on 13th April (unlucky for some) and the plan is to continue that for the next four or five months.</p>

        <p>Obviously I will do my best in the coming months.</p>

        <p><strong>Ed Harrison</strong></p>
      <?php
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
    echo '<p>This widget will display short version of Author Bio in the right column of the page.</p><p>You can change content of this widget by adding information in Pages -> Author.</p>';
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




// LEAGUE TABLE WIDGET
class nufcblog_table_widget extends WP_Widget {
  //setup widget Description
  public function __construct() {
    $widget_ops = array(
      'classname' => 'table-widget',
      'description' => 'Displays automatically updated league table',
    );
    parent::__construct( 'table_widget', 'League Table Widget', $widget_ops );
  }

  //Back-end display of widget
  public function form( $instance ) {
    echo '<p>This widget will display automatically updated league table in the right column of the page.</p>';

  }

/*
  //Updating back-end information of widget
  public function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title']);
    $instance['slug'] = strip_tags( $new_instance['slug']);
    return $instance;
  }
*/

  // Front-end display of the widget
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    echo $args['before_title'] . 'league table' . $args['after_title'];
    $my_file = TEMPLATEPATH.'/addons/data/leaguetable.json';
    $file_open = fopen($my_file , 'r');
    echo fread($file_open,filesize($my_file));
    fclose($file_open);
    echo $args['after_widget'];
  }

}


// ADS WIDGET
class nufcblog_ads_widget extends WP_Widget {
  //setup widget Description
  public function __construct() {
    $widget_ops = array(
      'classname' => 'ads-widget',
      'description' => 'Sidebar Ads Widget',
    );
    parent::__construct( 'ads_widget', 'Ads Widget', $widget_ops );
  }

  //Back-end display of widget
  public function form( $instance ) {
    echo '<p>This widget will display 1 AdSense Ad and 1 Pixfutue ad in the right column of the page.</p>';
  }

  // Front-end display of widget
  public function widget( $args, $instance ) {

    echo $args['before_widget'];

    echo $args['before_title'] . 'ads' . $args['after_title']; ?>
    <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Small Square -->
    <ins class="adsbygoogle"
       style="display:inline-block;width:200px;height:200px"
       data-ad-client="ca-pub-1875437023224247"
       data-ad-slot="5519768623"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <div class="sidebar-pix">
    <div id="537654075_INSERT_SLOT_ID_HERE" style="width:160px;height:600px;margin:0 auto;padding:0; display: block;"></div>
        <script type="text/javascript">
          var OX_ads = OX_ads || []
          OX_ads.push({
             slot_id: "537654075_INSERT_SLOT_ID_HERE",
             auid: "537654075"
          });
        </script>
        <script type="text/javascript" src="http://ax-d.pixfuture.net/w/1.0/jstag"></script>
    </div>
    <?php echo $args['after_widget'];
  }

}

// NEWSNOW WIDGET
class nufcblog_newsnow_widget extends WP_Widget {
  //setup widget Description
  public function __construct() {
    $widget_ops = array(
      'classname' => 'newsnow-widget',
      'description' => 'Sidebar NewsNow Widget',
    );
    parent::__construct( 'newsnow_widget', 'News Now Widget', $widget_ops );
  }

  //Back-end display of widget
  public function form( $instance ) {
    echo '<p>This widget will display NewsNow banner in the right column of the page.</p>';
  }

  // Front-end display of widget
  public function widget( $args, $instance ) {

    echo $args['before_widget'];

    echo $args['before_title'] . 'news now' . $args['after_title']; ?>
    <div class="container newsnow">
      <div class="newsnowlogo" title="Click here for more Newcastle United news from NewsNow">
        <a class="newsnowlogo_a" href="http://www.newsnow.co.uk/h/Sport/Football/Premier+League/Newcastle+United" target="_blank" style="color:#444;text-decoration:underline;border:0;">
          <img src="http://www.nufcblog.com/wp-content/themes/cutline-3-column-split-11/images/newsnow_ab.gif" style="width:119px;height:47px;border:0;display:block;padding-bottom:2px" alt="As featured on NewsNow: Newcastle United news"/>
          NUFC News 24/7
        </a>
      </div>
    </div>
    <?php echo $args['after_widget'];
  }

}

// LINKS WIDGET
class nufcblog_links_widget extends WP_Widget {
  //setup widget Description
  public function __construct() {
    $widget_ops = array(
      'classname' => 'links-widget',
      'description' => 'Displays blogroll/links on your footer',
    );
    parent::__construct( 'links_widget', 'Blogroll Widget', $widget_ops );
  }

  //Back-end display of widget
  public function form( $instance ) {

    echo '<p>This widget will display Blogroll/Links section at the bottom of your page.</p><p>You can add/remove/update links in Links section of your Admin Page (just below Posts).</p>';

  }

  // Front-end display of widget
  public function widget( $args, $instance ) {

    echo $args['before_widget'];

      echo $args['before_title'] . 'blogroll' . $args['after_title'];
      $query = array(
        'post_type' => 'links',
        'posts_per_page' => '50',
        'paged' => '1',
        'post_status' => 'publish',
      );
      $status = new WP_Query($query);
      if($status->have_posts()) :
        while($status->have_posts()) : $status->the_post();
          $postid = get_the_ID();
          $link = get_post_meta($postid, '_href_value_key' ,true)
          ?> <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> <a href="<?php echo $link ?>" class="single-footer-link" target="_blank"> <?php the_title(); ?></a> </li><?php
      endwhile;
      endif;
      wp_reset_postdata();
    echo $args['after_widget'];
  }

}

//Initialization of Links Widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_links_widget' );
});

//Initialization of Author widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_author_widget' );
});

//Initialization of Health Update widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_health_status_widget' );
});

//Initialization of League Table widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_table_widget' );
});

//Initialization of Ads Widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_ads_widget' );
});

//Initialization of NewsNow Widget
add_action('widgets_init', function() {
  register_widget( 'nufcblog_newsnow_widget' );
});

?>
