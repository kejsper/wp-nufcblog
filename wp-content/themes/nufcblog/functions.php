<?php

// Register Nav Walker for bootstrap 4
require_once(get_template_directory().'/addons/bs4navwalker.php');
require_once(get_template_directory().'/addons/widgets.php');
require_once(get_template_directory().'/addons/ajax.php');
require_once(get_template_directory().'/addons/links-plugin.php');
require_once(get_template_directory().'/addons/cron-tables.php');

function nufcblog_theme_setup () {
  // Setting up navigation menus
  add_theme_support('menus');

  // Registering Navigation menus
  register_nav_menus(array(
    'primary' => __( 'Primary Menu')
  ));

  // Image support in posts
  add_theme_support('post-thumbnails');

  // Post formats support
  add_theme_support('post-formats', array('aside', 'status'));

  // Converting search form to html5
  add_theme_support('html5', array('search-form'));
}

// set excerpt length function
function nufcblog_excerpt_length ($length) {
  //excerpt length - number of words
  return 32;
}
add_filter('excerpt_length', 'nufcblog_excerpt_length', 999);


//LIMIT OF WORDS DISPLAYED FOR THE CONTENT FUNCTION
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

// DISPLAYING EXCERPT READ MORE STYLE
function nufcblog_excerpt_more($more) {
   global $post;
   return ' <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '">'. __('[...]', 'nufcblog') .'</a>';
}
add_filter('excerpt_more', 'nufcblog_excerpt_more');





// Setting up sidebar widgets
function nufcblog_init_widgets ($id) {
  register_sidebar(array(
    'name' => 'Main Sidebar',
    'id' => 'index-sidebar',
    'before_widget' => '<div class="container sidebar-item-container">',
    'after_widget' => '</div></div></div><div class="break-white"></div>',
    'before_title' => '<div class="row"><div class="col-12 sidebar-header"><h4 class="sidebar-header-text">',
    'after_title' => '</h4></div></div><div class="row"><div class="col-12">'
  ));
}
// Initializing sidebar widgets
add_action('widgets_init', 'nufcblog_init_widgets');

// Setting up footer links widget
function nufcblog_init_footer_links_widgets ($id) {
  register_sidebar(array(
    'name' => 'Footer Links',
    'id' => 'footer-links',
    'before_widget' => '<div class="blogroll">',
    'after_widget' => '</ul></div>',
    'before_title' => '<h4 class="footer-header">',
    'after_title' => '</h4><ul class="list-unstyled">'
  ));
}
// INITIALIZATION OF FOOTER LINKS WIDGET
add_action('widgets_init', 'nufcblog_init_footer_links_widgets');


// Initalizing theme setup
add_action('init', 'nufcblog_theme_setup')




?>
