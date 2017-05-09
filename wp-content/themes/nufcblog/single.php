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
          <?php if(has_post_thumbnail()) : ?>
          <div class="article-photo-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
          </div>
          <?php endif; ?>
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
                <!-- TUTAJ BYLO ZDJECIE -->
                <div class="article-content-text">
                  <p><?php
                  the_content();
                  ?></p>
                </div>
                <div class="break-white"></div>
                <!-- PREVIOUS AND NEXT POST SECTION -->
                <?php
                if ( $prev = get_previous_post(true) ) {
                  $prev_title = $prev->post_title;
                  $prev_ex_con = ( $prev->post_excerpt ) ? $prev->post_excerpt : strip_shortcodes( $prev->post_content );
                  $prev_text = wp_trim_words( apply_filters( 'the_excerpt', $prev_ex_con ), 32 );
                }
                if ( $next = get_next_post(true) ) {
                  $next_title = $next->post_title;
                  $next_ex_con = ( $next->post_excerpt ) ? $next->post_excerpt : strip_shortcodes( $next->post_content );
                  $next_text = wp_trim_words( apply_filters( 'the_excerpt', $next_ex_con ), 32 );
                }
                ?>
                <div class="row hidden-md-down">
                  <div class="col-4 text-right prev">
                    <?php if(!empty($prev)): ?>
                      <a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">
                        <span class="article-nav"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Post</span>
                        <span class="article-nav-link-title">
                          <strong><?php echo $prev_title; ?></strong><br>
                        </span>
                        <span class="article-nav-link">
                          <?php echo $prev_text; ?>
                        </span>
                      </a>
                    <?php endif; ?>
                  </div>

                  <div class="col-4 text-center">
                    <a href="<?php echo site_url(); ?>">
                      <span class="article-nav"> [ Home Page ]</span>

                      <img src="<?php bloginfo('template_url'); ?>/img/nufclogo.png" class="img-thumbnail mx-auto" alt="Newcastle United logo" style="max-height: 210px;">
                    </a>
                  </div>

                  <div class="col-4 text-left next">
                    <?php if(!empty($next)): ?>
                      <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
                        <span class="article-nav"> Next Post <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="article-nav-link-title">
                          <strong><?php echo $next_title; ?></strong><br>
                        </span>
                        <span class="article-nav-link">
                          <?php echo $next_text; ?>
                        </span>
                      </a>
                    <?php endif; ?>
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
                <div class="break-white"></div>
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
