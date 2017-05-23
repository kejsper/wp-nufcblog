<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	?>


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

?>
<!-- You can start editing here. -->
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

<?php if (($comments) or ('open' == $post-> comment_status)) { ?>

<div id="comments">
	<ul id="comment_list" class="list-unstyled">
	<?php if ($comments) { ?>
		<?php $count_pings = 1; foreach ($comments as $comment) { ?>
		<li class="comment <?php if (k2_comment_type_detection() != "Comment") { echo('trackback'); } ?>" id="comment-<?php comment_ID() ?>">
			<div class="row container">
				<div class="col-12">
					<div class="row" style="margin-bottom: 15px">
						<div class="col-1"><span class="comment_num">
							<a href="#comment-<?php comment_ID() ?>" title="Permalink to this comment"><?php echo($comment_number); ?></a></span>
						</div>
						<div class="col-6"><strong><?php comment_author_link() ?> </strong></div>
						<div class="col-5"><span class="comment_time text-muted"><small> <?php comment_date('M j, Y') ?> at <?php comment_time() ?> </small></span></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-left comments-text" style="margin-top: 20px;">
					<?php comment_text() ?>
					<hr>
					<?php if ($comment->comment_approved == '0') : ?>
					<p><strong>Your comment is awaiting moderation.</strong></p>
					<?php endif; ?>
				</div>
			</div>
		</li>
		<?php $comment_number++; } /* end for each comment */ ?>

	<?php } else { // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post-> comment_status) { ?>
			<!-- If comments are open, but there are no comments. -->
				<li class="comment">
					<div class="entry">
						<p>There are no comments yet - please enter the first comment by filling out the form below.</p>
					</div>
				</li>
		<?php } else { // comments are closed ?>
			<!-- If comments are closed. -->
			<?php if (is_single) { // To hide comments entirely on Pages without comments ?>
				<li class="comment">
					<div class="entry">
						<p>Like gas stations in rural Texas after 10 pm, comments are closed.</p>
					</div>
				</li>
			<?php } ?>

		<?php } ?>
	</ul>
	<?php } ?>

	<!-- Start -  Adsense Responsive Ad2  -->
	<!-- Comment Form -->
	<?php if ('open' == $post-> comment_status) : ?>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<?php else : ?>
			<h3 id="respond" class="comments_headers">Leave a Comment</h3>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment_form">
			<?php if ( $user_ID ) { ?>
			<?php } ?>

			<?php if ( !$user_ID ) { ?>
				<p><input class="text_input" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /><label for="author"><strong>Name</strong></label></p>
				<p><input class="text_input" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><label for="email"><strong>Mail</strong></label></p>
				<p><input class="text_input" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><label for="url"><strong>Website</strong></label></p>
			<?php } ?>
				<p><textarea class="form-control" name="comment" id="comment" rows="8" tabindex="4"></textarea></p>

				<?php if (function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>
				<p>

					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</p>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>

</div>

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
<!-- END OF PREV AND NEXT SECTION -->
<div class="clear flat">
</div>
