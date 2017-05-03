<?php get_header(); ?>

  <!-- CONTENT -->
  <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
  <div class="container">
    <div class="row">
      <!-- LATEST NEWS SECTION -->
      <div class="col-12 col-lg-9">
        <h1 class="page-header"><?php the_title(); ?></h1>
        <div class="page-content">
          <div class="page-line-article"></div>
              <!-- ARTICLE -->
            <div class="row">
              <div class="col-12 single-info">
                <div class="row">

                  <div class="col-12 col-sm-12">
                    <div class="row">
                      <div class="col-12 article-author text-center">
                        <div class="text-muted article-info-container">
                          <span class="article-author-name hidden-xs-down">Written by </span>
                          <span class="article-author-name"><?php the_author() ?></span>
                        </div>
                        <div>
                          <span class="article-time text-muted hidden-xs-down"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('g:ia'); ?></span>
                          <span class="article-date text-muted"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('l, F jS, Y'); ?></span>
                        </div>
                        <div>
                          <span class="text-muted"><i class="fa fa-comment-o" aria-hidden="true"></i> Commented <?php comments_number( '% times', '% time', '% times' ); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="page-line-article"></div>
            <div class="row article-content">
              <div class="col-12">
                <?php if(has_post_thumbnail()) : ?>
                <div class="article-photo-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                </div>
                <?php endif; ?>
                <div class="article-content-text">
                  <p><?php
                  the_content();
                  ?></p>
                </div>
                <div class="break-white"></div>
                <!-- PREVIOUS AND NEXT POST SECTION -->
                <div class="row hidden-md-down">
                  <div class="col-6 text-right">
                    <span class="article-nav"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Post</span>
                    <span class="article-nav-link"><?php previous_post_link( '%link', '%title', TRUE, 'post_format' ); ?></span>
                  </div>

                  <div class="col-6 text-left next">
                    <span class="article-nav"> Next Post <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="article-nav-link"><?php next_post_link('%link', '%title', TRUE, 'post_format'); ?> </span>
                  </div>
                </div>

                <div class="row hidden-lg-up">
                  <div class="col-6 text-right">
                    <span class="article-nav"><i class="fa fa-angle-left" aria-hidden="true"></i> <?php previous_post_link( '%link', 'Previous Post', TRUE, 'post_format' ); ?></span>
                  </div>
                  <div class="col-6 text-left next">
                    <span class="article-nav"> <?php next_post_link('%link', 'Next Post', TRUE, 'post_format'); ?>  <i class="fa fa-angle-right" aria-hidden="true"></i></span>

                  </div>
                </div>

                <!-- END OF PREV AND NEXT SECTION -->
              </div>
            </div>
            <div class="row">
              <div class="col-12 single-comment">
                <?php if( comments_open() ){
                  comments_template();
                }
                ?>
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
