<?php get_header(); ?>

  <!-- PLACE TO PUT MOST POPULAR SECTION IS HERE -->
  <!-- the most popular posts section starts here -->
  <div class="container most-popular">
    <div class="row">
      <div class="col-12 popular-header">
        <div class="popular-header-text">
          <h3 class="header">most popular</h3>
        </div>
        <div class="stripes">

        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!-- the most popular articles cards -->
    <div class="card-group">
    <?php
      $args = array(
        'date_query' => array(
          'after' => '2 weeks ago',
          'before' => 'today',
          'inclusive' => true,
        ),
      'orderby' => 'comment_count',
      'order' => 'DESC',
      'posts_per_page' => '3',
      'paged' => '1'
      );
      $mostComments = new WP_Query( $args ); ?>
      <?php if($mostComments->have_posts()) : ?>
        <?php while($mostComments->have_posts()) : $mostComments->the_post() ?>
          <!-- PRINT SINGLE CARD -->
          <div class="card single-card">
            <div class="card-photo-wrapper">
              <?php if(has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>"><div class="card-photo" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                </div></a>
              <?php endif; ?>
            </div>
            <div class="card-footer card-info">
              <small class="text-muted"><?php the_time('l, F jS, Y'); ?> · <a href="<?php comments_link(); ?>" class="text-muted"><?php comments_number( 'No comments', '1 Comment', '% Comments' ); ?></a></small>
            </div>
            <div class="card-block card-text">
              <a href="<?php the_permalink(); ?>" class="card-title">
                <?php the_title(); ?>
              </a>
              <p class="card-text"><?php the_excerpt(); ?></p>
            </div>
            <div class="read-more">
              <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block btn-read-more">read more...</a>
            </div>
          </div>

        <?php endwhile; ?>
      <?php else : ?>
        <p> <?php __('No posts found');  ?> </p>
      <?php endif;
        wp_reset_postdata();
      ?>
    </div>
    <!-- the most popular articles cards ends here -->
    </div>
  </div>
  <!-- the most popular posts section ends here -->
  <div class="break-white"></div>
  <div class="break-white"></div>

  <!-- CONTENT -->
  <div class="container">
    <div class="row">
      <!-- LATEST NEWS SECTION -->
      <div class="col-12 col-lg-9 news">
        <div class="row">
          <div class="col-12 latest-header">
            <h3 class="header">latest news</h3>
          </div>
        </div>

        <div class="break-white"></div>
        <?php $i=0; ?>
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post() ?>
            <?php ++$i;
              $format = get_post_format();
              if(($i%2===1)&&(! has_post_format())) { ?>
              <div class="row"> <?php }
              if(($i%2===0)&&($format=='aside' || $format=='status')) { ?> </div> <?php } ?>

            <?php get_template_part('content', get_post_format()); ?>

            <?php if(($i%2===0)&&(! has_post_format())) { ?>
            </div>
            <div class="break-white"></div> <?php } ?>
            <?php if(($format=='aside')||($format=='status')) { --$i; }?>
          <?php endwhile; ?>
        <?php else : ?>
          <p> <?php __('No posts found');  ?> </p>
        <?php endif; ?>
        <?php   if($i%2===1) {?> </div> <?php } ?>

        <div class="load-more-container"></div>

        <div class="break-white"></div>

        <!-- Ajax load more button -->
        <div class="container text-center">
          <a class="btn btn-lg btn-default load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
            <i class="fa fa-refresh" aria-hidden="true"></i> Load more</a>
        </div>
        <div class="break-white"></div>

      </div>
      <!-- LATEST NEWS SECTION ENDS HERE -->

      <!-- SIDEBAR SECTION STARTS HERE -->
      <div class="col-lg-3 hidden-md-down sidebar">
        <?php if(is_active_sidebar('index-sidebar')): ?>
          <?php dynamic_sidebar('index-sidebar'); ?>
        <?php endif; ?>
        <div class="break-white"></div>
      </div>
      <!-- SIDEBAR SECTION ENDS HERE -->
    </div>
  </div>
  <!-- CONTENT ENDS HERE -->
  <div class="break-white"></div>
  <div class="break-white"></div>
  <?php get_footer(); ?>
