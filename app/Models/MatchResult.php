<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['match_status'];
    protected $hidden = ['schedule_id', 'created_at', 'updated_at', 'deleted_at'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function match_scores()
    {
        return $this->hasMany(MatchScore::class, 'schedule_id', 'schedule_id');
    }

    public function getMatchStatusAttribute()
    {
        if ($this->score_home == $this->score_away) {
            return 'Draw';
        }

        if ($this->score_home > $this->score_away) {
            return $this->schedule->team_home->name . ' Menang';
        } else {
            return $this->schedule->team_away->name . ' Menang';
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($match_result) {
            if ($match_result->score_home != $match_result->score_away) {
                if ($match_result->score_home > $match_result->score_away) {
                    $match_result->team_id_winning = $match_result->schedule->team_id_home;
                    $match_result->team_id_losing = $match_result->schedule->team_id_away;
                } else {
                    $match_result->team_id_losing = $match_result->schedule->team_id_home;
                    $match_result->team_id_winning = $match_result->schedule->team_id_away;
                }
            }
        });
    }
}
