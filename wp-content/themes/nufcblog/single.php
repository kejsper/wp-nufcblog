<?php get_header(); ?>

  <!-- PIXFUTURE SINGLE POST AD -->
  <div class="pixfuture-wrapper">
  <div id="leaderboard-pixfuture" class="container break-white-ad-pix">

    <script type="text/javascript">
      if (!window.OX_ads) { OX_ads = []; }
        OX_ads.push({ "auid" : "537654077" });
      </script>
      <script type="text/javascript">
        document.write('<scr'+'ipt src="http://ax-d.pixfuture.net/w/1.0/jstag"><\/scr'+'ipt>');
      </script>
      <noscript><iframe id="19878e3eb7" name="19878e3eb7" src="http://ax-d.pixfuture.net/w/1.0/afr?auid=537654077&cb=INSERT_RANDOM_NUMBER_HERE" frameborder="0" scrolling="no" width="728" height="90"><a href="http://ax-d.pixfuture.net/w/1.0/rc?cs=19878e3eb7&cb=INSERT_RANDOM_NUMBER_HERE" ><img src="http://ax-d.pixfuture.net/w/1.0/ai?auid=537654077&cs=19878e3eb7&cb=INSERT_RANDOM_NUMBER_HERE" border="0" alt=""></a></iframe></noscript>
  </div>

  </div>
  <!-- END OF PIXFUTURE AD -->


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

  <?php get_footer(); ?>
