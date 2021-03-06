<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="author" content="Ed Harrison">
  <meta name="keywords"  content="Newcastle United, Magpies, UK, England, Newcastle, Premier, Premier League, nufc, nufcblog, League, Football, Championship, Soccer, Champions League, Europa League, St. James&#039; Park,  UEFA, Tyneside, FA, Geordie, Geordies, fans, blog, MLS" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?php bloginfo('name'); ?> |
    <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
  </title>
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Oranienbaum|Russo+One|Caveat|Open+Sans:400,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!--  the following is a meta tag to verify my site for Google webmaster tools   -->
  <meta name="google-site-verification" content="b-I3-C3YC4_68tvg4XlbKYQEumbMQNqvN6AJzTtbBlM" />
  <!--   The following is a verification element used by Google Sitemaps   -->
  <meta name="verify-v1" content="XzaSOaaipGWR1VotdGPuK3GDDlFTn2K/F47f0k0FC+g=" />
  <!--   The following is to allow async ads in Google Adsense   -->
  <script async='async' src=""></script>
  <!--   The following is to allow Page Level ads on mobile in Google Adsense   -->
  <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-1875437023224247",
      enable_page_level_ads: true
    });
  </script>

  <?php wp_head(); ?>
</head>
<body>
  <!-- Header with navigation bar and logo -->
  <header>
    <!-- Navbar menu -->
    <nav class="hidden-sm-down">
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
        <a href="<?php echo site_url(); ?>" class="big">The Newcastle United Blog</a>
      </div>
    </div>

    <!-- logo small displays ends here -->

    <!-- logo and banner for large monitors starts here  -->
    <div class="logo-container hidden-md-down" style="background-image:url('<?php bloginfo('template_url'); ?>/img/bg/<?php echo randomImage(); ?>.jpg')">
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

    <div class="container">
      <!-- Start of StatCounter Code -->
        <script type="text/javascript"> sc_project=3206093; sc_invisible=0; sc_partition=35; sc_security="4ab3ce81"; </script>
        <script type="text/javascript" src="http://www.statcounter.com/counter/counter.js"></script>
        <noscript><div class="statcounter"><a title="free hit counter" href="http://www.statcounter.com/" target="_blank"><img class="statcounter" src="http://c36.statcounter.com/3206093/0/4ab3ce81/0/"                		alt="free hit counter"/></a>>
        </div></noscript>
      <!-- End of StatCounter Code -->
    </div>

  </header>
  <!-- header section ends here -->

  <!-- RESPONSIVE AD 1 - AD SENSE -->
  <div class="container break-white-ad">
    <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Responsive Ad1 -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-1875437023224247"
         data-ad-slot="7415304228"
         data-ad-format="auto"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
  <!-- RESPONSIVE AD 1 ENDS HERE -->
