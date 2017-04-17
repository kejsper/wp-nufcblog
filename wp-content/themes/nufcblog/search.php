<?php get_header(); ?>
  <div class="break-white"></div>
  <div class="break-white"></div>

  <!-- SEARCH RESULTS  -->
  <div class="container">
    <div class="row">
      <!-- search results header -->
      <div class="col-12 col-lg-9 news">
        <div class="row">
          <div class="col-12 latest-header">
            <h3>search results: <?php echo get_search_query() ?></h3>
          </div>
        </div>
        <div class="row article">
          <div class="col-12">
            <?php get_search_form(); ?>
          </div>
        </div>
        <div class="break-white"></div>
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post() ?>
            <!-- PRINT SEARCH RESULTS -->
            <div class="row article">
              <div class="col-12">
                <a href="<?php the_permalink(); ?>" class="article-title">
                  <?php the_title(); ?>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <small class="text-muted">
                  <?php the_time('l, F jS, Y g:i a'); ?> - <a href="<?php comments_link(); ?>" class="text-muted"><?php comments_number( 'No comments', '1 Comment', '% Comments' ); ?></a>
                </small>
              </div>
            </div>
            <div class="row article-content">
              <div class="col-12">
                <div class="article-content-text">
                <p><?php the_excerpt(); ?></p>
                </div>
              </div>
            </div>
            <!-- END OF ARTICLE -->
            <div class="break-white"></div>


          <?php endwhile; ?>
        <?php else : ?>
          <p> <?php __('Nothing found!');  ?> </p>
        <?php endif; ?>

        <div class="break-white"></div>
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
