<?php get_header(); ?>
  <div class="break-white"></div>
  <div class="break-white"></div>



  <!-- PLACE TO PUT MOST POPULAR SECTION IS HERE -->



  <!-- CONTENT -->
  <div class="container">
    <div class="row">
      <!-- LATEST NEWS SECTION -->
      <div class="col-12 col-lg-9 news">
        <div class="row">
          <div class="col-12 latest-header">
            <h3>latest news</h3>
          </div>
        </div>

        <div class="break-white"></div>
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post() ?>
            <?php get_template_part('content', get_post_format()); ?>

          <?php endwhile; ?>
        <?php else : ?>
          <p> <?php __('No posts found');  ?> </p>
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
