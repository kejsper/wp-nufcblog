<?php get_header(); ?>

  <!-- CONTENT -->
  <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
  <div class="container">
    <div class="row">
      <!-- LATEST NEWS SECTION -->
      <div class="col-12 col-lg-9">
        <h1 class="page-header"><?php the_title(); ?></h1>
        <div class="page-line-article"></div>
            <!-- ARTICLE -->
            <div class="row">
              <div class="col-12 single-info">
                <div class="row">
                  <div class="col-lg-1 col-sx-3">
                    <div class="row">
                      <div class="col-12"><a href="#" class="btn article-button-social"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="row">
                      <div class="col-12"><a href="#" class="btn article-button-social"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="row">
                      <div class="col-12"><a href="#" class="btn article-button-social"><i class="fa fa-google-plus" aria-hidden="true"></i></a></div>
                    </div>
                  </div>
                  <div class="col-lg-8 col-sx-4">
                    <div class="row">
                      <div class="col-12 article-author">
                        <div class="author-icon">
                          <i class="fa fa-pencil align-top" aria-hidden="true"></i>
                        </div>
                        <div class="author-name">
                          <span class="align-top"><?php the_author() ?></span>
                        </div>
                        <div class="clear-both"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3"> <i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('g:ia'); ?></div>
                      <div class="col-lg-9"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('l, F jS, Y'); ?></div>

                    </div>
                  </div>
                  <div class="col-lg-3 col-sx-4 article-comments-icon">
                    <span class="align-top"><i class="fa fa-comments" aria-hidden="true"></i></span>
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


                // nastepny i poprzedni post do rozpracowania                next_post_link();
                previous_post_link();
                next_post_link();




                ?></p>
                </div>
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
