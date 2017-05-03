
  <div class="col-sm-6">
    <!-- ARTICLE -->
    <article>
      <?php if(has_post_thumbnail()) : ?>
        <div class="row article-content">
          <div class="col-12">
            <a href="<?php the_permalink(); ?>"><div class="article-photo" style="background-image:  url('<?php the_post_thumbnail_url(); ?>')">
            </div></a>
          </div>
        </div>
      <?php endif; ?>
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
      <?php if (! has_post_thumbnail()) {?>
        <div class="row article-content">
          <div class="col-12">
            <div class="article-content-text">
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </article>
<!-- END OF ARTICLE -->
  </div>
