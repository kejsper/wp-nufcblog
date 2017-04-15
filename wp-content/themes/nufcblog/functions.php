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

}

add_action('init', 'nufcblog_theme_setup')

?>
