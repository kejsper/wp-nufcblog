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


        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post() ?>
            <!-- ARTICLE -->
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
                  <?php the_time('l, F jS, Y g:i a'); ?> - <?php comments_number( 'No comments', '1 Comment', '% Comments' ); ?>
                </small>
              </div>
            </div>
            <div class="row article-content">
              <div class="col-12">
                <div class="article-photo-left">
                  <?php if(has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-thumbnail">
                  <?php endif; ?>
                </div>
                <div class="article-content-text">
                <p><?php the_content(); ?></p>
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
        <div class="break-white"></div>

      </div>
      <!-- LATEST NEWS SECTION ENDS HERE -->

      <!-- SIDEBAR SECTION STARTS HERE -->
      <div class="col-lg-3 hidden-md-down sidebar">
        <!-- SIDEBAR ITEM -->
        <div class="container sidebar-item-container">
          <div class="row">
            <div class="col-12 sidebar-header">
              <h4 class="sidebar-header-text">polls</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="poll-question">How Will Newcastle Fare Against Burton Albion?</p>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked> Win
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"> Loose
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"> Draw
                </label>
              </div>
              <button type="button" class="btn btn-secondary btn-block">Vote</button>
            </div>
          </div>
        </div>
        <!-- SIDEBAR ITEM ENDS HERE -->
        <div class="sidebar-break-white"></div>
        <!-- SIDEBAR ITEM -->
        <div class="container sidebar-item-container">
          <div class="row">
            <div class="col-12 sidebar-header">
              <h4 class="sidebar-header-text">polls</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="poll-question">Would Tom Cairney Be A Good Buy For Magpies At £12M?</p>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"> Yes
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"> No
                </label>
              </div>
              <button type="button" class="btn btn-secondary btn-block">Vote</button>
            </div>
          </div>
        </div>
        <!-- SIDEBAR ITEM ENDS HERE -->
        <div class="break-white"></div>
        <!-- SIDEBAR ITEM -->
        <div class="container sidebar-item-container">
          <div class="row">
            <div class="col-12 sidebar-header">
              <h4 class="sidebar-header-text">health update</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p>I've just had the results of the MRI scan and full bone scan from my urologist.</p>
              <p>The MRI came back good with it showing nothing much at all - good news.</p>
              <p>But unfortunately the bone scan has shown the prostate cancer has spread to the bones.</p>
              <p>It has metastasized to multiple areas of the body and has spread rapidly over the last six months - so I now have stage four prostate cancer.</p>
              <p>The treatment will be Hormone therapy, but we may also go to chemotherapy, because it has spread so quickly.</p>
              <p>It's obviously not what I had hoped for - but it is what it is.</p>
              <p>I will fight this the best I can.</p>
              <p><b>Ed Harrison</b></p>

            </div>
          </div>
        </div>
        <!-- SIDEBAR ITEM ENDS HERE -->

        <div class="break-white"></div>
        <!-- SIDEBAR ITEM -->
        <div class="container sidebar-item-container">
          <div class="row">
            <div class="col-12 sidebar-header">
              <h4 class="sidebar-header-text">author</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <img src="img/ed-harrison.jpg" alt="Ed Harrison photo" class="img-thumbnail">
              <p><b>Ed Harrison</b></p>
              <p>Dr. Ed Harrison is a retired IBM executive, who was born and bred in St. Anthony's estate in Newcastle, and joined IBM in 1970 after completing a PhD in Computing Science at Newcastle University.</p>
              <p>Ed was moved to America in 1973 by IBM with his wife Madeline - formerly Madeline Carol Rose of Longbenton estate - also a Geordie.</p>
              <p>Dr. Harrison did well at the American company, and was instrumental in building and managing a $2B Network Consulting business for IBM Global Services before he finally retired in 2004.</p>
              <p>Since then he has concentrated on something that's really important to him - Newcastle United.</p>
              <p>Ed and Madeline have been married for 45 years, and have three children, twin sons Neil and Paul and daughter Elaine, who live near their parents in Raleigh, North Carolina.</p>
              <p>Click here for a longer bio - but it gets a bit boring.</p>

            </div>
          </div>
        </div>
        <!-- SIDEBAR ITEM ENDS HERE -->

      </div>
      <!-- SIDEBAR SECTION ENDS HERE -->
    </div>
  </div>
  <!-- CONTENT ENDS HERE -->
  <div class="break-white"></div>
  <div class="break-white"></div>
  <?php get_footer(); ?>
