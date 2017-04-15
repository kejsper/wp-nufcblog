<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="author" content="Ed Harrison">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?php bloginfo('name'); ?> |
    <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
  </title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Oranienbaum|Russo+One|Caveat|Open+Sans:400,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <?php wp_head(); ?>
</head>
<body>
  <!-- Header with navigation bar and logo -->
  <header>
    <!-- Navbar menu -->
    <nav>
      <?php
        $args = array(
          'theme_location' => 'primary',
          'container' => 'div',
          'container_id' => false,
          'container_class' => 'container',
          'menu_id' => false,
          'menu_class' => 'navigation',
          'depth' => 1,
          'fallback_cb' => 'bs4navwalker::fallback',
          'walker' => new bs4navwalker()
        );
      ?>
      <?php wp_nav_menu( $args ); ?>
    </nav>
    <!-- navbar ends here -->

    <!-- logo and banner for small displays starts here -->
    <div class="logo-small hidden-lg-up">
      <div class="logo-small-img">
      </div>
      <div class="logo-small-header">
        <a href="<?php echo site_url(); ?>" class="small">Ed Harrison's</a></br>
        <a href="<?php echo site_url(); ?>" class="big">NUFC Blog</a>
      </div>
    </div>

    <!-- logo small displays ends here -->

    <!-- logo and banner for large monitors starts here  -->
    <div class="logo-container hidden-md-down">
      <div class="logo-full-width">
        <a href="<?php echo site_url(); ?>">
        <div class="container">
          <div class="logo-image">
            <img src="<?php bloginfo('template_url'); ?>/img/nufclogo.png" alt="Newcastle United logo">
          </div>
          <div class="logo-text">
            <h3>Ed Harrison's</h3>
            <h1>The Newcastle United Blog</h1>
          </div>
          <div class="clear"></div>
        </div>
        </a>
      </div>
    </div>
    <!-- logo ends here -->
  </header>
  <!-- header section ends here -->
