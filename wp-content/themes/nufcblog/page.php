<?php get_header(); ?>

  <!-- CONTENT -->
  <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
  <div class="container">
    <div class="row">
      <!-- LATEST NEWS SECTION -->
      <div class="col-12 col-lg-9 news">
        <div class="row">
          <div class="col-12 latest-header">
            <h4><?php the_title(); ?></h4>
          </div>
        </div>
            <!-- ARTICLE -->
            <div class="row article-content">
              <div class="col-12">
                <div class="article-photo-left">
                  <?php if(has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-thumbnail">
                  <?php endif; ?>
                </div>
                <div class="article-content-text">
                <p><?php
                the_content();

                ?></p>
                </div>
              </div>
            </div>

            <!-- END OF ARTICLE -->
            <div class="break-white"></div>
          <?php endwhile; ?>
        <?php else : ?>
          <p> <?php __('No posts found');  ?> </p>
        <?php endif; ?>

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
