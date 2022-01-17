<?php

namespace App\Class;

class Ranking
{

  public function calculate_ranking($personals_records_movement)
  {
    $rankings  = array();
    $rank = 0;
    $prev_score = 0;
    foreach ($personals_records_movement as $key => $personal_record_movement) {
      $rankings[$personal_record_movement['name']] = array('score' => $personal_record_movement['score'],'date' => $personal_record_movement['date']);
    }

    array_multisort($rankings, SORT_DESC, $personals_records_movement);

    foreach ($rankings as $key => $ranking) {
      if ($ranking['score'] != $prev_score) {
        $rank++;
        $prev_score = $ranking['score'];
        $rankings[$key]['rank'] = $rank;
      } else {
        $prev_score = $personal_record_movement['score'];
        $rankings[$key]['rank'] = $rank;
      }
    }
    return $rankings;
  }
}