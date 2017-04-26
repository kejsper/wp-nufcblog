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
  $response = wp_remote_get('http://api.football-data.org/v1/competitions/427/leagueTable/?matchday=46', $args);
  $response_code = wp_remote_retrieve_response_code( $response );


  if($response_code==200) {
    $body = wp_remote_retrieve_body($response);
    $jsoned = json_decode($body, true);
    $table = $jsoned['standing'];
    $length = count($table);



    $fp = fopen(TEMPLATEPATH . "/addons/data/leaguetable.json", "w") or die('Cannot open the file');
    $head = '<table class="league-table"><tr><td><b>#</b></td><td><b>Team</b></td><td><b>Pld</b></td><td><b>GD</b></td><td><b>Pts</b></td></tr>';
    fwrite ($fp, "$head");
    fclose ($fp);

    for($i=0; $i<$length; $i++) {
      $team = $table[$i];

      switch ($team['teamName']) {
        case 'Brighton & Hove Albion':
          $team['teamName'] = 'Brighton';
          break;
        case 'Newcastle United FC':
          $team['teamName'] = 'Newcastle';
          break;
        case 'Huddersfield Town':
          $team['teamName'] = 'Huddersfield';
          break;
        case 'Sheffield Wednesday':
          $team['teamName'] = 'Shef Wed';
          break;
        case 'Norwich City FC':
          $team['teamName'] = 'Norwich';
          break;
        case 'Preston North End':
          $team['teamName'] = 'P. N. E.';
          break;
        case 'Wolverhampton Wanderers FC':
          $team['teamName'] = 'Wolves';
          break;
        case 'Burton Albion FC':
          $team['teamName'] = 'Burton';
          break;
        case 'Queens Park Rangers':
          $team['teamName'] = 'QPR';
          break;
        case 'Nottingham Forest':
          $team['teamName'] = 'Nott Forest';
          break;
        case 'Birmingham City':
          $team['teamName'] = 'Birmingham';
          break;
        case 'Blackburn Rovers FC':
          $team['teamName'] = 'Blackburn';
          break;
        case 'Wigan Athletic FC':
          $team['teamName'] = 'Wigan';
          break;
        case 'Rotherham United':
          $team['teamName'] = 'Rotherham';
          break;
          case 'Aston Villa FC':
            $team['teamName'] = 'Aston Villa';
            break;
          case 'Cardiff City FC':
            $team['teamName'] = 'Cardiff City';
            break;
          case 'Derby County':
            $team['teamName'] = 'Derby';
            break;

      }


      $fp = fopen(TEMPLATEPATH . "/addons/data/leaguetable.json", "a") or die('Cannot open the file');
      $html = '<tr><td>'.$team['position'].'</td><td>'.$team['teamName'].' </td><td>'. $team['playedGames'].' </td><td>'. $team['goalDifference'].' </td><td>'. $team['points'].'</td></tr>';
      fputs ($fp, "$html");
      fclose ($fp);
    }
    $fp = fopen(TEMPLATEPATH . "/addons/data/leaguetable.json", "a") or die('Cannot open the file');
    $foot = '</table>';
    fwrite ($fp, "$foot");
    fclose ($fp);

  }
  else { return; }
}
