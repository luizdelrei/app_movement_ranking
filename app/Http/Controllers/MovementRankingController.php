<?php

namespace App\Http\Controllers;

use App\Class\FilterUser;
use App\Class\Ranking;
use App\Models\Movement;
use App\Models\PersonalRecord;

class MovementRankingController extends Controller
{
    public function __construct(PersonalRecord $personalRecord)
    {
        $this->personalRecord = $personalRecord;
    }
    /**
     * Display the specified resource.
     *
     * @param  Integer  $id_movement
     * @return \Illuminate\Http\Response
     */
    public function show(int $id_movement)
    {
        $movement = Movement::find($id_movement);

        if ($movement === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $dados = $this->personalRecord->with(['user', 'movement'])->where('movement_id', '=', $id_movement)->get();
        
        if (count($dados) < 1) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $filterUser = new FilterUser;
        $rankink = new Ranking;
        $array_dados = array();
        $personals_records_movement = array();
        
        foreach ($dados as $dado) {
            array_push($array_dados, [
                'id_user' => $dado->user[0]->id,
                'score' => $dado->value,
                'name' => $dado->user[0]->name, 
                'date' => $dado->date, 
                'value' => $dado->value
            ]);
        }

        $users = $filterUser->filterUniqueIdUser($array_dados, 'id_user');
        
        foreach ($users as $user) {
            $filterScoreAndDate = $filterUser->filterScoreAndDateUser($array_dados, $user["id_user"]);
            $score = max(array_column($filterScoreAndDate, 'score'));

            $date = $filterUser->filterDateMaxScoreUser($filterScoreAndDate, $score);

            array_push($personals_records_movement, [
                'id_user' => $user["id_user"],
                'name' => $user["name"],
                'score' => $score,
                'date' => $date,
            ]);
        }

        $reponse['movement_name'] = $dados[0]->movement[0]->name;
        $reponse['ranking_users'] = $rankink->calculate_ranking($personals_records_movement);
        return $reponse;
    }
}