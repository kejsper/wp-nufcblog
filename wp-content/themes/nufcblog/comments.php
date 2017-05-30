<?php
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	?>
		<p class="center"><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
<?php	return; } }
	/* Function for separating comments from track- and pingbacks. */
	function k2_comment_type_detection($commenttxt = 'Comment', $trackbacktxt = 'Trackback', $pingbacktxt = 'Pingback') {
		global $comment;
		if (preg_match('|trackback|', $comment->comment_type))
			return $trackbacktxt;
		elseif (preg_match('|pingback|', $comment->comment_type))
			return $pingbacktxt;
		else
			return $commenttxt;
	}
	$templatedir = get_bloginfo('template_directory');
	$comment_number = 1;
?>

<!-- PREVIOUS AND NEXT POST SECTION -->
<?php
if ( $prev = get_previous_post(false) ) {
	$prev_permalink = esc_url( get_permalink( $prev->ID ) );
	$prev_title = $prev->post_title;
	$prev_ex_con = ( $prev->post_excerpt ) ? $prev->post_excerpt : strip_shortcodes( $prev->post_content );
	$prev_text = wp_trim_words( apply_filters( 'the_excerpt', $prev_ex_con ), 32 );
}
if ( $next = get_next_post(false) ) {
	$next_permalink = esc_url( get_permalink( $next->ID ) );
	$next_title = $next->post_title;
	$next_ex_con = ( $next->post_excerpt ) ? $next->post_excerpt : strip_shortcodes( $next->post_content );
	$next_text = wp_trim_words( apply_filters( 'the_excerpt', $next_ex_con ), 32 );
}
?>
<div class="row hidden-md-down">
	<div class="col-4 text-right prev">
		<?php if(!empty($prev)): ?>

				<a href="<?php echo $prev_permalink; ?>" class="article-nav"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Post</a>
				<a href="<?php echo $prev_permalink; ?>" class="article-nav-link-title">
					<strong><?php echo $prev_title; ?></strong><br>
				</a>
				<a href="<?php echo $prev_permalink; ?>" class="article-nav-link">
					<?php echo $prev_text; ?>
				</a>

		<?php endif; ?>
	</div>
	<div class="col-4 text-center">
		<a href="<?php echo site_url(); ?>" class="article-nav"> [ Home Page ]</a>
    <a href="<?php echo site_url(); ?>">
      <img src="<?php bloginfo('template_url'); ?>/img/nufclogo.png" class="article-nav-home mx-auto" alt="Newcastle United logo" style="max-height: 210px;">
		</a>
	</div>
	<div class="col-4 text-left next">
		<?php if(!empty($next)): ?>
				<a href="<?php echo $next_permalink; ?>" class="article-nav"> Next Post <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<a href="<?php echo $next_permalink; ?>" class="article-nav-link-title">
					<strong><?php echo $next_title; ?></strong><br>
				</a>
				<a href="<?php echo $next_permalink; ?>" class="article-nav-link">
					<?php echo $next_text; ?>
				</a>
		<?php endif; ?>
	</div>
</div>
<div class="row hidden-lg-up">
	<div class="col-6 text-right">
		<?php if(!empty($prev)): ?>
			<a href="<?php echo $prev_permalink; ?>">
				<span class="article-nav">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					Previous Post
				</span>
			</a>
		<?php endif; ?>
	</div>
	<div class="col-6 text-left next">
		<?php if(!empty($next)): ?>
			<a href="<?php echo $next_permalink; ?>">
				<span class="article-nav">
          Next Post
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</span>
			</a>
		<?php endif; ?>
	</div>
</div>
<div class="break-white"></div>
<!-- END OF PREV/NEXT POST SECTION -->

