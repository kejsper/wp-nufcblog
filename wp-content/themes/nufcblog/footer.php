  <!-- PIXFUTURE AD STARTS HERE -->
  <div class="container break-white-ad-pix">
    <div id="leaderboard-pixfuture">
      <script type="text/javascript">
        if (!window.OX_ads) { OX_ads = []; }
          OX_ads.push({ "auid" : "537654077" });
        </script>
        <script type="text/javascript">
          document.write('<scr'+'ipt src="http://ax-d.pixfuture.net/w/1.0/jstag"><\/scr'+'ipt>');
        </script>
        <noscript><iframe id="19878e3eb7" name="19878e3eb7" src="http://ax-d.pixfuture.net/w/1.0/afr?auid=537654077&cb=INSERT_RANDOM_NUMBER_HERE" frameborder="0" scrolling="no" width="728" height="90"><a href="http://ax-d.pixfuture.net/w/1.0/rc?cs=19878e3eb7&cb=INSERT_RANDOM_NUMBER_HERE" ><img src="http://ax-d.pixfuture.net/w/1.0/ai?auid=537654077&cs=19878e3eb7&cb=INSERT_RANDOM_NUMBER_HERE" border="0" alt=""></a></iframe></noscript>
    </div>
  </div>
  <!-- PIXFUTURE AD ENDS HERE -->

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
          <a href="https://www.facebook.com/The-Newcastle-United-Blog-159823257424834/" class="social-icon fb" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="https://twitter.com/thenufcblog" class="social-icon tw" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="https://plus.google.com/+nufcblog" class="social-icon gplus" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          <a href="http://feeds.feedburner.com/nufcblog" class="social-icon rss" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
        </div>
        <!-- end of socials section -->

        <!-- charity -->
        <div class="charity">
          <h4 class="footer-header">we support</h4>
          <div><a href="http://www.nufoundation.org.uk/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/nufcfoundation2.jpg" class="img-thumbnail charity-img" alt="Newcastle United Foundation"></a></div>
          <div><a href="http://sirbobbyrobsonfoundation.org.uk/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/sirbobbyfoundation.png" class="img-thumbnail charity-img" alt="Sir Bobby Robson Foundation"></a></div>
          <div><a href="http://www.alanshearerfoundation.org.uk/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/alanshearerfoundation2.jpg" class="img-thumbnail charity-img" alt="Alan Shearer Foundation"></a></div>
        </div>
        <!-- end of charity -->
      </div>
      <!-- end of social and charities section -->

      <div class="col-lg-4 hidden-md-down">
        <!-- links to other nufc websites - blogroll -->
        <?php if(is_active_sidebar('footer-links')): ?>
          <?php dynamic_sidebar('footer-links'); ?>
        <?php endif; ?>
        <!-- end of links section -->
      </div>
    </div>
  </div>

  <!-- copyright section -->
  <div class="copyrights">
    <h5 class="footer-header">Copyrights <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></h5>
  </div>
  <!-- end of copyright section -->

  <!-- return to top button -->
  <div id="scrolltop">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
  </div>
  <!-- end of return to top -->
</footer>
<?php wp_footer(); ?>

<!-- Analytics Adsense code  -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9087589-1");
pageTracker._trackPageview();
} catch(err) {}</script>
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
