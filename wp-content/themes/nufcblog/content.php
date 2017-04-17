<!-- ARTICLE -->
<article>
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
</article>
<!-- END OF ARTICLE -->
<div class="break-white"></div>
