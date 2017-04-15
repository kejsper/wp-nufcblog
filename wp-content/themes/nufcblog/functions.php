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

}

// Setting up sidebar widgets
function nufcblog_init_widgets ($id) {
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="sidebar-item-container">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="sidebar-header-text">',
    'after_title' => '</h4>'
  ));
}
// Initializing sidebar widgets
add_action('widgets_init', 'nufcblog_init_widgets');
// Initalizing theme setup
add_action('init', 'nufcblog_theme_setup')

?>
