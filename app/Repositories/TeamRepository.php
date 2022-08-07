<?php

namespace App\Repositories;

use App\Interfaces\TeamRepositoryInterface;
use App\Models\Team;

class TeamRepository implements TeamRepositoryInterface
{
    public function getAllTeams()
    {
        return Team::all();
    }

    public function showTeam($id)
    {
        return Team::find($id);
    }

    public function createTeam($team)
    {
        return Team::create($team);
    }

    public function updateTeam($id, array $team)
    {
        return Team::whereId($id)->update($team);
    }

    public function deleteTeam($id)
    {
        return Team::destroy($id);
    }
}
