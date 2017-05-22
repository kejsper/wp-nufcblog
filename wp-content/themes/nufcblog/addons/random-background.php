<?php

function randomImage() {
  $directory = get_template_directory().'/img/bg/';
  $filecount = 0;
  $files = glob($directory . "*.jpg");
  if ($files){
   $filecount = count($files);
  }
  $randomImage = mt_rand(1, $filecount);

  return $randomImage;
}
