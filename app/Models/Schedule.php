<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function team_home()
    {
        return $this->belongsTo(Team::class, 'team_id_home', 'id');
    }

    public function team_away()
    {
        return $this->belongsTo(Team::class, 'team_id_away', 'id');
    }
}
