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
			<a href="<?php echo $prev_permalink; ?>">
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
			<a href="<?php echo $next_permalink; ?>">
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
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					Previous Post
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
  <ul class="list-unstyled">
    



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
</div> <!-- id="comments" -->
