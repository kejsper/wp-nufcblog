<?php

  // Message Vars
  $msg = '';
  $msgClass = '';


  //check for submit
  if(filter_has_var(INPUT_POST, 'nufcblog_submit')) {
    // getting input data

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $privateKey = "6LcLjSAUAAAAAOjMLjMcuqcgybF87zmXFNX8kfab";

    $response = wp_remote_get($url."?secret=".$privateKey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $body = wp_remote_retrieve_body($response);
    $jsoned = json_decode($body, true);

    if(isset($jsoned['success']) && $jsoned['success']===true) {

      $name = sanitize_text_field($_POST['nufcblog_name']);
      $email = sanitize_text_field($_POST['nufcblog_email']);
      $subject = sanitize_text_field($_POST['nufcblog_subject']);
      $message = sanitize_text_field($_POST['nufcblog_message']);

      // checking required fields
      if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        //passed
        //check email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
          //failed
          $msg = 'Please use valid email address';
          $msgClass = 'alert-danger';

        } else {
          //passed
          $sendToEmail = 'admin@nufcblog.com';
          $subject = '[' . $subject . '] Contact Request from: ' . $name;
          $body = '<h3>Request from email: ' . $email . '</h3>
            <p>'.$message.'</p>';

          $headers = "MIME-Version: 1.0"."\r\n";
          $headers .= "Content-Type:text/html; charset=UTF-8" . "\r\n";
          $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

          if(mail($sendToEmail, $subject, $body, $headers)) {

            $msg = 'Your email has been sent';
            $msgClass = 'alert-success';
            $name = '';
            $email= '';
            $subject= '';
            $message = '';

          } else{
            $msg = 'Your email was not sent';
            $msgClass = 'alert-danger';
          }
        }

      } else {
        // failed
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
      }

    } else {
      $msg = 'You are not verified by reCaptcha';
      $msgClass = 'alert-danger';
    }
  }

?>


<?php
get_header(); ?>

<!-- CONTENT -->
<?php if(have_posts()) : ?>
  <?php while(have_posts()) : the_post() ?>
    <div class="container">
      <div class="row">
        <!-- LATEST NEWS SECTION -->
        <div class="col-12 col-lg-9">
          <h1 class="page-header"><?php the_title(); ?></h1>
        <div class="page-line"></div>
        <?php
          if(has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url(); ?>" class="img-thumbnail">

        <?php
        endif;
        ?> <div class="text-justify page-content"> <?php
          the_content();
        ?> </div>
        <!-- END OF ARTICLE -->

  <?php endwhile; ?>
<?php else : ?>
  <p> <?php __('No posts found');  ?> </p>
<?php endif; ?>

      <!-- Fail to fill all the required forms -->
      <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>
      <form method="post" action="">
        <div class="form-group">
          <label for="nufcblog_name">Your Name</label>
          <input class="form-control" type="text" name="nufcblog_name" id="nufcblog_name" value="<?php echo isset($_POST['nufcblog_name']) ? esc_attr($name) : ''; ?>" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label for="nufcblog_email">Email address</label>
          <input type="email" class="form-control" name="nufcblog_email" id="nufcblog_email" aria-describedby="emailHelp" placeholder="Enter your email" value="<?php echo isset($_POST['nufcblog_email']) ? esc_attr($email) : ''; ?>">
        </div>
        <div class="form-group">
          <label for="nufcblog_subject">Email subject</label>
          <select class="form-control" name="nufcblog_subject" id="nufcblog_subject">
            <option>Blog</option>
            <option>Newcastle United</option>
            <option>Advertisement</option>
            <option>Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nufcblog_message">Your message</label>
          <textarea class="form-control" name="nufcblog_message" id="nufcblog_message" rows="5"><?php echo isset($_POST['nufcblog_message']) ? esc_textarea($message) : ''; ?></textarea>
        </div>



        <div class="form-group text-center">
          <div class="g-recaptcha captcha" data-sitekey="6LcLjSAUAAAAAJEPvQRBrxwxGa-l9d7zhEWvukva"></div>
          <button type="submit" name="nufcblog_submit" class="btn btn-primary btn-read-more btn-contact-send">Send</button>
        </div>
      </form>



      <div class="break-white"></div>


    </div>
     <!-- LATEST NEWS SECTION ENDS HERE -->

     <!-- SIDEBAR SECTION STARTS HERE -->
<div class="col-lg-3 hidden-md-down sidebar">
  <?php if(is_active_sidebar('index-sidebar')): ?>
    <?php dynamic_sidebar('index-sidebar'); ?>
  <?php endif; ?>
    <div class="break-white"></div>
    </div>
  <!-- SIDEBAR SECTION ENDS HERE -->
  </div>
 </div>
 <!-- CONTENT ENDS HERE -->
 <div class="break-white"></div>
 <div class="break-white"></div>

<?php get_footer(); ?>
