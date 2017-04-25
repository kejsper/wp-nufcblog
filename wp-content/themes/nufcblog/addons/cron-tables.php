<?php

// CRON JOB ACTIVATION
function nufcblog_cron_activation() {
  if(!wp_next_scheduled('nufcblog_hourly_cron_hook')) {
    wp_schedule_event(time(), 'hourly', 'nufcblog_hourly_cron_hook');
  }
}
add_action('init', 'nufcblog_cron_activation');
add_action('nufcblog_hourly_cron_hook', 'cron_tables_update');

// GET DATA FROM FOOTBALL API AND SAVE TO THE FILE
function cron_tables_update() {
  //GETS JSON DATA FROM FOOTBALL API
  $args = array(
    'headers' => array(
      'X-Auth-Token' => 'c1c4e514fa5f4595a758dd4f8b609484',
    ),
  );
  $response = wp_remote_get('http://api.football-data.org/v1/competitions/427/leagueTable', $args);
  $response_code = wp_remote_retrieve_response_code( $response );
  if($response_code==200) {
    $body = wp_remote_retrieve_body($response);
    $jsoned = json_decode($body, true);
    $table = $jsoned['standing'];
    $head = jsoned['links'];
    $matchday = $head['matchday'];
    $length = count($table);


    

    $fp = fopen(TEMPLATEPATH . '/addons/leaguetable.json', 'w') or die('Cannot open the file');
    fwrite ($fp, '$response_code');
    fclose ($fp);
  }
  else { return; }
}
