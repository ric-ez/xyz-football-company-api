<?php

namespace App\Repositories;

use App\Interfaces\MatchResultRepositoryInterface;
use App\Models\MatchResult;
use App\Models\MatchScore;
use App\Models\Player;

class MatchResultRepository implements MatchResultRepositoryInterface
{
    public function getAllMatchResults()
    {
        $match_results = MatchResult::with(
            'schedule',
            'schedule.team_home.player',
            'schedule.team_away.player',
        )->get();

        $match_results->map(function ($match_result) {
            $match_scores = MatchScore::where('schedule_id', $match_result->schedule_id)->get();
            $scorer = [];

            foreach ($match_scores as $key => $value) {
                $player = MatchScore::where('player_id', $value->player_id)->get();

                $player_name = Player::find($value->player_id)->name;
                $scorer = [
                    'name'  => $player_name,
                    'score' => $player->count()
                ];
            }

            $match_result->top_scorer = $scorer;

            $match_result->total_win_home = MatchResult::where('team_id_winning', $match_result->schedule->team_id_home)->count();
            $match_result->total_win_away = MatchResult::where('team_id_winning', $match_result->schedule->team_id_away)->count();
        });

        return $match_results;
    }

    public function createMatchResult(array $matchResult)
    {
        return MatchResult::create($matchResult);
    }
}
