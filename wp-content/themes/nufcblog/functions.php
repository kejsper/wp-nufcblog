<?php

// Register Nav Walker for bootstrap 4
require_once('bs4navwalker.php');



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

}

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
// Initalizing theme setup
add_action('init', 'nufcblog_theme_setup')




?>
