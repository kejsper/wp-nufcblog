<?php

//Ajax functions

add_action('wp_ajax_nopriv_load_more', 'load_more');
add_action('wp_ajax_load_more', 'load_more');

function load_more() {
  $paged = $_POST["page"]+1;

  $query = new WP_Query( array (
    'post_type' => 'post',
    'paged' => $paged,
    'post_status' => 'publish',
  ) );

  if($query->have_posts()):
    while( $query->have_posts() ): $query->the_post();
      ++$i;
      $format = get_post_format();
      if(($i%2===1)&&(! has_post_format())) { ?>
      <div class="row"> <?php }
      if(($i%2===0)&&($format=='aside' || $format=='status')) { ?> </div> <?php }

      get_template_part('content', get_post_format());

      if(($i%2===0)&&(! has_post_format())) { ?>
      </div>
      <div class="break-white"></div> <?php }
      if(($format=='aside')||($format=='status')) { --$i; }
    endwhile;
  else : ?>
        <p> <?php __('No posts found');  ?> </p>
  <?php endif;
  if($i%2===1) {?> </div> <?php }
  wp_reset_postdata();
  die();
}
?>
