<!-- footer section -->
<footer>
  <div class="container">
    <div class="row">
      <!-- logo+quote section -->
      <div class="col-lg-4 col-md-6">
        <div class="footer-logo">
          <img src="<?php bloginfo('template_url'); ?>/img/nufclogo.png" class="img-thumbnail footer-logo-image">
        </div>
        <div class="footer-quote">
          <h4 class="footer-header">football club</h4>
          <p class="quote">It’s the noise, the passion, the feeling of belonging, the pride in your city. It’s a small boy clambering up stadium steps for the very first time, gripping his father’s hand, gawping at that hallowed stretch of turf beneath him and, without being able to do a thing about it, falling in love.</p>
          <p class="quote-author"><em>Sir Bobby Robson</em></p>
        </div>

      </div>
      <!-- logo+quote section -->


      <!-- social and charities section -->
      <div class="col-lg-4 col-md-6">
        <!-- socials section -->
        <div class="socials">
          <h4 class="footer-header">social media</h4>
          <a href="#" type="button" class="btn btn-info social-icon fb" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#" type="button" class="btn btn-info social-icon tw" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#" type="button" class="btn btn-info social-icon gplus" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          <a href="#" type="button" class="btn btn-info social-icon rss" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
        </div>
        <!-- end of socials section -->
        <!-- charity -->
        <div class="charity">
          <h4 class="footer-header">we support</h4>
          <div><img src="<?php bloginfo('template_url'); ?>/img/nufcfoundation2.jpg" class="img-thumbnail charity-img" alt="Newcastle United Foundation"></div>
          <div><img src="<?php bloginfo('template_url'); ?>/img/sirbobbyfoundation.png" class="img-thumbnail charity-img" alt="Sir Bobby Robson Foundation"></div>
          <div><img src="<?php bloginfo('template_url'); ?>/img/alanshearerfoundation2.jpg" class="img-thumbnail charity-img" alt="Alan Shearer Foundation"></div>
        </div>
        <!-- end of charity -->

      </div>
      <!-- end of social and charities section -->

      <div class="col-lg-4 hidden-md-down">
        <!-- links to other nufc websites - blogroll -->
        <?php if(is_active_sidebar('footer-links')): ?>
          <?php dynamic_sidebar('footer-links'); ?>
        <?php endif; ?>
        <div class="blogroll">
          <h4 class="footer-header">blogroll</h4>
          <ul class="list-unstyled">
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> Football News Daily</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> Lee Ryder’s Blog on the Tyne</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> Mauritian Blog</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> Newcastle United Pro</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> Nothing But Newcastle</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> NUFC Blog</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> NUFC.COM</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> NUFCnet – NUFC Supporters</li>
            <li class="footer-link"><i class="fa fa-futbol-o" aria-hidden="true"></i> Tyne Time – Irish NUFC Blog</li>
          </ul>

        </div>
        <!-- end of links section -->


      </div>
    </div>
  </div>
  <!-- copyright section -->
  <div class="copyrights">
    <h4 class="footer-header">Copyrights <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></h4>

  </div>
  <!-- end of copyright section -->

  <!-- return to top button -->
  <div id="scrolltop">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
  </div>
  <!-- end of return to top -->
</footer>
<?php wp_footer(); ?>
<!-- footer section ends here -->


<!-- scripts needed to run the site -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<!-- list of scripts ends here -->
</body>
</html>
