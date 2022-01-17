<?php

namespace App\Class;

class FilterUser
{
  
  public function filterScoreAndDateUser($arr, int $id)
  {
    $arr_filter_user = array_filter($arr, function ($item) use ($id) {
      return $item['id_user'] == $id;
    });
    $array_score = Array();
    foreach($arr_filter_user as $row){
      array_push($array_score, ['score' => $row['score'], 'date' => $row['date']]);
    }
    return $array_score;
  }

  public function filterDateMaxScoreUser($arr, int $score)
  {
    $arr_filter_user = array_filter($arr, function ($item) use ($score) {
      return $item['score'] == $score;
    });
    $date = null;
    foreach ($arr_filter_user as $row) {
      if ($row['date'] > $date) {
        $date = $row['date'];
      }
    }
    return $date;
  }

  public function filterUniqueIdUser($array, string $key)
  {
    $arr = array_filter($array, function ($item) {
      return $item['id_user'] != 0;
    });
    $array_user = array();
    foreach ($arr as $row) {
      array_push($array_user, [
        'id_user' => $row['id_user'],
        'name' => $row['name']
      ]);
    }

    $temp_array = [];
    foreach ($array_user as &$v) {
      if (!isset($temp_array[$v[$key]]))
        $temp_array[$v[$key]] = &$v;
    }
    $array_user = array_values($temp_array);
    return $array_user;
  }
}

