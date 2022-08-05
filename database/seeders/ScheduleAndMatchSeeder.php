<?php

namespace Database\Seeders;

use App\Models\MatchResult;
use App\Models\MatchScore;
use App\Models\Schedule;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Database\Seeder;

class ScheduleAndMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            'home'  => Team::factory()->create(),
            'away'  => Team::factory()->create()
        ];

        Player::factory()->count(11)->for($teams['home'])->create();
        Player::factory()->count(11)->for($teams['away'])->create();

        $schedule = Schedule::create([
            'date'          => \Carbon\Carbon::now(),
            'time'          => \Carbon\Carbon::now(),

            'team_id_home'  => $teams['home']->id,
            'team_id_away'  => $teams['away']->id,
        ]);

        $scores = [
            'home'  => 0,
            'away'  => 0
        ];

        for ($i = 0; $i < rand(1, 10); $i++) {
            $pick_team_id = collect(
                [
                    $teams['home']->id, $teams['away']->id
                ]
            )->random();

            $pick_player_id = Player::where('team_id', $pick_team_id)->inRandomOrder()->first()->id;

            MatchScore::create([
                'schedule_id'   => $schedule->id,
                'team_id'       => $pick_team_id,
                'player_id'     => $pick_player_id,
                'score'         => 1,
                'score_time'    => rand(0, 90)
            ]);

            if ($teams['home']->id == $pick_team_id) {
                $scores['home']++;
            } else {
                $scores['away']++;
            }
        }

        MatchResult::create([
            'schedule_id'   => $schedule->id,
            'score_home'    => $scores['home'],
            'score_away'    => $scores['away']
        ]);
    }
}