<!-- COMMENTS SECTION -->
<div id="comments">
<?php
  if (have_comments()):
    // comments goes here
  ?>
  <h3 class="comments-headers"><?php comments_number('0 comments', '1 comment', '% comments' );?> so far
    <a href="#comment-form">
      <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
    </a>
  </h3>
  <ul class="list-unstyled">
    <!-- single comment -->
    <?php foreach ($comments as $comment) { ?>
    <li id="comment-<?php comment_ID() ?>">
      <div class="col-12 px-0 comment-structure">
        <div class="row">
          <!-- author + gravatar + date -->
          <div class="col-12 col-sm-3 pr-sm-0">
            <div class="row">
            <div class="col-4 col-sm-12">
              <img src="<?php echo get_avatar_url(user_ID); ?>" class="comment-avatar">
            </div>
            <div class="col-8 col-sm-12 comment-info">
              <p class="comment-author"><strong><?php comment_author_link() ?> </strong></p>
              <p class="comment-time text-muted"><?php comment_date('M j, Y') ?> at <?php comment_time() ?></p>
            </div>
            </div>
          </div>
          <!-- comment body + link + additional options -->
          <div class="col-12 col-sm-9">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <!-- comment body -->
                  <div class="col-12 text-left pl-sm-0 pt-2 pt-sm-0 comments-text">
                    <?php comment_text() ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- additional options -->
          <div class="col-12 text-right pb-2" style="color: #00b6f1">
						
            <!-- number + link
            <a href="#comment-<?php comment_ID() ?>" title="Permalink to this comment">[#]</a>
            -->
          </div>
        </div>
      </div>
    </li>
    <?php $comment_number++; } ?> <!-- end of foreach -->
  </ul>
  <?php
    if(!comments_open() && get_comments_number()): ?>
    <p>Comments are closed</p>
  <?php
    endif;

  endif;
  if (!have_comments()): ?>
    <div class="container">
      <h3>There are no comments yet.</h3>
    </div>
  <?php
  endif;
  ?>

  <!-- Start -  Adsense Responsive Ad2  -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Responsive Ad 2 -->
	<ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-1875437023224247"
	     data-ad-slot="4322237029"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<!-- End -  Adsense Responsive Ad2 -->

	<!-- PIXFUTURE AD STARTS HERE -->
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

	<!-- PIXFUTURE AD ENDS HERE -->

  <!-- Comment Form -->
  <div id="comment-form">
    <div class="break-white"></div>
  	<?php if ('open' == $post-> comment_status) : ?>
  		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
  			<h3 class="comments-headers">You must <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">log in</a> to post a comment.</h3>
  		<?php else : ?>
  			<h3 id="respond" class="comments-headers">Leave a Comment</h3>
  			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment_form">
  			<?php if ( $user_ID ) { ?>
  				<h4>Logged in as
            <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
              <?php echo $user_identity; ?>
            </a>.
            <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">
              Logout &raquo;
            </a>
          </h4>
  			<?php } ?>
  			<?php if ( !$user_ID ) { ?>
  				<p>
            <label for="author"><strong>Name</strong></label>
            <input class="form-control" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
          </p>
  				<p>
            <label for="email"><strong>Mail</strong></label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
          </p>
  				<p>
            <label for="url"><strong>Website</strong></label>
            <input class="form-control" type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
          </p>
  			<?php } ?>
  				<p><textarea class="form-control" name="comment" id="comment" rows="8" tabindex="4"></textarea></p>
  				<?php if (function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>

          <div class="container">
  					<input name="submit" class="btn btn-block btn-read-more mx-auto" type="submit" id="submit" src="<?php bloginfo('template_url') ?>/images/submit_comment.gif" tabindex="5" value="Submit" />
  					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
  				</div>

  				<?php do_action('comment_form', $post->ID); ?>
  			</form>
  		<?php endif; // If registration required and not logged in ?>
    <?php endif; // if you delete this the sky will fall on your head ?>
  </div>
	<div class="break-white"></div>
	<div class="row">
		<div class="col-6 text-right">
			<?php if(!empty($prev)): ?>
				<a href="<?php echo $prev_permalink; ?>">
					<span class="article-nav">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						Previous Post
					</span>
				</a>
			<?php endif; ?>
		</div>
		<div class="col-6 text-left next">
			<?php if(!empty($next)): ?>
				<a href="<?php echo $next_permalink; ?>">
					<span class="article-nav">
	          Next Post
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="break-white"></div>
</div> <!-- id="comments" -->
